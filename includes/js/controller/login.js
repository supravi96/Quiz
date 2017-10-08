app.controller('loginCtrl', function($scope, $http, myAppService) {
    $scope.login = function() {
        myAppService.md5Encrypt($scope.passWord).then(function(encryptedData) {
            myAppService.md5Encrypt(encryptedData).then(function(finalCrypted) {
                var encodeCrypted = encodeURIComponent(encryptedData);
                var finalEncodeCrypted = encodeCrypted.replace(/%2F/g, "SLASH");
                var params = angular.toJson({
                    username: $scope.userName,
                    password: finalEncodeCrypted
                });
                $http({
                        url: "Login/verify_login",
                        method: "POST",
                        data: params,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        }
                    })
                    .success(function(data, webStatus, headers, config) {
                        if (data.status)
                            window.location = "Questionans";
                        console.log(data);
                    })
                    .error(function(data, status, headers, config) {
                        console.log("Error occured in http request:" + data);
                    });
            }, function(err) {
                // Error occurred
                console.log("Error occured in md5 encrypt");
            });
        });
    }
});