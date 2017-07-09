var myMathQuizzesApp = angular.module('myMathQuizzesApp',['ngRoute']);

myMathQuizzesApp.service('globalLevels', function(){

    this.levels = function(){
        var retLevels = [
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

        return retLevels;
    }

});

myMathQuizzesApp.factory('getRandomNumbers', function(){

    var myNumbers = {};
    var randomNumbers = function(level){
        //console.log(level);
        switch(level) {
            case 1 :
                num1 = Math.floor((Math.random() * 10) + 1);
                num2 = Math.floor((Math.random() * 10) + 1);
                break;
            case 2 :
                num1 = Math.floor((Math.random() * 50) + 1);
                num2 = Math.floor((Math.random() * 50) + 1);
                break;
            case 3 :
                num1 = Math.floor((Math.random() * 100) + 1);
                num2 = Math.floor((Math.random() * 100) + 1);
                break;
            case 4 :
                num1 = Math.floor((Math.random() * 1000) + 1);
                num2 = Math.floor((Math.random() * 1000) + 1);
                break;
            case 5 :
                num1 = Math.floor((Math.random() * 10000) + 1);
                num2 = Math.floor((Math.random() * 10000) + 1);
                break;  
            default:
                num1 = 'Select a Level';
                num2 = 'Select a Level';                
                break;     
        }
            var myNumbers = [
                {
                    "number1" : num1,
                    "number2" : num2
                }                                                                     
            ];
        //console.log(myNumbers);
        return myNumbers;

    }
    return randomNumbers;

});


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

myMathQuizzesApp.controller('cntrlAddition', ['$scope', '$http', 'globalLevels', 'getRandomNumbers', function($scope, $http, globalLevels, getRandomNumbers) {
    $scope.myAnswer = '';
    $scope.myLevel = '';
    $scope.addend1 = '';
    $scope.addend2 = '';
    $scope.theAnswer = '';
    $scope.answerMessage = '';
    $scope.score = 0;
    $scope.question = 0;
    $scope.saveURL = 'setScore.php';

    $scope.levels = globalLevels.levels();

    $scope.changeLevel = function(x){

        var myAddends = getRandomNumbers($scope.myLevel);
        $scope.addend1 = myAddends[0]["number1"];
        $scope.addend2 = myAddends[0]["number2"];
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
    }



}]);

myMathQuizzesApp.controller('cntrlSubtraction', ['$scope', '$http', 'globalLevels', 'getRandomNumbers', function($scope, $http, globalLevels, getRandomNumbers) {
    $scope.myAnswer = '';
    $scope.myLevel = '';
    $scope.minuend = '';
    $scope.subtrahend = '';
    $scope.theAnswer = '';
    $scope.answerMessage = '';
    $scope.score = 0;
    $scope.question = 0;
    $scope.saveURL = 'setScore.php';

    $scope.levels = globalLevels.levels();

    $scope.changeLevel = function(x){

        var mySubs = getRandomNumbers($scope.myLevel);
        $scope.minuend = mySubs[0]["number1"];
        $scope.subtrahend = mySubs[0]["number2"];
        if ($scope.subtrahend > $scope.minuend){
            var mySubtrahend = $scope.minuend;
            $scope.minuend = $scope.subtrahend;
            $scope.subtrahend = mySubtrahend;
        }        
        $scope.theAnswer = $scope.minuend - $scope.subtrahend;
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
            $http.post($scope.saveURL, { "score" : $scope.score, "mathType" : 'Subtraction', "mathLevel" : $scope.myLevel})
                .success(function(myData, status) {

            }).error(function(data, status) {
                $scope.data = data || "Request failed";
                $scope.status = status;         
            });         
            $scope.myLevel = '';
        }
    }

}]);

myMathQuizzesApp.controller('cntrlDivision', ['$scope', '$http', 'globalLevels', 'getRandomNumbers', function($scope, $http, globalLevels, getRandomNumbers) {
    $scope.myAnswer = '';
    $scope.myLevel = '';
    $scope.dividend = '';
    $scope.divisor = '';
    $scope.theAnswer = '';
    $scope.answerMessage = '';
    $scope.score = 0;
    $scope.question = 0;
    $scope.saveURL = 'setScore.php';

    $scope.levels = globalLevels.levels();

    $scope.changeLevel = function(x){

        var mySubs = getRandomNumbers($scope.myLevel);
        $scope.dividend = mySubs[0]["number1"];
        $scope.divisor = mySubs[0]["number2"];
        if ($scope.divisor > $scope.dividend){
            var myDivisor = $scope.dividend;
            $scope.dividend = $scope.divisor;
            $scope.divisor = myDivisor;
        }
        $scope.theAnswer = $scope.dividend / $scope.divisor;
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
            $http.post($scope.saveURL, { "score" : $scope.score, "mathType" : 'Subtraction', "mathLevel" : $scope.myLevel})
                .success(function(myData, status) {

            }).error(function(data, status) {
                $scope.data = data || "Request failed";
                $scope.status = status;         
            });         
            $scope.myLevel = '';
        }
    }

}]);

myMathQuizzesApp.controller('cntrlMultiplication', ['$scope', '$http', 'globalLevels', 'getRandomNumbers', function($scope, $http, globalLevels, getRandomNumbers) {
    $scope.myAnswer = '';
    $scope.myLevel = '';
    $scope.multiplicand = '';
    $scope.multiplier = '';
    $scope.theAnswer = '';
    $scope.answerMessage = '';
    $scope.score = 0;
    $scope.question = 0;
    $scope.saveURL = 'setScore.php';

    $scope.levels = globalLevels.levels();

    $scope.changeLevel = function(x){

        var mySubs = getRandomNumbers($scope.myLevel);
        $scope.multiplicand = mySubs[0]["number1"];
        $scope.multiplier = mySubs[0]["number2"];
        $scope.theAnswer = $scope.multiplicand * $scope.multiplier;
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
            $http.post($scope.saveURL, { "score" : $scope.score, "mathType" : 'Subtraction', "mathLevel" : $scope.myLevel})
                .success(function(myData, status) {

            }).error(function(data, status) {
                $scope.data = data || "Request failed";
                $scope.status = status;         
            });         
            $scope.myLevel = '';
        }
    }

}]);