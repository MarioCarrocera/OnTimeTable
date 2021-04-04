<?php

ini_set('display_errors', true);
error_reporting(E_ERROR | E_PARSE | E_NOTICE | E_WARNING);

$base='ontime/';
$AdminPassword='OT2021Free';
include_once($base."OnTime.php");
$demo=new OnTime();
echo "**********+++++++++++ <br> Basic Table Demo <br> **********+++++++++++ <br> <br>";
echo "********** <br> Create Class  <br> ********** <br> <br>";
$demo->ot_error('basic content exist').'<br>';
echo "**********+++++++++++ <br> Conecting like admin <br> **********+++++++++++ <br> <br>";
echo "Connect('admin','OT2021Free') ";
$demo->Connect('admin',$AdminPassword);
echo  "<br>";$demo->ot_error("Connected!!!");echo "<br>";
echo "**********+++++++++++ <br> Data Dictionary <br> **********+++++++++++ <br> <br>";
echo "********** <br> Show Data Dictionary<br> ********** <br> <br>";
echo "ShwDdd() ";
$demo->ot_show($demo->ShwDdd());
echo "********** <br> Create field RecId in data dictionary <br> ********** <br> <br>";
echo "DddAddFld('RecId', array('FldTpe'=>'K','FldDsc'=>'Record Identifier'))";
$demo->DddAddFld('RecId', array('FldTpe'=>'K','FldDsc'=>'Record Identifier'));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Create field Name in data dictionary <br> ********** <br> <br>";
echo "DddAddFld('Name', array('FldTpe'=>'S','FldDsc'=>'Store the name'))";
$demo->DddAddFld('Name', array('FldTpe'=>'S','FldDsc'=>'Store the name'));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Create field in in data dictionary <br> ********** <br> <br>";
echo "DddAddFld('in', array('FldTpe'=>'S','FldDsc'=>'Store Trait where is instales'))";
$demo->DddAddFld('in', array('FldTpe'=>'S','FldDsc'=>'Store Trait where is instales'));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Create field parameters in data dictionary <br> ********** <br> <br>";
echo "DddAddFld('parameters', array('FldTpe'=>'I','FldDsc'=>'Number of Parameters'))";
$demo->DddAddFld('parameters', array('FldTpe'=>'I','FldDsc'=>'Number of Parameters'));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Create field Dscr in data dictionary <br> ********** <br> <br>";
echo "DddAddFld('Dscr', array('FldTpe'=>'S','FldDsc'=>'Store the Description'))";
$demo->DddAddFld('Dscr', array('FldTpe'=>'S','FldDsc'=>'Store the Description'));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Create field DscPrm in data dictionary <br> ********** <br> <br>";
echo "DddAddFld('DscPrm', array('FldTpe'=>'S','FldDsc'=>'Description of parameters'))";
$demo->DddAddFld('DscPrm', array('FldTpe'=>'S','FldDsc'=>'Description of parameters'));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Create field FlDName in data dictionary <br> ********** <br> <br>";
echo "DddAddFld('DscErr', array('FldTpe'=>'A','FldDsc'=>'Errors tat can present'))";
$demo->DddAddFld('DscErr', array('FldTpe'=>'A','FldDsc'=>'Errors tat can present'));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Show Data Dictionary<br> ********** <br> <br>";
echo "ShwDdd() ";
$demo->ot_show($demo->ShwDdd());
echo "********** <br> Defining Record for sample  <br> ********** <br> <br>";
$name = 'sample';
echo "********** <br> Create Record sample in data dictionary <br> ********** <br> <br>";
echo "CrtRcd($name,'sample of ontime')";
$demo->CrtRcd($name,'sample of ontime');
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Add field RecId Name to record <br> ********** <br> <br>";
echo "RcdAddIn($name,'RecId', array('FldEmp'=>FALSE))";
$demo->RcdAddIn($name,'RecId', array('FldEmp'=>FALSE));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Add field Name to record <br> ********** <br> <br>";
echo "RcdAddIn($name,'Name', array('FldEmp'=>TRUE))";
$demo->RcdAddIn($name,'Name', array('FldEmp'=>TRUE));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Add field in to record <br> ********** <br> <br>";
echo "RcdAddIn($name,'in', array('FldEmp'=>FALSE))";
$demo->RcdAddIn($name,'in', array('FldEmp'=>FALSE));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Add field parameters to record <br> ********** <br> <br>";
echo "RcdAddIn($name,'parameters', array('FldEmp'=>FALSE))";
$demo->RcdAddIn($name,'parameters', array('FldEmp'=>FALSE));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Add field Dscr to record <br> ********** <br> <br>";
echo "RcdAddIn($name,'Dscr', array('FldEmp'=>TRUE))";
$demo->RcdAddIn($name,'Dscr', array('FldEmp'=>TRUE));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Add field DscPrm to record <br> ********** <br> <br>";
echo "RcdAddIn($name,'DscPrm', array('FldEmp'=>TRUE))";
$demo->RcdAddIn($name,'DscPrm', array('FldEmp'=>TRUE));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Add field DscErr to record <br> ********** <br> <br>";
echo "RcdAddIn($name,'DscErr', array('FldEmp'=>TRUE))";
$demo->RcdAddIn($name,'DscErr', array('FldEmp'=>TRUE));
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Show record list <br> ********** <br> <br>";
echo "ShwRecLst() ";
$demo->ot_show($demo->ShwRecLst());
echo "********** <br> Show record  <br> ********** <br> <br>";
echo "ShwRec('sample') ";
$demo->ot_show($demo->ShwRec('sample'));

