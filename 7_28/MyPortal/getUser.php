<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	require_once("/classes/generalQueries.php");
	
	$data = file_get_contents("php://input");

	$objData = json_decode($data);

	$uID = $objData->userID;
	$qryUser = new MyPortal\Queries\generalQueries\userInfo();
	//echo $uID;
	$qryUser->getUserInfo($uID);

	
	return $qryUser;


?>