app.controller('quizCtrl', function($scope, $http) {

    $scope.showLoader = false;
    $scope.displayQuest = {};
    $scope.index = 0;

    $scope.checkAnswer = function(ans) {


        $scope.roundQuests[$scope.index].ans = ($scope.roundQuests[$scope.index].answer == ans) ?
            (($scope.roundQuests[$scope.index].pass == true) ? 5 : 10) :
            0;
        var params = angular.toJson({
            points: $scope.roundQuests[$scope.index].ans,
            team: ($scope.roundQuests[$scope.index].pass == true) ? ($scope.index + 1) : ($scope.index)
        }, true);
        console.log(params)
        $http({
                url: "Quiz/score",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {
                console.log(data)
                if ($scope.roundQuests.length - 1 == $scope.index) {
                    $http({
                            url: "Quiz/update_round",
                            method: "GET",
                            data: params,
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                            }
                        })
                        .success(function(data, webStatus, headers, config) {

                            window.location = "Round";
                        })
                        .error(function(data, status, headers, config) {

                            console.log("Error occured in http request:" + data);
                        });
                } else {
                    ++$scope.index;
                    $scope.roundQuests[$scope.index].used = true;
                }

            })
            .error(function(data, status, headers, config) {

                console.log("Error occured in http request:" + data);
            });


    }

    $scope.loadQuestionsPerRound = function() {

        $scope.showLoader = true;
        var params = "";
        $http({
                url: "Quiz/fetchQuestion",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {

                console.log(data);
                if (data.status) {
                    $scope.showLoader = false;
                    $scope.quiz = data.quiz;
                    $scope.roundQuests = angular.copy(data.round_quests);
                    $scope.teams = data.teams;
                    angular.forEach($scope.roundQuests, function(value, key) {
                        value.used = false;
                        value.pass = false;
                        value.ans = 0;
                    });
                }
            })
            .error(function(data, status, headers, config) {

                console.log("Error occured in http request:" + data);
            });
    }

    $scope.loadQuestionsPerRound();
    $scope.quizList = [];
    $http({
            url: "Instructions/get_all_quiz",
            method: "GET",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
        })
        .success(function(data, webStatus, headers, config) {
            if (data.status)
                $scope.quizList = data.result;
            console.log(data)
        })
        .error(function(data, status, headers, config) {

            console.log("Error occured in http request:" + data);
        });

    $scope.attempt = function() {
        console.log($scope.quizId)
        var params = angular.toJson({
            "quiz_id": $scope.quizId
        }, true);
        $http({
                url: "Instructions/updateSession",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {
                if (data.status)
                    window.location = "Round";
            })
            .error(function(data, status, headers, config) {
                console.log("Error occured in http request:" + data);
            });
    }

});