app.controller('quesAnsCtrl', function($scope,$http) {

	$scope.data = {};

	/*to add questions*/
	$scope.addQuestionData = function(){
		console.log($scope.data);
		var params = angular.toJson($scope.data, true);
		$http({
			url: "Questionans/addQuestionData",
			method: "POST",
			data: params,
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
		})
		.success(function(data, webStatus, headers, config) {

			console.log(data);
			if(data.status)
				alert("question set added successfully.");
			else
				alert("question set could not be added");
		})
		.error(function(data, status, headers, config) {

			console.log("Error occured in http request:" + data);
		});
	}

	/*to load all added questions*/
	$scope.loadAllQuestions = function(){
		var params = "";
		$http({
			url: "Questionans/loadAllQuestions",
			method: "POST",
			data: params,
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
		})
		.success(function(data, webStatus, headers, config) {

			console.log(data);
		})
		.error(function(data, status, headers, config) {

			console.log("Error occured in http request:" + data);
		});

	}

	$scope.loadAllQuestions();
});