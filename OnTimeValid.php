<?php
trait Valid{
	function ot_ae($error, $record, $key = 'N/A',$value='N/A', $spec='N/A'){
		$this -> errvalid[uniqid($this->actses , true )] = array('Error'=>$error,'ErrorText'=>$this->ot_ed($error),'Record'=> $record,'field'=> $key,'value'=> $value, 'Spected'=>$spec); 
	}
	
	function VldStp(){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($this->id='admin') {
			$this -> force = TRUE;
		}
	}

	function VldStr(){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($this->id='admin') {
			$this -> force = FALSE;
		}
	}
	

	function VldClr()
	{
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$this -> errvalid  = array();
		$this -> datareview  = array();
		$this -> info  = array();
		$this -> retarr  = array();
	}

	protected function ot_valid($field, $data, $record){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($this->force) {
			return TRUE;
		}
		$this -> retarr  = [];
		$retval = TRUE;
		if ($this->ot_exist($record.'.rcd','record')) {	    
			if ( $this->ot_getinside('key',$record.'.rcd' , 'record')){
				$keyfield = $this->retval;
				$data = array_merge ($data,array($keyfield=>$field));
				$this -> datareview = $this->ot_valid_d($data, $record);
			} else {
				$this -> ot_ae('C0010M040',$record,$field);
			}
		} else {
			$this -> ot_ae('C0010M039',$record); 
		}
		
		if (count($this -> errvalid)>0){
			return FALSE;
		} else {
			$this->retarr['key']=$this -> datareview[$keyfield];
			unset($this -> datareview[$keyfield]);
			$this->retarr['record']=$this -> datareview;
			return TRUE;			
		}
	}
		function ot_lock($table,$feature){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		$this->info=$this->ot_readif($table.'.tin',$feature);
		if ($this->ot_in('record', $this->info, $error='C0010M033')){
			if ($this->ot_in('status', $this->info, $error='C0010M027')){
				if ($this->info['status']=='open'){
					$this->info['status']='lock';
					$this->info['lockby']=$this->id;
					$this->info['lockin']=$this->Now();
					$this->ot_write($table.'.tin', $this->info , $feature);
					$this->retval=TRUE;								
				} else {
					if ($this->info['lockby']!=$this->id){
						$this->err='C0010M027';
						$this->ot_ae('C0010M027',$feature.'/'.$table);
						$this->retval=FALSE;		
					} else {
						$this->retval=TRUE;								
					}
					
				}
			}			
		}
		return $this->retval;
	}

	function ot_un_lock($table,$feature){	
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($this->info['lockby']==$this->id){
			$this->info['status']='open';
			$this->info['lockby']='none';
		}
		$this->ot_write($table.'.tin',$this->info,$feature);
		return $this->retval;			
	}	

