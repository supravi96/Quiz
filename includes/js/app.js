var app = angular.module('App', ['ngMessages', 'ngAnimate', 'ngFileUpload']);

app.controller('AppCtrl', function($scope, $http) {

	$scope.logOut = function() {
		console.log("dsd")
		var answer = confirm("Do you want to log out??");
		if (answer) {
			var params = angular.toJson({
				logout: '1'
			});
			$http({
				url: "Login/verify_logout",
				method: "POST",
				data: params,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			}).success(function(data, webStatus, headers, config) {
				if (data['status'] == '1') {
					alert('Logging out');
					window.location = 'login';
				} else {
					alert('could not log out .');
				}

			}).error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log("Error occured in http request:" + data);
            });
		}
	}
});

app.factory('myAppService', ['$q',
	function($q) {

		var md5Encrypt = function(data) {
            //alert(data);
            var deferred = $q.defer();
            deferred.resolve(pidCrypt.MD5(data));
            return deferred.promise;
        };

        return {
        	md5Encrypt: md5Encrypt
        };
    }
    ]);