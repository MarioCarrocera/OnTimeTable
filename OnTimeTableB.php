<?php
trait TableB{
	
	function ShwFtrTbl(){
		$retval=[];
		foreach ($this->features as $clave => $valor) {
    		if ($this->ot_qexist('index.tas',$clave)){
    			$tmp = $this->ot_read('admin.json',$clave);
    			$retval[$clave]='('.$tmp['nick'].') '.$tmp['name'];
    		}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $retval );
		return $retval;
	}

	function ShwTblFtr($feature='table'){
		$retval=[];
		if ($this->ot_safety('index','t',$feature)){
			$retval = $this->ot_readif('index.tas',$feature);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $retval );
		return $retval;
	}

	function ShwTbl($table,$feature='table'){
		$retval=[];
		if ($this->ot_safety($table,'t',$feature)){
			$retval = $this->ot_readif($table.'.tas',$feature);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $retval );
		return $retval;
	}

	function InsTblIn($table, $field, $data, $feature='table')
	{
		$this->VldClr();	
		$safety= $this->ot_safety_level($table,'b',$feature);
		if ($this->ot_level($safety,"insert")) {
			if ( $this->ot_getinside($table,'index.tas',$feature))  {
				if ( $this->ot_lock($table,$feature)) {
					if ($this->ot_valid($field, $data, $this->info['record'])) {
						$this->ot_addin($this->retarr['key'], $this->retarr['record'],$table.'.tas',$feature);
					}
					$this->ot_un_lock($table,$feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retarr );
		return $this->retval;
	}
	
	function dltTblIn($table, $field, $feature='table')
	{
		$this->VldClr();	
		$safety= $this->ot_safety_level($table,'b',$feature);
		if ($this->ot_level($safety,"delete")) {
			if ( $this->ot_getinside($table,'index.tas',$feature))  {
				if ( $this->ot_lock($table,$feature)) {
					$this->ot_deletein($field, $table.'.tas',$feature);
					$this->ot_un_lock($table,$feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function UpdTblIn($table, $field, $data, $feature='table')
	{
		$this->VldClr();	
		$safety= $this->ot_safety_level($table,'b',$feature);
		if ($this->ot_level($safety,"update")) {
			if ( $this->ot_getinside($table,'index.tas',$feature))  {
				if ( $this->ot_lock($table,$feature)) {
					if ($this->ot_valid($field, $data, $this->info['record'])) {
						$this->ot_changein($this->retarr['key'], $this->retarr['record'],$table.'.tas',$feature);
					}
					$this->ot_un_lock($table,$feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() ,  $this->retarr  );
		return $this->retval;
	}
	
	function UpmTblIn($table, $field, $data, $feature='table')
	{
		$this->VldClr();	
		$safety= $this->ot_safety_level($table,'b',$feature);
		if ($this->ot_level($safety,"update")) {
			if ( $this->ot_getinside($table,'index.tas',$feature))  {
				if ( $this->ot_lock($table,$feature)) {
					if ($this->ot_getinside($field,  $table.'.tas', $feature, 'C0010M008')){	
						$data = array_merge ($this->retval,$data);
						if ($this->ot_valid($field, $data, $this->info['record'])) {
							$this->ot_changein($this->retarr['key'], $this->retarr['record'],$table.'.tas',$feature);
						}
					}
					$this->ot_un_lock($table,$feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retarr  );
		return $this->retval;
	}

	function RlsTblIn($table,$feature='table'){
		if ($this->ot_level($safety,"change")) {
			$this->info=$this->ot_readif($table.'.tin',$feature);
			if ($this->ot_in('record', $this->info, $error='C0010M033')){
				if ($this->ot_in('status', $this->info, $error='C0010M027')){
					if ($this->info['status']=='lock'){
							$this->info['status']='open';
							$this->info['lockby']='none';
							$this->ot_write($table.'.tin',$this->info,$feature);
						} else {
							$this->err='C0010M054';
							$this->ot_ae('C0010M054',$feature.'/'.$table);
							$this->retval=FALSE;								
						}
				} else {
					$this->err='C0010M029';
					$this->ot_ae('C0010M029',$feature.'/'.$table);
					$this->retval=FALSE;												
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;	
	}
}
?>