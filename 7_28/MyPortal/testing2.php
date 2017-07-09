<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require("/classes/generalQueries.php");

$qryUser = new MyPortal\Queries\generalQueries\userInfo();



$myArray = $qryUser->getAllUsers();	


echo count($myArray);

print_r($myArray[1]['USER_ID']);

/*var_dump($myArray);
var_dump(get_object_vars($qryUser));
if (!empty($myArray)) {
	echo 'Nothing';
}

else{

	print_r(array_values($myArray));
}*/



?>