var myLoginApp = angular.module('myLoginApp', ['ngSanitize']);

myLoginApp.controller('mainController', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    
	$scope.url = 'checkLogin.php'; 
	$scope.username = '';
	$scope.password = '';
	$scope.msgReturn = '';

	// The function that will be executed on button click (ng-click="search()")
	$scope.validateLogin = function() {
		//console.log($scope.username);
		//console.log($scope.password);
		// Create the http post request
		// the data holds the keywords
		// The request is a JSON request.
		$http.post($scope.url, { "username" : $scope.username,"password":$scope.password}).success(function(data, status) {
			$scope.status = status;
			$scope.data = data;
			$scope.result = data; // Show result from server in our <pre></pre> element
			if ($scope.result == '0'){
				$scope.msgReturn = "<span style='color:red;'>Sorry, username and password combination not found.  Please try again or open a new account.</span>";
				$scope.msgReturn = $sce.trustAsHtml($scope.msgReturn);
			}
			else{
				window.location.href='index.php?';
			}
			console.log($scope.result);
		}).error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});
	};	
    
}]);