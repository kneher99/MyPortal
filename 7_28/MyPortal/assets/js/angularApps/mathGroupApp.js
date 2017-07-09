var myMathGroupApp = angular.module('myMathGroupApp',['ngRoute']);

myMathGroupApp.factory("tableIDFactory",function(){
        var tableIDResponse = '';

        return {
            saveTableID:function (data) {
                tableIDResponse = data;
                //console.log('here'+data);
            },
            getTableID:function () {
                return tableIDResponse;
            }
        };
});

myMathGroupApp.config(function ($routeProvider) {
    
    $routeProvider
    
    .when('/mathGrouping', {
    	templateUrl: 'templates/GroupTable.php',
        controller: 'mgController'
    })
    
    .when('/groupAdmin', {
    	templateUrl: 'templates/groupAdmin.php',
        controller: 'myMathGroupAdmin'
    })


    
});

myMathGroupApp.controller('mgController', ['$scope', '$http', 'tableIDFactory', function($scope, $http, tableIDFactory) {


	$scope.members = '';
	$scope.firstGroupNum = '';
	$scope.secondGroupNum = '';
	$scope.getMembersUrl = 'getMembers.php';
	$scope.getTableDataUrl = 'getTableData.php';	
	$scope.addGroupMemberUrl = 'setMathGroupMember.php';
	$scope.deavtivateUserFromTableUrl = 'deactivateGroupMemberTable.php';
	$scope.updateGroupTableUrl = 'updateMathGroup.php';
	$scope.getGroupRows = '';
	$scope.selectedID = '';
	$scope.getTableData = '';
	$scope.tableID = tableIDFactory.getTableID();
	$scope.tableData = '';
	$scope.newGroup1='';
	$scope.newGroup2='';
	$scope.selectedID='';
	$scope.activeSubmit = '1';
	
	$http.get($scope.getMembersUrl, {params: {filter: '1', tableID: $scope.tableID}}).success(function(data, status) {
		//$scope.status = status;
		//$scope.data = data;

		$scope.members = data; // Show result from server in our <pre></pre> element
		//console.log($scope.members);
		
	}).error(function(data, status) {
		$scope.data = data || "Request failed";
		$scope.status = status;			
	});		

	$scope.getTableData = function() {
		$scope.tableID = tableIDFactory.getTableID();
		//console.log($scope.tableID);
		$http.post($scope.getTableDataUrl, { "tableID" : $scope.tableID}).success(function(data, status) {
			//$scope.status = status;
			//$scope.data = data;

			$scope.tableData = data; // Show result from server in our <pre></pre> element
			$scope.tableName = $scope.tableData[0]['ChartName'];
			
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});			


	}

	$scope.saveGroup = function(){

		console.log($scope.tableData);
		$http.post($scope.updateGroupTableUrl, { "tableID" : $scope.tableID, "tableData" : $scope.tableData})
			.success(function(myData, status) {
			//$scope.tableData = myData; 
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	

		if ($scope.selectedID != null){
			$scope.addNewMember();

		}
	}

	$scope.addNewMember = function(){
		$http.post($scope.addGroupMemberUrl, { "tableID" : $scope.tableID, "selectedID" : $scope.selectedID, "newGroup1" : $scope.newGroup1, "newGroup2" : $scope.newGroup2})
			.success(function(myData, status) {
			$scope.tableData = myData; 
			$scope.refreshMemberDropDown();
			$scope.selectedID = null;
			$scope.newGroup1 = '';
			$scope.newGroup2 = '';
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});			

	}
	
	$scope.deactivateTableMember = function(id){
		//console.log(id);
		$http.post($scope.deavtivateUserFromTableUrl, { "tableID" : $scope.tableID, "memberID" : id})
			.success(function(myData, status) {
			$scope.tableData = myData; 
			$scope.refreshMemberDropDown();
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	

	}	

	$scope.refreshMemberDropDown = function (){
		$http.get($scope.getMembersUrl, {params: {filter: '1', tableID: $scope.tableID}}).success(function(data, status) {
			//$scope.status = status;
			//$scope.data = data;

			$scope.members = data; // Show result from server in our <pre></pre> element
			//console.log($scope.members);
			
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	
	}		

	$scope.checkForDuplicatesG1 = function() {
		$scope.duplicateMsg = '1';
		$scope.activeSubmit = '1';
		for(var i=0;i<$scope.tableData.length;i++){
		    if($scope.tableData[i]['GroupNum1']===$scope.newGroup1){
		    	//console.log($scope.tableData[i]['GroupNum1']);
		        $scope.duplicateMsg = '0';
		        $scope.newGroup1 = '';
		        $scope.activeSubmit = 0;
		    }
		}		
	}

	$scope.checkForDuplicatesG2 = function() {
		$scope.duplicateMsgG2 = '1';
		$scope.activeSubmit = '1';
		for(var i=0;i<$scope.tableData.length;i++){
		    if($scope.tableData[i]['GroupNum2']===$scope.newGroup2){
		    	//console.log($scope.tableData[i]['GroupNum2']);
		        $scope.duplicateMsgG2 = '0';
		        $scope.newGroup2 = '';
		        $scope.activeSubmit = 0;
		    }
		}		
	}	


}]);


myMathGroupApp.controller('myMathGroupAdmin', ['$scope', '$http', 'tableIDFactory', function($scope, $http, tableIDFactory) {

	$scope.getUrl = 'getMathGroups.php';
	$scope.getMembers = 'getMembers.php';	
	$scope.setUrl = 'processMathGroups.php';
	$scope.setNewMemberUrl = 'processNewMgMember.php';
	$scope.deleteUrl = 'deactivateMathGroup.php';
	$scope.deleteGroupMemberUrl = 'deactivateGroupMember.php'
	$scope.updateGroupMemberUrl = 'updateGroupMember.php'
	$scope.GroupName = '';
	$scope.newMathGroup = '';
	$scope.newMember = '';
	$scope.updateMemberName = '';
	$scope.members = '';
	$scope.updateSuccessful = 0;
	$scope.updateSuccessfulMsg = 'User updated!';

	$scope.tables = '';
	$http.get($scope.getUrl).success(function(data, status) {
		//$scope.status = status;
		//$scope.data = data;

		$scope.tables = data; // Show result from server in our <pre></pre> element
		
		
	}).error(function(data, status) {
		$scope.data = data || "Request failed";
		$scope.status = status;			
	});	

	$http.get($scope.getMembers, {params: {filter: '0', tableID: '0'}}).success(function(data, status) {
		//$scope.status = status;
		//$scope.data = data;

		$scope.members = data; // Show result from server in our <pre></pre> element
		
		
	}).error(function(data, status) {
		$scope.data = data || "Request failed";
		$scope.status = status;			
	});	

	$scope.goToMathGroup = function(id) {
		tableIDFactory.saveTableID(id);
		window.location.href='MathGroups.php#/mathGrouping';

	}		

	$scope.deleteMathGroup = function(id){

		$http.post($scope.deleteUrl, { "groupID" : id}).success(function(myData, status) {
			$scope.tables = myData; 
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});			

	}

	$scope.deleteMathGroupMember = function(id){

		$http.post($scope.deleteGroupMemberUrl, { "memberID" : id}).success(function(myData, status) {
			//$scope.status = status;
			//$scope.data = data;
			$scope.members = myData; // Show result from server in our <pre></pre> element
			/*if ($scope.result == '0'){
				$scope.msgReturn = "<span style='color:red;'>Sorry, username and password combination not found.  Please try again or open a new account.</span>";
				$scope.msgReturn = $sce.trustAsHtml($scope.msgReturn);
			}
			else{
				window.location.href='index.php?';
			}*/
			//console.log($scope.tables);
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});			

	}

	$scope.addNewTable = function() {
		//console.log($scope.newMathGroup);
		$http.post($scope.setUrl, { "newGroupName" : $scope.newMathGroup}).success(function(myData, status) {

			$scope.tables = myData; // Show result from server in our <pre></pre> element

		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	

	}

	$scope.addNewMember = function() {
		//console.log($scope.newMathGroup);
		$http.post($scope.setNewMemberUrl, { "newMemberName" : $scope.newMember}).success(function(myData, status) {

			$scope.members = myData; // Show result from server in our <pre></pre> element

		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	

	}

	$scope.updateMember = function(id,memberName) {
		//console.log(id);
		//console.log(memberName);
		$http.post($scope.updateGroupMemberUrl, { "memberID" : id, "memberName": memberName}).success(function(myData, status) {

			$scope.members = myData; // Show result from server in our <pre></pre> element
			$scope.updateSuccessful = 1;
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	

	}
	//console.log('in the Math Group Admin');







}]);


