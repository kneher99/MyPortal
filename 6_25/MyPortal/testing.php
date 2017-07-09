

<?php
	
	/*
	PHP MSSQL Example

	Replace data_source_name with the name of your data source.
	Replace database_username and database_password
	with the SQL Server database username and password.
	*/
	$config = parse_ini_file('../MPconfig.ini'); 

// Try and connect to the database

	// Connect to the data source and get a handle for that connection.
	$conn=odbc_connect($config['data_source'],$config['username'],$config['password']);
	if (!$conn){
	    if (phpversion() < '4.0'){
	      exit("Connection Failed: . $php_errormsg" );
	    }
	    else{
	      exit("Connection Failed:" . odbc_errormsg() );
	    }
	}

	// This query generates a result set with one record in it.
	$sql="SELECT * from tblUser where user_fname = 'Kenny'";

	# Execute the statement.
	$rs=odbc_exec($conn,$sql);
	$rows = odbc_num_rows($rs);
	// Fetch and display the result set value.
	if (!$rs){
	    exit("Error in SQL");
	}
	//odbc_result_all($rs, 'id="users" class="listing" BGCOLOR="#eeeeee" border="1"');
	$sessUserID = odbc_result($rs,'user_id');
			 print($sessUserID);
				session_start();
		$_SESSION["userID"] = $sessUserID;

		print 'Here' . $_SESSION["userID"];

	// Disconnect the database from the database handle.
	odbc_close($conn);

	//echo $rows;
?>
<a href="testing2.php">Pg 2</a>
