<?php
require_once('/includes/sessions.php');
// The request is a JSON request.
// We must read the input.
// $_POST or $_GET will not work!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("/classes/generalQueries.php");

$config = parse_ini_file('../MPconfig.ini'); 

if (isset($_FILES)) {

	$imgPath = $_SERVER["DOCUMENT_ROOT"] . '\MyPortal\assets\avatars\\';

	$target_file = $imgPath . basename($_FILES["fileAvatar"]["name"]);

	$path_parts = pathinfo($_FILES["fileAvatar"]["name"]);

	$extension = $path_parts['extension'];

	$newFileName = $imgPath . $_SESSION['userID'] . '.' . $extension;

	
	var_dump($newFileName);

	$qryAvatar = new MyPortal\Queries\generalQueries\userInfo();
	$qryAvatar->updateAvatar($extension);

	//$data = file_get_contents("php://input");
	move_uploaded_file($_FILES["fileAvatar"]["tmp_name"], $target_file);

	$_SESSION["avatar"] =  $_SESSION["userID"] . '.' . $extension;

	rename ($target_file, $newFileName);
}
//$objData = json_decode($data);

//var_dump($_POST);

//var_dump($_FILES["fileAvatar"]["name"]);



$qryUser = new MyPortal\Queries\generalQueries\userInfo();
//echo $uID;
$qryUser->updateProfile($_POST);

	
//return $qryUser;
header('Location: profile.php');







?>