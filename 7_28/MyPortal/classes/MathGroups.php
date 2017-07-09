<?php
namespace MyPortal\Queries\mathGroupQueries;

include "generalQueries.php";
use MyPortal\Queries\generalQueries;

class MathGroups
{

	public function getGroups(){

		 $query = "select ChartID,ChartName, format(dt_log, 'D', 'en-US' ) AS dt_log
		 		   from tblMathGroupChart
		 		   where Active = 1
		 		   order by dt_log desc
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

	public function updateGroup($groupNum1,$groupNum2,$tableID,$userID){

		 $query = "  
		 	  update tmcg
			  set 
			   tmcg.GroupNum1 = '" . $groupNum1 . "'
				,tmcg.GroupNum2 = '" . $groupNum2 . "'
				from tblMgComboGroups tmcg
				join tblMgChart_MgUser tmcm on tmcg.mathGroupComboID = tmcm.ComboID
			  where tmcm.ChartID = '" . $tableID . "'
				and tmcm.mgUserID = '" . $userID . "' 
			";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();
		    	
		  echo $query;
		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);


	}

	public function createMathGroup($group){
		//var_dump($group);
		 $query = "insert into tblMathGroupChart
		 			(ChartID,ChartName,dt_log,Active,addOper)
		 		   VALUES(
		 				NewID()
		 				,'" . $group . "'
		 				,getDate()
		 				,1
		 				,'" . $_SESSION['userID'] . "'
		 			)";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);

	}

		public function createMathGroupMember($memberName){
		//var_dump($group);
		 $query = "insert into tblMgUsers
		 			(mgUserID,mgUserName,Active)
		 		   VALUES(
		 				NewID()
		 				,'" . $memberName . "',1)";

		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);

	}

	public function deactivateGroupTable($groupID){

		 $query = "update tblMathGroupChart
		 			set Active = 0
		 			where ChartID = 
		 				'" . $groupID . "'
		 			";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);		

	}

	public function updateGroupMember($memberID,$memberName){

		 $query = "update tblMgUsers
		 			set mgUserName = '" . $memberName . "'
		 			where mgUserID = 
		 				'" . $memberID . "'
		 			";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);		

	}	

	public function deactivateGroupMember($memberID){

		 $query = "update tblMgUsers
		 			set Active = 0
		 			where mgUserID = 
		 				'" . $memberID . "'
		 			";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);		

	}

	public function deactivateGroupMemberFromTable($memberID,$tableID){

		 $query = "update tblMgChart_MgUser
		 			set Active = 0
		 			where mgUserID = 
		 				'" . $memberID . "'
		 			and ChartID = '" . $tableID . "'";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);		

	}


	public function getGroupTable($group){
		//var_dump($group);
		$query = "  select mcg.GroupNum1, mcg.GroupNum2, mu.mgUserID, mu.mgUserName, mgc.ChartName
  					from tblMgComboGroups mcg
  					join tblMgChart_MgUser mcm on mcg.mathGroupComboID = mcm.ComboID
  					join tblMgUsers mu on mcm.mgUserID = mu.mgUserID
  					join tblMathGroupChart mgc on mcm.ChartID = mgc.ChartID
  					where mgc.ChartID = '" . $group . "'
  					and mcm.active = 1
  					order by mgUserName";
		    	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);	

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

	public function getGroupMembers($filter,$tableID){
		if ($filter == 1){
			 $query = "select mgUserID,mgUserName
			 		   from tblMgUsers
			 		   where Active = 1
			 		   and mgUserID not in (
						select mu.mgUserID
	  					from tblMgComboGroups mcg
	  					join tblMgChart_MgUser mcm on mcg.mathGroupComboID = mcm.ComboID
	  					join tblMgUsers mu on mcm.mgUserID = mu.mgUserID
	  					join tblMathGroupChart mgc on mcm.ChartID = mgc.ChartID
	  					where mgc.ChartID = '" . $tableID . "'
	  					and mcm.active = 1

			 		   	)
			 		   order by mgUserName
			 ";


		}

		else{
			 $query = "select mgUserID,mgUserName
			 		   from tblMgUsers
			 		   where Active = 1
			 		   order by mgUserName
			 ";
		}
		    	
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

	public function setGroupMember($tableID,$memberID,$group1,$group2){

		 $query = " 
		 			DECLARE @newMemberID uniqueidentifier;
					SET @newMemberID = NEWID();

		 			insert into tblMgChart_MgUser
		 			(ChartID, mgUserID, Active, dt_log, ComboID)
  					values("
					. "'". $tableID ."'
					 ,'". $memberID . "'
					 ,1
					 ,getDate()
					 ,@newMemberID
					  );

					 insert into tblMgComboGroups
					 (mathGroupComboID, GroupNum1, GroupNum2, dt_log)
					 values(
					  @newMemberID
					  ,'" . $group1 . "'
					  ,'" . $group2 . "'
					  ,getDate()
					  );

		 ";
		    //echo $query;	
		  $thisQry =  new generalQueries\userInfo();
		  //echo $thisQry;
		  $qryConn = $thisQry->fncConn();

		  $conn=odbc_connect($qryConn["data_source"],$qryConn["username"],$qryConn["password"]);

		  $rs=odbc_exec($conn,$query);		

		  odbc_free_result($rs);

		  odbc_close($conn);

	}

}

?>