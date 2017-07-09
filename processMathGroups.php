<?php
	require_once('/includes/sessions.php');
	// The request is a JSON request.
	// We must read the input.
	// $_POST or $_GET will not work!
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	require_once("/classes/MathGroups.php");

	$config = parse_ini_file('../MPconfig.ini'); 


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	echo $_POST;
   	}

   	else{
   		
		$qryUser = new MyPortal\Queries\mathGroupQueries\MathGroups();
		//echo $uID;
		$qryUser->getGroups();
		
		return $qryUser;
   	}
	

	//$data = file_get_contents("php://input");

	//$objData = json_decode($data);







?>