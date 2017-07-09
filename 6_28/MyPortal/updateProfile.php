<?php

// The request is a JSON request.
// We must read the input.
// $_POST or $_GET will not work!

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$config = parse_ini_file('../MPconfig.ini'); 

$data = file_get_contents("php://input");

$objData = json_decode($data);

echo $objData;







?>