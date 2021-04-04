<?php
trait TableA{	
	function CrtFtrTbl($feature='table'){
		if ($this->ot_can('create','table') and $this->ot_can('create',$feature)) {
			if ($this->ot_exist($feature)){
				if ($this->not_exist('index.tas',$feature)){
					$this->ot_addin('index','Main index','index.tas',$feature);
					$this->ot_addin($this->id,'owner','index.tus',$feature);
					$this->ot_addin($feature.'/index.tus','owner','basic.acc','usr/'.$this->id);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function CrtTblIn($table, $desc, $recname ='same' , $feature='table')
	{
		if ($this->ot_can('change','table') and $this->ot_can('change',$feature)) {
   			$tmp = $this->ot_readif('index.tas',$feature);
			if ($this->not_in($table,$tmp) ){
				if ($recname=='same') {
					$recname=$table;
				}
				if ($this->ot_exist($recname.'.rcd','record')) {
					$this->ot_addin($table,$desc,'index.tas',$feature);
					$this->ot_addin($feature.'/'.$table, $this->id, $recname.'.ntb','record');
					$this->ot_addin('record',$recname, $table.'.tin',$feature);
					$this->ot_addin('status','open',$table.'.tin',$feature);
					$this->ot_addin('records','0',$table.'.tin',$feature);
					$this->ot_addin('style','table',$table.'.tin',$feature);
					$this->ot_addin($this->id,'owner',$table.'.tus',$feature);
					$this->ot_addin($feature.'/'.$table.'.tus','owner','basic.acc','usr/'.$this->id);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function RmvTblIn($table,  $feature='table')
	{
		if ($this->ot_can('change','table') and $this->ot_can('change',$feature)) {
			$tmp = $this->ot_readif('index.tas',$feature);
			if ($this->ot_in($table,$tmp) ) {
				if ($this->ot_getinside('record',$table.'.tin',$feature)) {
					$recname= $this->retval;
					$this->ot_deletein($table,'index.tas',$feature);
					$this->ot_deletein($feature.'/'.$table.'.tas', $this->id, $recname.'.ntb','record');
					$this->ot_deleteinside($table.'.tin',$feature,'no');
					$this->ot_deleteinside($table.'.tgr',$feature,'no');
					$this->ot_deleteinside($table.'.tus',$feature,'no');
					$this->ot_deleteinside($table.'.tan',$feature,'no');
					$this->ot_deleteinside($table.'.tpl',$feature,'no');
					$this->ot_deleteinside($table.'.tas',$feature,'no');
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function AnnInAdd($code, $kind='b', $feature='basic')
	{
		$safety= $this->ot_safety_level($code,$kind,$feature);
		if ($this->ot_level($safety,"create")) {
			if ($this->not_exist($code.'.'.$kind.'an',$feature)) {
				$this->ot_addin($this->id,'owner',$code.'.'.$kind.'an',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function AnnInRmv($code, $kind='b', $feature='basic')
	{
		$safety= $this->ot_safety_level($code,$kind,$feature);
		if ($this->ot_level($safety,"remove")) {
			if ($this->ot_exist($code.'.'.$kind.'an',$feature)) {
				$this->ot_deleteinside($code.'.'.$kind.'an',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function PblInAdd($code, $kind='b', $feature='basic')
	{
		$safety= $this->ot_safety_level($code,$kind,$feature);
		if ($this->ot_level($safety,"create")) {
			if ($this->not_exist($code.'.ban',$feature,"C0010M038")) {
				if ($this->not_exist($code.'.'.$kind.'pl',$feature)) {
					$this->ot_addin($this->id,'owner',$code.'.'.$kind.'pl',$feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function PblInRmv($code, $kind='b', $feature='basic')
	{
		$safety= $this->ot_safety_level($code,$kind,$feature);
		if ($this->ot_level($safety,"remove")) {
			if ($this->ot_exist($code.'.'.$kind.'pl',$feature)) {
				$this->ot_deleteinside($code.'.'.$kind.'pl',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrInAdd($code, $user, $level , $kind='b', $feature='basic')
	{
		$safety= $this->ot_safety_level($code,$kind,$feature);
		if ($this->ot_level($safety,"create")) {
			if ($this->ot_exist($user,'usr')) {
				if ($this->ot_in($level,$this->level)) {
					if ($this->ot_exist($code.'.'.$kind.'as',$feature)) {
						$this->ot_addin($user,$level,$code.'.'.$kind.'us',$feature);
						$this->ot_addin($feature.'/'.$code.'.'.$kind.'as',$level,$feature.'.acc','usr/'.$user);
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function GrpInAdd($code, $group, $level , $kind='b', $feature='basic')
	{
		if ($this->ot_feature('grp')) {
			$safety= $this->ot_safety_level($code,$kind,$feature);
			if ($this->ot_level($safety,"create")) {
				if ($this->ot_exist($group,'grp')) {
					if ($this->ot_in($level,$this->level)) {
						if ($this->ot_exist($code.'.'.$kind.'as',$feature)) {
							$this->ot_addin($group,$level,$code.'.'.$kind.'gr',$feature);
							$this->ot_addin($feature.'/'.$code.'.'.$kind.'as',$level,$feature.'.acc','grp/'.$group);
						}
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrInChg($code, $user, $level , $kind='b', $feature='basic')
	{
		$safety= $this->ot_safety_level($code,$kind,$feature);
		if ($this->ot_level($safety,"change")) {
			if ($this->ot_exist($user,'usr')) {
				if ($this->ot_in($level,$this->level)) {
					if ($this->ot_exist($code.'.'.$kind.'as',$feature)) {
						$this->ot_changein($user,$level,$code.'.'.$kind.'us',$feature);
						$this->ot_changein($feature.'/'.$code.'.'.$kind.'as',$level,$feature.'.acc','usr/'.$user);
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function GrpInChg($code, $group, $level , $kind='b', $feature='basic')
	{
		if ($this->ot_feature('grp')) {
			$safety= $this->ot_safety_level($code,$kind,$feature);
			if ($this->ot_level($safety,"create")) {
				if ($this->ot_exist($group,'grp')) {
					if ($this->ot_in($level,$this->level)) {
						if ($this->ot_exist($code.'.'.$kind.'as',$feature)) {
							$this->ot_changein($group,$level,$code.'.'.$kind.'gr',$feature);
							$this->ot_changein($feature.'/'.$code.'.'.$kind.'as',$level,$feature.'.acc','grp/'.$group);
						}
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrInDlt($code, $user, $kind='b', $feature='basic')
	{
		$safety= $this->ot_safety_level($code,$kind,$feature);
		if ($this->ot_level($safety,"remove")) {
			if ($this->ot_exist($user,'usr')) {
				if ($this->ot_exist($code.'.'.$kind.'as',$feature)) {
					$this->ot_deletein($user,$code.'.'.$kind.'us',$feature);
					$this->ot_deletein($feature.'/'.$code.'.'.$kind.'as',$feature.'.acc','usr/'.$user);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function GrpInDlt($code, $group, $level , $kind='b', $feature='basic')
	{
		if ($this->ot_feature('grp')) {
			$safety= $this->ot_safety_level($code,$kind,$feature);
			if ($this->ot_level($safety,"remove")) {
				if ($this->ot_exist($group,'grp')) {
					if ($this->ot_exist($code.'.'.$kind.'as',$feature)) {
						$this->ot_deletein($group,$level,$code.'.'.$kind.'gr',$feature);
						$this->ot_deletein($feature.'/'.$code.'.'.$kind.'as',$level,$feature.'.acc','grp/'.$group);
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
}
?>