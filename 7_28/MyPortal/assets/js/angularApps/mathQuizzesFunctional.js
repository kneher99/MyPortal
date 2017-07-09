var myMathQuizzesApp = angular.module('myMathQuizzesApp',['ngRoute']);


myMathQuizzesApp.config(function ($routeProvider) {
    
    $routeProvider
    
    .when('/Addition', {
    	templateUrl: 'templates/Addition.php',
        controller: 'cntrlAddition'
    })
    

    .when('/Subtraction', {
        templateUrl: 'templates/Subtraction.php',
        controller: 'cntrlSubtraction'
    })

    .when('/Division', {
    	templateUrl: 'templates/Division.php',
        controller: 'cntrlDivision'
    })

    .when('/Multiplication', {
        templateUrl: 'templates/Multiplication.php',
        controller: 'cntrlMultiplication'
    })
    
});

$scope.testFunction = function(){

    console.log('In the test function');
}

myMathQuizzesApp.controller('cntrlAddition', ['$scope', '$http', function($scope, $http) {
    $scope.myAnswer = '';
    $scope.myLevel = '';
    $scope.addend1 = '';
    $scope.addend2 = '';
    $scope.theAnswer = '';
    $scope.answerMessage = '';
    $scope.score = 0;
    $scope.question = 0;
    $scope.saveURL = 'setScore.php';

    $scope.levels = [
            {
                "levelVal" : 1,
                "levelName" : "One"
            },            {
                "levelVal" : 2,
                "levelName" : "Two"
            },
            {
                "levelVal" : 3,
                "levelName" : "Three"
            },
                                    {
                "levelVal" : 4,
                "levelName" : "Four"
            },
            {
                "levelVal" : 5,
                "levelName" : "Five"
            },            

    ];

    $scope.changeLevel = function(x){
        switch($scope.myLevel) {
            case 1 :
                $scope.addend1 = Math.floor((Math.random() * 10) + 1);
                $scope.addend2 = Math.floor((Math.random() * 10) + 1);
                break;
            case 2 :
                $scope.addend1 = Math.floor((Math.random() * 50) + 1);
                $scope.addend2 = Math.floor((Math.random() * 50) + 1);
                break;
            case 3 :
                $scope.addend1 = Math.floor((Math.random() * 100) + 1);
                $scope.addend2 = Math.floor((Math.random() * 100) + 1);
                break;
            case 4 :
                $scope.addend1 = Math.floor((Math.random() * 1000) + 1);
                $scope.addend2 = Math.floor((Math.random() * 1000) + 1);
                break;
            case 5 :
                $scope.addend1 = Math.floor((Math.random() * 10000) + 1);
                $scope.addend2 = Math.floor((Math.random() * 10000) + 1);
                break;  
            default:
                $scope.addend1 = 'Select a Level';
                $scope.addend2 = 'Select a Level';                
                break;                                                          

        }
        $scope.theAnswer = $scope.addend1 + $scope.addend2;
        if (x == 1){
            $scope.answerMessage = '';

        }

    }
   
    $scope.setAnswer = function(){
        $scope.question += 1;

        if (parseInt($scope.myAnswer) == parseInt($scope.theAnswer)){
            $scope.answerMessage = 'Correct!';
            $scope.score += 1;
            $scope.changeLevel(0);
            $scope.myAnswer = '';


        }

        else{
            $scope.answerMessage = 'Incorrect!';
        }      

        if ($scope.question == 10){
            $scope.answerMessage = 'Quiz complete!';
            $http.post($scope.saveURL, { "score" : $scope.score, "mathType" : 'Addition', "mathLevel" : $scope.myLevel})
                .success(function(myData, status) {

            }).error(function(data, status) {
                $scope.data = data || "Request failed";
                $scope.status = status;         
            });         
            $scope.myLevel = '';
        }


        //console.log($scope.question);
       // console.log($scope.score);
    }



}]);

myMathQuizzesApp.controller('cntrlSubtraction', ['$scope', '$http', function($scope, $http) {


}]);

myMathQuizzesApp.controller('cntrlDivision', ['$scope', '$http', function($scope, $http) {


}]);

myMathQuizzesApp.controller('cntrlMultiplication', ['$scope', '$http', function($scope, $http) {


}]);