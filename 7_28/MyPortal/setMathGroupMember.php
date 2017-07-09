<?php
	require_once('/includes/sessions.php');
	// The request is a JSON request.
	// We must read the input.
	// $_POST or $_GET will not work!
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	require_once("/classes/MathGroups.php");

	$data = file_get_contents("php://input");

	$objData = json_decode($data);
	//echo $objData->newGroupName;

	$qryNewMember = new MyPortal\Queries\mathGroupQueries\MathGroups();
	//echo $uID;
	$qryNewMember->setGroupMember($objData->tableID,$objData->selectedID,$objData->newGroup1,$objData->newGroup2);

	$qryNewMember->getGroupTable($objData->tableID);
	//var_dump($qryMathGroups);
	//return $qryMathGroups;
	








?>