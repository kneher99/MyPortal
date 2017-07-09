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
	//print_r($objData->tableData);
	$qryMembers = new MyPortal\Queries\mathGroupQueries\MathGroups();
       foreach($objData->tableData as $obj) {
          $qryMembers->updateGroup($obj->GroupNum1,$obj->GroupNum2,$objData->tableID,$obj->mgUserID);
       }
	
	$qryMembers->getGroupTable($objData->tableID);








?>