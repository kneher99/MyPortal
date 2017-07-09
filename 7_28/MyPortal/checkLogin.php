<?php

// The request is a JSON request.
// We must read the input.
// $_POST or $_GET will not work!
$config = parse_ini_file('../MPconfig.ini'); 

$data = file_get_contents("php://input");

$objData = json_decode($data);

// perform query or whatever you wish, sample:
//echo $objData->username;
//echo $objData->password;


 $query = "select top 1 tu.user_id, user_fname, user_lname, avatar
  			from tblUser tu
  		   join tblLogin tl on tu.user_id = tl.UserID
  		   where tu.user_email='" . $objData->username . "' AND tl.password='" . $objData->password . "'"; 

  //echo $query;
  $conn=odbc_connect($config['data_source'],$config['username'],$config['password']);

  $rs=odbc_exec($conn,$query);
  $rows = odbc_num_rows($rs);
	// Fetch and display the result set value.
	if (!$rs){
	    exit("Error in SQL");
	}
	if ($rows > 0){
		$sessUserID = odbc_result($rs, "user_id");
		$sessfirstName = odbc_result($rs, "user_fname");
		$sesslastName = odbc_result($rs, "user_lname");
		$sessAvatar = odbc_result($rs, "avatar");
		
		session_start();
		$value = 'My Portal Cookie';
		setcookie("MyPortal", $value);
		setcookie("MyPortal", $value, time()+3600); 	
		//echo $sessUserID;
		$_SESSION["userID"] = $sessUserID;
		$_SESSION["firstName"] = $sessfirstName;
		$_SESSION["lastName"] = $sesslastName;
		$_SESSION["avatar"] = $sessAvatar;
	} 

	else

	{
		echo 0;
	}

	odbc_close($conn);

?>
