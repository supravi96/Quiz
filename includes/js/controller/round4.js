app.controller('round4Ctrl', function($scope, $http, $interval) {

    $scope.timerStarted = false;
    $scope.totalTime = 120;
    $scope.aboutRound = "Start Round";
    let timer = document.querySelector('#speedometerTimer');
    let speedometerTimer;

    $scope.startRound = function() {
        if (!$scope.timerStarted) {
            $scope.startTimer($scope.totalTime);
            $scope.aboutRound = "Stop Round";
        } else {
            $interval.cancel(speedometerTimer);
            $scope.timerStarted = false;
            $scope.aboutRound = "Start Round";
        }

    }

    $scope.startTimer = function(time) {
        $scope.timerStarted = true;
        speedometerTimer = $interval(() => {
            if (time < 1) {
                $interval.cancel(speedometerTimer);
            }
            $scope.totalTime = time--;
            console.log($scope.totalTime)
        }, 1000);
    }

    $scope.submit = function() {

        /*on successfull submit of points for current team call loadQuestions to get questions for next team 
            calc all points and send only team id and points to the score function 
        */
    }

    //get questions for every team 
    $scope.loadQuestions = function() {
        /*
            while calling function to fetch questions send offset everytime offset = 0  initially 
            every time form is answered decrease the offset while fetching  the questions.
            basically 1st set of questions will be for 1 team 
        */
    }



});