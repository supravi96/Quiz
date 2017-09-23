app.controller('teamInfoCtrl', function($scope,$http) {

	$scope.data={};
	$scope.data.teams = [];
	$scope.data.teams.push({
		teamName:"",
		memberName1:"",
		memberName2:""
	});

	$scope.addTeams = function(){
		var lastIndex = $scope.data.teams.length;
		lastIndex--;

		if($scope.data.teams[lastIndex].teamName!=""&&$scope.data.teams[lastIndex].memberName1&&$scope.data.teams[lastIndex].memberName2)
			$scope.data.teams.push({
				teamName:"",
				memberName1:"",
				memberName2:""
			});
	}

	$scope.addTeamInfo = function(){
		console.log($scope.data)
		var params = angular.toJson($scope.data, true);

		$http({
			url: "Teaminfo/addTeamInfo",
			method: "POST",
			data: params,
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }
		})
		.success(function(data, webStatus, headers, config) {

			console.log(data);
			if(data.status)
				alert("team info added successfully.");
			else
				alert("team info could not be added");
		})
		.error(function(data, status, headers, config) {

			console.log("Error occured in http request:" + data);
		});
	}
});