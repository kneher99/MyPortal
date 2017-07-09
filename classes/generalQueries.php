<?php
namespace MyPortal\Queries\generalQueries;



class userInfo
{
    public function getUserInfo($userID) {

		try {
		    $qryConn = $this->fncConn();
		} catch (Exception $e) {
		    echo $e->getMessage();
		}
			
		
		 //echo $qryConn["data_source"];

		 $query = "select USER_ID, USER_FNAME, USER_LNAME, USER_EMAIL, dateCreated, avatar
		  			from tblUser 
		  		    where USER_ID ='" . $userID ."'";  
		  //print $query;		    	
		  
		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);
		  $rowCount = odbc_num_rows($rs);  
		  
		  $rows = array();

		  while ($row = odbc_fetch_array($rs)) {
		    $rows[] =  $row;
		  }  

		  echo json_encode($rows);
		  odbc_free_result($rs);

		  odbc_close($conn);
		  
		 // print $rows[];
    }

    public function fncConn() {

    	$connArray = array(
    		"data_source" => "MyPortal",
    		"username" => "PortalUser",
    		"password"  =>  "MAUf2a8Tg7DkjXWwtscv"
		);

		return $connArray;

	}

	public function updateProfile($userArray) {

		try {
		    $qryConn = $this->fncConn();
		} catch (Exception $e) {
		    echo $e->getMessage();
		}

		 $query = "update tblUser
		 			set USER_FNAME = '" . $userArray['fName'] . "'" . "
		 			,USER_LNAME = '". $userArray['lName']  . "'" . "
		 			,USER_EMAIL = '" . $userArray['email'] . "'" . "
		  		    where USER_ID ='" . $userArray['hdnUserID'] ."'";  
		    	
		  echo $query;
		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);

	}

}












?>