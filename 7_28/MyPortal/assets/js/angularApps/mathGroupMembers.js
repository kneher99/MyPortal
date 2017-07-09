var myMathGroupMembers = angular.module('myMathGroupMembers',[]);

myMathGroupMembers.controller('mgController', ['$scope', '$http', function($scope, $http) {


	$scope.members = '';
	$scope.getMembers = 'getMembers.php';	
	$scope.getGroupRows = '';
	$scope.selectedID = '';

	$http.get($scope.getMembers).success(function(data, status) {
		//$scope.status = status;
		//$scope.data = data;

		$scope.members = data; // Show result from server in our <pre></pre> element
		console.log($scope.members);
		
	}).error(function(data, status) {
		$scope.data = data || "Request failed";
		$scope.status = status;			
	});		

	console.log($scope.selectedID);


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


	$scope.addNewMember = function() {
		//console.log($scope.newMathGroup);
		$http.post($scope.setNewMemberUrl, { "newMemberName" : $scope.newMember}).success(function(myData, status) {

			$scope.members = myData; // Show result from server in our <pre></pre> element

		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	

	}		


}]);