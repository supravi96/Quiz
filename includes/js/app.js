var app = angular.module('App',['ngMessages','ngAnimate','ngFileUpload']);

app.controller('AppCtrl', function($scope,$http) {

});

app.factory('myAppService',['$q',
	function($q){
		
		var md5Encrypt = function(data){
			//alert(data);
			var deferred = $q.defer();  
			deferred.resolve(pidCrypt.MD5(data));
			return deferred.promise;
		};
		
		return {md5Encrypt:md5Encrypt};
	}
	]);
