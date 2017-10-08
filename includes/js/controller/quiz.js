app.controller('quizCtrl', function($scope, $http) {

	$scope.showLoader = false;
	$scope.displayQuest = {};
	$scope.index = 0;

	$scope.checkAnswer = function(ans) {

        // if ($scope.roundQuests[$scope.index].pass == false) {

        //round over
        if ($scope.roundQuests.length - 1 == $scope.index) {
        	$scope.showLoader = true;
        	var params = "";
        	$http({
        		url: "Quiz/fetch_next_set",
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

        			$scope.roundQuests = angular.copy(data.round_quests);

        			angular.forEach($scope.roundQuests, function(value, key) {
        				value.used = false;
        				value.pass = false;
        			});
        			$scope.index = 0;
        		}
        	})
        	.error(function(data, status, headers, config) {

        		console.log("Error occured in http request:" + data);
        	});
        } else {
        	$scope.roundQuests[$scope.index].ans = ($scope.roundQuests[$scope.index].answer == ans) ?
        	(($scope.roundQuests[$scope.index].pass == true) ? 5 : 10) :
        	0;
        	var params = angular.toJson({
        		quiz_id: $scope.quizId,
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
        		++$scope.index;
        		$scope.roundQuests[$scope.index].used = true;
        	})
        	.error(function(data, status, headers, config) {

        		console.log("Error occured in http request:" + data);
        	});

        }
        // }
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
    			$scope.quizId = data.quiz_id;
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
});