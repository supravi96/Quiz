<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quiz</title>
	<?php echo $all_includes ;?>
</head>
<body ng-app="App" ng-controller="AppCtrl">
	<div class="container" ng-controller="quizCtrl">
		<div class="row">
			<div style="margin-top: 50px ; padding:20px;" ng-show="!showLoader">
				<div class="panel panel-info" style="box-shadow:0px 0px 20px #003171;">
					<div class="panel-heading" style=" background-color:#003171">
						<div class="panel-title forms"><strong><h1>{{quiz}}</h1></strong></div>
					</div>
					<div class="panel-body" align="center">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-body">
									<strong><h2>{{roundQuests[index].question}}</h2></strong>
								</div>
							</div>

							<div class="col-md-6">
								<button type="button" id="option" class="btn btn-lg btn-success btn-square form-control" ng-click="checkAnswer('a')">{{roundQuests[index].a}}</button>
							</div>
							<div class="col-md-6">
								<button type="button" id="option" class="btn btn-lg btn-success form-control"
								ng-click="checkAnswer('b')">{{roundQuests[index].b}}</button>
							</div>
							<div class="col-md-6">
								<button type="button" id="option" class="btn btn-lg btn-success form-control"
								ng-click="checkAnswer('c')">{{roundQuests[index].c}}</button>
							</div>
							<div class="col-md-6">
								<button type="button" id="option" class="btn btn-lg btn-success form-control"
								ng-click="checkAnswer('d')">{{roundQuests[index].d}}</button>
							</div>

						</div>
						<div class="panel-footer">
							<div class="col-md-12">
								<button type="button" id="option" class="btn btn-sm btn-danger pull-right"
								ng-click="roundQuests[index].pass=true">PASS</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div  class="loader" ng-show="showLoader"></div>
		</div>
	</body>
	<script src="<?php base_url();?>includes/js/app.js"></script>
	<script src="<?php base_url();?>includes/js/controller/quiz.js"></script>
	</html>