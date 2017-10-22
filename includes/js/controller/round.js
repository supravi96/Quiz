app.controller('round', function($scope, $http) {
    $scope.roundData = {};
    $scope.show = false;
    $scope.showLast = false;
    var params = "";
    $http({
            url: "Round/load_scores",
            method: "POST",
            data: params,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
        })
        .success(function(data, webStatus, headers, config) {
            console.log(data);
            $scope.show = Boolean(data.status);
            if (parseInt(data.current_round) == data.result[0].rounds) {
                $scope.showLast = true;
            }
            $scope.nextRound = parseInt(data.current_round) + 1;
            if (data.status) {
                $scope.roundData = data.result;
            }

        })
        .error(function(data, status, headers, config) {
            console.log("Error occured in http request:" + data);
        });

    $scope.next = function() {
        window.location = 'Quiz';
    }

    $scope.viewResult = function() {
        window.location = 'Final_result';
    }
});