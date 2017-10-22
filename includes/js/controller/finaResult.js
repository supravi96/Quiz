app.controller('finaResult', function($scope, $http) {
    $scope.finalData = [];
    $scope.getResult = function() {
        var params = "";
        $http({
                url: "Final_result/generateFinalResult",
                method: "POST",
                data: params,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            })
            .success(function(data, webStatus, headers, config) {
                console.log(data);
                $scope.finalData = data.result;
                console.log($scope.finalData)
            })
            .error(function(data, status, headers, config) {
                console.log("Error occured in http request:" + data);
            });
    }
    $scope.getResult();
});