<?php 
	require_once('/includes/sessions.php');
	// The request is a JSON request.
	// We must read the input.
	// $_POST or $_GET will not work!
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	require_once("/classes/MathQuiz.php");

	$data = file_get_contents("php://input");

	$objData = json_decode($data);
	//echo $objData->score;

	$qryMathQuiz = new MyPortal\Queries\mathQuizzes\MathQuizzes();
	//echo $uID;
	$qryMathQuiz->setScores($objData->score,$objData->mathType,$objData->mathLevel);

	//$qryMembers->getGroupMembers(0,0);
	//var_dump($qryMathGroups);
	//return $qryMathGroups;







?>