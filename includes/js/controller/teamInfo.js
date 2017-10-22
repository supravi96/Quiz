app.controller('teamInfoCtrl', function($scope, $http) {

    $scope.data = {};
    $scope.data.teams = [];
    $scope.show = false;
    $scope.view = false;
    $scope.save = true;
    $scope.disable = false;
    $scope.data.teams.push({
        team_id: "0",
        teamName: "",
        memberName1: "",
        memberName2: ""
    });

    $scope.addTeams = function() {
        var lastIndex = $scope.data.teams.length;
        lastIndex--;

        if ($scope.data.teams[lastIndex].teamName != "" && $scope.data.teams[lastIndex].memberName1 && $scope.data.teams[lastIndex].memberName2)
            $scope.data.teams.push({
                team_id: "0",
                teamName: "",
                memberName1: "",
                memberName2: ""
            });
    }

    $scope.addTeamInfo = function() {
        $scope.data.view = $scope.view ? 1 : 0;
        var params = angular.toJson($scope.data, true);
        $http({
                url: "Teaminfo/addTeamInfo",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {

                if (data.status) {
                    alert("team info added successfully.");
                    location.reload();
                } else {
                    alert("team info could not be added");
                }
            })
            .error(function(data, status, headers, config) {

                console.log("Error occured in http request:" + data);
            });
    }

    $scope.getData = function() {
        var params = "";
        $scope.dataset = [];
        $http({
                url: "Teaminfo/getData",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {

                angular.forEach(data.result, function(value, key) {
                    value.members = value.members.split(",");
                })
                $scope.dataset = data.result;
            })
            .error(function(data, status, headers, config) {

                console.log("Error occured in http request:" + data);
            });
    }

    $scope.viewForm = function(data) {
        $scope.save = false;
        $scope.show = true;
        $scope.view = false;
        $scope.disable = true;
        $scope.data = {};
        $scope.data.teams = [];
        $scope.data.rounds = parseInt(data.rounds);
        $scope.data.quiz_name = data.quiz_name;
        $scope.data.id = data.quiz_id;

        var params = angular.toJson({
            id: data.quiz_id
        }, true);

        $http({
                url: "Teaminfo/get_teams",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {

                $scope.data.teams = data.result;
            })
            .error(function(data, status, headers, config) {

                console.log("Error occured in http request:" + data);
            });
    }

    $scope.delete = function() {
        var answer = confirm("Do you want to delete this quiz data??");
        if (answer) {
            var params = angular.toJson({
                id: $scope.data.id
            }, true);

            $http({
                    url: "Teaminfo/delete_team_info",
                    method: "POST",
                    data: params,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    }
                })
                .success(function(data, webStatus, headers, config) {
                    location.reload();
                })
                .error(function(data, status, headers, config) {

                    console.log("Error occured in http request:" + data);
                });
        }
    }
    $scope.getData();
});