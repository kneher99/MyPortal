<?php
namespace MyPortal\Queries\mathQuizzes;

include "generalQueries.php";
use MyPortal\Queries\generalQueries;

class MathQuizzes
{

	public function setScores($score,$mathType,$mathLevel){
		//echo $_SESSION['userID'];
		 $query = "
		 		   DECLARE @myLoginID uniqueidentifier;

		 		   select @myLoginID = loginID from tblLogin where userID = '" . $_SESSION['userID'] . "'

		 		   insert into tblMathScores
		 			(mathScoreID,mathscore,mathType,difficultylevel,dt_log,loginID)
		 		   VALUES(
		 				NewID()
		 				," . $score . "
		 				,'" . $mathType . "'
		 				," . $mathLevel . "
		 				,getDate()
		 				,cast(@myLoginID as uniqueidentifier)
		 			)";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);
	}

	public function getMathQuizData($userID,$mathType){
		if ($userID != 0){
			 $query = "
		 		   		DECLARE @myLoginID uniqueidentifier;

		 		   		select @myLoginID = loginID from tblLogin where userID = '" . $userID . "'	

			 			select tms.mathScore, tms.mathType, tms.loginID, FORMAT(tms.dt_log, 'MM/dd/yyyy h:mmtt') as DateAndTime, tms.difficultyLevel, tu.user_fname, tu.user_fname
			 			from tblMathScores tms
						join tblLogin tl on tms.loginID = tl.loginID
						join tblUSER tu on tl.UserID = tu.USER_ID
			 		    where tl.loginID = cast(@myLoginID as uniqueidentifier)";
			if ($mathType != 0){

				$query = $query . " and ";
			}

		}    	
		else{
			 $query = 
			 		"select tms.mathScore, tms.mathType, tms.loginID, FORMAT(tms.dt_log, 'MM/dd/yyyy h:mmtt') as DateAndTime, tms.difficultyLevel, tu.user_fname, tu.user_fname
			 		 from tblMathScores tms
					 join tblLogin tl on tms.loginID = tl.loginID
					 join tblUSER tu on tl.UserID = tu.USER_ID";	

		 	if ($mathType != 0){
		 		$query = $query . " where ";
		 	}

		}

		if ($mathType != 0){
			$query = $query . "mathType = '" . $mathType . "'";
		}

		  $thisQry =  new generalQueries\userInfo();
		  //echo $query;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);
		  $rowCount = odbc_num_rows($rs);  
		  
		  $rows = array();

		  while ($row = odbc_fetch_array($rs)) {
		    $rows[] =  $row;
		  }  

		  return $rows;
		  odbc_free_result($rs);

		  odbc_close($conn);		

	}



}