	protected function ot_valid_d($data, $record, $subset='no', $justfield='no' )
	{
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$read = $this->ot_readif($record.'.rcd' , 'record');
		unset($read['key']);
		$keys = 0;
		$retval = [];
		foreach ($read as $key=>$value) {
			$ByField = array_merge ($value['ByRecord'],$value['ByField']);
			$espec = $this->ot_in($key,$data,'no');
			if ( $this->retval ) {
				$retval = array_merge ( $retval,  array($key => $espec) );
				foreach ($ByField as $name => $inner) {
					if ($name=='FldVld') {
						if ($inner['Name']=='lookin') {
							if (!$this->ot_getinside($espec,$inner['content'].'.bas',$inner['in'])) {
								$this -> ot_ae($this->err,$record,$key,$espec);
								$this -> ot_ae('C0010M052',$record,$key,$espec);
							}
						} elseif ($inner['Name']=='lookfrom') {
							if (!$this->ot_getinside($espec,$inner['content'].'.tas',$inner['in'])) {
								$this -> ot_ae($this->err,$record,$key,$espec);
								$this -> ot_ae('C0010M052',$record,$key,$espec);
							}
						} elseif ($inner['Name']=='bringin') {
							if ($this->ot_getinside($espec,$inner['content'].'.bas',$inner['in'])) {
								$retval = array_merge ($retval, array('%%'.$key => $this->retval));
							} else {
								$this -> ot_ae($this->err,$record,$key,$espec);
								$this -> ot_ae('C0010M052',$record,$key,$espec);
							}
						} elseif ($inner['Name']=='bringfrom') {

							if ($this->ot_getinside($espec,$inner['content'].'.tas',$inner['in'])) {
								$retval = array_merge ($retval, array('%%'.$key  => $this->retval));
							} else {
								$this -> ot_ae($this->err,$record,$key,$espec);
								$this -> ot_ae('C0010M052',$record,$key,$espec);
							}							
						} elseif ($inner['Name']=='isin') {
							if (!$this->ot_exist($espec,$inner['content'].'.bas',$inner['in'])) {
								$this -> ot_ae($this->err,$record,$key,$espec);
								$this -> ot_ae('C0010M052',$record,$key,$espec);
							}
						} elseif ($inner['Name']=='isfrom') {
							if (!$this->ot_exist($espec,$inner['content'].'.tas',$inner['in'])) {
								$this -> ot_ae($this->err,$record,$key,$espec);
								$this -> ot_ae('C0010M052',$record,$key,$espec);
							}
						} elseif ($inner['Name']=='subset') {
							$retval = array_merge (array($key=>$this->ot_valid_d($espec, $inner['in'], 'si')),$retval);
						} elseif ($inner['Name']=='subset_join') {
							$tmp=$this->ot_valid_d($espec, $inner['in'],'si');
							$tmp2 ='';
							foreach ($tmp as $nametmp => $innertmp) {
								$tmp2 .= $innertmp;
							}				
							$retval = array_merge (array($key=>$tmp,'%%'.$key=>$tmp2),$retval);		
						} elseif ($inner['Name']=='in') {
							$this->ot_in($espec,$inner['in']);
						} elseif ($inner['Name']=='minvalue') {
						} elseif ($inner['Name']=='minvalue') {
						} elseif ($inner['Name']=='maxvalue') {
						} elseif ($inner['Name']=='betwen') {
						} elseif ($inner['Name']=='just') {
						} else {
							$this -> ot_ae('C0010M051',$record,$key,$espec);
						}
					}
					if ($name=='FldLen') {
					}
					
					if ($name=='FldEmp') {
						if ($inner) {
							if (empty($espec)) {
								$this -> ot_ae( 'C0010M050', $record, $key, $espec,'Value');
							}
						}
					}
					if ($name=='FldTpe') {
						if (strpos($this->tstring,$inner)) {
							if ($inner=='K') {
								$keys += 1;
							}
							if (!is_string ( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'String');
						} elseif ($inner=='I'){
							if (!is_int( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Integer');
						} elseif ($inner=='F'){
							if (!is_float( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Float');
						} elseif ($inner=='A'){
							if (!is_array( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Array');
						} elseif ($inner=='s'){
							if (!is_array( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Array');
						} elseif ($inner=='B'){
							if (!is_bool( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Bool');
						} elseif ($inner=='D'){
							if (!$this -> DatTmeVal( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Date Time');
						} elseif ($inner=='t'){
							if (!$this -> TmeVal( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Time');
						} elseif ($inner=='d'){
							if (!$this -> DatVal( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Date');
						} elseif ($inner=='V'){
							if (!$this -> DatVal( $espec ))
								$this -> ot_ae('C0010M043',$record,$key,$espec,'Date');
						} else {
							$this -> ot_ae('C0010M049',$record,$key,$inner);
						}
					}
				}
			} else {
				
				if ( !$ByField['FldEmp']==1 ) {
					$this -> ot_ae('C0010M053',$record,$key );
				}
			}
		}
		foreach ($data as $field=>$value) {
			$espec = $this->ot_in($field,$read);
			if (!$this->retval) {
				$this -> ot_ae('C0010M053',$record,$field,$value,$espec);
			}
		}
		if ($subset=='no'){
			if ($keys<1) {
				ot_ae('C0010M040',$record,$field,$value,$espec);}
			if ($keys>1) {
				ot_ae('C0010M041',$record,$field,$value,$espec);}		
		}
		return $retval;
	}	
}	
