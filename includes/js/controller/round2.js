app.controller('round2Ctrl', function($scope, $http, $interval) {
    $scope.index = 0;

    $scope.checkAnswer = function(ans) {


        $scope.roundQuests[$scope.index].points = ($scope.roundQuests[$scope.index].answer == ans) ? 10 : 0;
        var params = angular.toJson({
            points: $scope.roundQuests[$scope.index].points,
            round: 2,
            team: $scope.roundQuests[$scope.index].team
        }, true);
        console.log(params)
        $http({
                url: "Round2/score",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {
                console.log(data)
                if ($scope.roundQuests.length - 1 == $scope.index) {
                    console.log("1")
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

    $scope.getQuestions = function() {
        var params = "";
        $http({
                url: "Round2/load_questions",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {


                if (data.status) {
                    $scope.showLoader = false;
                    $scope.roundQuests = angular.copy(data.round_quests);
                    angular.forEach($scope.roundQuests, function(value, key) {
                        value.used = false;
                        value.points = 0;
                    });
                }
                console.log($scope.roundQuests);
            })
            .error(function(data, status, headers, config) {

                console.log("Error occured in http request:" + data);
            });
    }
    $scope.getQuestions();
});