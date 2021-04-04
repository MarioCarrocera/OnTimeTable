<?php
include_once("OnTimeAllways.php");
include_once("OnTimeContent.php");
include_once("OnTimeConvert.php");
include_once("OnTimeCripto.php");
include_once("OnTimeDateA.php");
include_once("OnTimeDateB.php");
if (file_exists($base."OnTimeDebugB.php")) {
	include_once("OnTimeDebugB.php");
} else {
	include_once("OnTimeDebug.php");
}
include_once("OnTimeFunctions.php");
include_once("OnTimeValid.php");
include_once("OnTimeCoreA.php");
include_once("OnTimeCoreB.php");
include_once("OnTimeGrpsA.php");
include_once("OnTimeGrpsB.php");
include_once("OnTimeBasicA.php");
include_once("OnTimeBasicB.php");
include_once("OnTimeDDD.php");
include_once("OnTimeRecord.php");
include_once("OnTimeTableA.php");
include_once("OnTimeTableB.php");
include_once("OTiTable.php");

class OnTime{
	use CoreA, CoreB, GrpsA, GrpsB, BasicA, BasicB, DtDc,Record, TableA, TableB;
	use Allways, Content, Convert, Cripto, DateA, DateB, Debug, Functions, Valid;
	use OTTable; 
}
?>