var myProfileApp = angular.module('myProfileApp', ['ngSanitize']);

myProfileApp.controller('profileController', ['$scope', '$http', '$sce', function($scope, $http, $sce) {
    
	$scope.getUrl = 'getUser.php'; 
	$scope.updateURL = 'updateProfile.php';
	$scope.avatar = '';
	//console.log($scope.avatar);
    $scope.formData = {};
    $scope.noImage = 'http://pc1-pc/MyPortal/assets/avatars/noImage.png';

	$scope.init = function(userID)
  	{
  		$scope.userID = userID;
  		$scope.imgPath = 'http://pc1-pc/MyPortal/assets/avatars/';
		$http.post($scope.getUrl, { "userID" : $scope.userID}).success(function(data) {
			$scope.data = data;
			//console.log($scope.data);
			//console.log( $scope.data[0].USER_FNAME);
			$scope.fName = $scope.data[0].USER_FNAME; // Show result from server in our <pre></pre> element
			$scope.lName = $scope.data[0].USER_LNAME;
			$scope.username = $scope.data[0].USER_EMAIL;
			$scope.avatar = $scope.imgPath + $scope.data[0].avatar;
			$scope.fullName = $scope.fName + ' ' + $scope.lName;
			console.log($scope.avatar);
		}).error(function(data) {
			console.log('Error');
			//$scope.data = data || "Request failed";
			//$scope.status = status;			
		});
	}


}])
	.directive('onErrorSrc', function() {
	    return {
	        link: function(scope, element, attrs) {
	          element.bind('error', function() {
	            if (attrs.src != attrs.onErrorSrc) {
	              attrs.$set('src', attrs.onErrorSrc);
	            }
	          });
	        }
	    }
	})    
	.directive('bindFile', [function () {
    return {
        require: "ngModel",
        restrict: 'A',
        link: function ($scope, el, attrs, ngModel) {
            el.bind('change', function (event) {
                ngModel.$setViewValue(event.target.files[0]);
                $scope.$apply();
            });
            
            $scope.$watch(function () {
                return ngModel.$viewValue;
            }, function (value) {
                if (!value) {
                    el.val("");
                }
            });
        }
    };
}]);