echo "********** <br> Activate Table feature<br> ********** <br> <br>";
echo "ShwRec('sample') ";
$demo->CrtFtrTbl();
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Creating tables <br> ********** <br> <br>";
echo "CrtTblIn('My sample', 'My Sample', 'sample'";
$demo->CrtTblIn('My sample', 'My Sample', 'sample' );
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "CrtTblIn('Sample 2', 'My Sample', 'sample'";
$demo->CrtTblIn('Sample 2', 'Other sample same record', 'sample' );
echo  "<br>";$demo->ot_error("Created!!!");echo "<br>";
echo "********** <br> Show featrures with tables <br> ********** <br> <br>";
echo "ShwFtrTbl()";
$demo->ot_show($demo->ShwFtrTbl());
echo "********** <br> Show features with tables <br> ********** <br> <br>";
echo "ShwFtrTbl()";
$demo->ot_show($demo->ShwTblFtr('table'));
echo "********** <br> Show tables <br> ********** <br> <br>";
echo "ShwTbl('My sample')";
$demo->ot_show($demo->ShwTbl('My sample'));

echo "********** <br> Insert Records in My Sample <br> ********** <br> <br>";

echo "InsTblIn('My sample' , 'rec 1', array('Name'=>'Just a description','in'=>'Mexico City','parameters'=>8))";
$demo->InsTblIn('My sample' , 'rec 1', array('Name'=>'Just a description','in'=>'Mexico City','parameters'=>8));
$demo->ot_show($demo -> errvalid);

echo "********** <br> Show tables <br> ********** <br> <br>";
echo "ShwTbl('My sample')";
$demo->ot_show($demo->ShwTbl('My sample'));
echo "********** <br> Insert Records in My Sample <br> ********** <br> <br>";


echo "InsTblIn('My sample' , 'rec 2', array('Name'=>'another description','in'=>'Mexico City','parameters'=>8,'DscPrm'=>'explain what do'))";

$demo->InsTblIn('My sample' , 'rec 2', array('Name'=>'another description','in'=>'Mexico City','parameters'=>8,'DscPrm'=>'explain what do'));

$demo->ot_show($demo -> errvalid);

echo "********** <br> Show tables <br> ********** <br> <br>";
echo "ShwTbl('My sample')";
$demo->ot_show($demo->ShwTbl('My sample'));
echo "********** <br> Insert Records in My Sample <br> ********** <br> <br>";


echo "InsTblIn('My sample' , 'rec 3', array('Name'=>'another description','in'=>'Mexico City','parameters'=>8))";
$demo->InsTblIn('My sample' , 'rec 3', array('Name'=>'another description','in'=>'Mexico City','parameters'=>8));
$demo->ot_show($demo -> errvalid);

echo "********** <br> Show tables <br> ********** <br> <br>";
echo "ShwTbl('My sample')";
$demo->ot_show($demo->ShwTbl('My sample'));

	
echo "********** <br> Update and Mix in My Sample <br> ********** <br> <br>";
echo "UpmTblIn('My sample' , 'rec 3', array('Name'=>'refresh again description','DscPrm'=>'who cares'))";
$demo->UpmTblIn('My sample' , 'rec 3', array('Name'=>'refresh my description','DscPrm'=>'who care'));
$demo->ot_show($demo -> errvalid);

echo "********** <br> Show tables <br> ********** <br> <br>";
echo "ShwTbl('My sample')";
$demo->ot_show($demo->ShwTbl('My sample'));


echo "********** <br> Update with replace in My Sample <br> ********** <br> <br>";
echo "UpdTblIn('My sample' , 'rec 2', array('Name'=>'another description','in'=>'Mexico ','parameters'=>2))";	
$demo->UpdTblIn('My sample' , 'rec 2', array('Name'=>'another description','in'=>'Mexico ','parameters'=>2));
$demo->ot_show($demo -> errvalid);

echo "********** <br> Show tables <br> ********** <br> <br>";
echo "ShwTbl('My sample')";
$demo->ot_show($demo->ShwTbl('My sample'));

echo "********** <br> delete in My Sample <br> ********** <br> <br>";
echo "dltTblIn('My sample' , 'rec 1')";	
$demo->dltTblIn('My sample' , 'rec 1');
$demo->ot_show($demo -> errvalid);

echo "********** <br> Show tables <br> ********** <br> <br>";
echo "ShwTbl('My sample')";
$demo->ot_show($demo->ShwTbl('My sample'));


echo "**********+++++++++++ <br> Demo Finish<br> **********+++++++++++ <br> <br>";
?>