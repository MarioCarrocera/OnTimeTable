<?php
trait OTTable{

	function InstallTable($name='table')
	{
		if ($this->not_exist($name)) {
			$this->ot_create($name);
		}
		$this->ot_addchangein($name,'table','features.json');
		$this->ot_addchangein($name,'owner','features.json','usr/admin');
		$this->ot_addchangein($name,array('Name'=>'Table Feature','limit'=>0,'OnUse'=>0),'container.json');
		$this->ot_array(array('nick'=>$name,'name'=>'Table Feature'),'admin.json', TRUE,$name);
		$this->ot_addchangein('admin','owner','users.json',$name);			

		$this->CrtFtrTbl($name);

			
		
		$this-> ErrAdd('C0010M049',"Unkwow field type");		
		$this-> ErrAdd('C0010M050',"Not value suplied");		
		$this-> ErrAdd('C0010M051',"Unkwow falidation");		
		$this-> ErrAdd('C0010M052',"Validation fail");		
		$this-> ErrAdd('C0010M053',"Field not in record");		
		$this-> ErrAdd('C0010M054',"unLock Fail, not locked by you");		
	}
}

?>