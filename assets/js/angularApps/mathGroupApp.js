var myMathGroupApp = angular.module('myMathGroupApp',['ngRoute']);



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

myMathGroupApp.controller('mgController', ['$scope', '$http', function($scope, $http) {


	$scope.studentName = '';
	$scope.firstGroupNum = '';
	$scope.secondGroupNum = '';

	console.log('in the Math Group Page');


}]);


myMathGroupApp.controller('myMathGroupAdmin', ['$scope', '$http', function($scope, $http) {

	$scope.url = 'processMathGroups.php';
	$scope.GroupName = '';


	$scope.tables = '';
	$scope.testing = 'Hey';
		$http.get($scope.url, { "username" : $scope.username,"password":$scope.password}).success(function(data, status) {
			$scope.status = status;
			$scope.data = data;
			$scope.tables = data; // Show result from server in our <pre></pre> element
			/*if ($scope.result == '0'){
				$scope.msgReturn = "<span style='color:red;'>Sorry, username and password combination not found.  Please try again or open a new account.</span>";
				$scope.msgReturn = $sce.trustAsHtml($scope.msgReturn);
			}
			else{
				window.location.href='index.php?';
			}*/
			console.log($scope.tables);
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	


	$scope.addNewTable = function() {
		$http.post($scope.url, { "username" : $scope.username,"password":$scope.password}).success(function(data, status) {
			$scope.status = status;
			$scope.data = data;
			$scope.result = data; // Show result from server in our <pre></pre> element
			/*if ($scope.result == '0'){
				$scope.msgReturn = "<span style='color:red;'>Sorry, username and password combination not found.  Please try again or open a new account.</span>";
				$scope.msgReturn = $sce.trustAsHtml($scope.msgReturn);
			}
			else{
				window.location.href='index.php?';
			}*/
			console.log($scope.result);
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});	

	}
	console.log('in the Math Group Admin');







}]);


