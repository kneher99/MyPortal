var myProfileApp = angular.module('myProfileApp', ['ngSanitize']);

myProfileApp.controller('profileController', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    
	$scope.url = 'getUser.php'; 
	$scope.init = function(userID)
  	{
  		$scope.userID = userID;
		$http.post($scope.url, { "userID" : $scope.userID}).success(function(data) {
			$scope.data = data;
			console.log($scope.data);
			console.log( $scope.data[0].USER_FNAME);
			$scope.fName = $scope.data[0].USER_FNAME; // Show result from server in our <pre></pre> element
			$scope.lName = $scope.data[0].USER_LNAME;
			$scope.username = $scope.data[0].USER_EMAIL;
			//console.log($scope.result);
		}).error(function(data) {
			console.log('Error');
			//$scope.data = data || "Request failed";
			//$scope.status = status;			
		});
	}
    
}]);