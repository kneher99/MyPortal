<?php
	require_once('/includes/sessions.php');
	// The request is a JSON request.
	// We must read the input.
	// $_POST or $_GET will not work!
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	require_once("/classes/MathGroups.php");

	$qryMembers = new MyPortal\Queries\mathGroupQueries\MathGroups();
	//echo $uID;
	$qryMembers->getGroupMembers($_GET["filter"],$_GET["tableID"]);
	
	return $qryMembers;


?>