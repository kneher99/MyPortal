<?php
namespace MyPortal\Queries\mathGroupQueries;

include "generalQueries.php";
use MyPortal\Queries\generalQueries;

class MathGroups
{

	public function getGroups(){

		 $query = "select ChartID,ChartName, format(dt_log, 'D', 'en-US' ) AS dt_log
		 		   from tblMathGroupChart
		 ";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		
		  $rows = odbc_num_rows($rs);
		  $rows = array();

		  while ($row = odbc_fetch_array($rs)) {
		    $rows[] =  $row;
		  }  

		  echo json_encode($rows);

		  odbc_free_result($rs);

		  odbc_close($conn);

	}

	public function setGroups(){

		 $query = "update tblUser
		 			set USER_FNAME = '" . $userArray['fName'] . "'" . "
		 			,USER_LNAME = '". $userArray['lName']  . "'" . "
		 			,USER_EMAIL = '" . $userArray['email'] . "'" . "
		  		    where USER_ID ='" . $userArray['hdnUserID'] ."'";  
		    	
		  echo $query;
		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);


	}

	public function createMathGroup($groupArray){

		 $query = "insert into tblMathGroupChart
		 			(ChartID,ChartName)
		 		   VALUES(
		 				NewID()
		 				,'" . $groupArray['fName'] . "'
		 			)";
		    	
		  echo $query;
		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);

	}


}

?>