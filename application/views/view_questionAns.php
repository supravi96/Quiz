<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Quiz</title>
		<?php echo $all_includes ;?>
	</head>
	<body ng-app="App" ng-controller="AppCtrl">
		<?php echo $side_view;?>
		<div class="container" ng-controller="quesAnsCtrl">
			<div class="row">
				<div style="margin-top: 50px ; padding:20px;" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
					<div class="panel-info" style="border: 1px solid #b3e6ff">
						<div class="panel-heading">
							<div class="panel-title forms">Question & Answer</div>
						</div>
						<div class="panel-body" align="center">
							<form class="form-horizontal" role="form">
								<fieldset class="scheduler-border" >
									<legend class="formLegend">Question:</legend>
									<div class="input-group forms">
										<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign" aria-hidden="true"></i></span>
										<input type="text" ng-model="data.question" class="form-control" id="question" placeholder="Enter Question" />
									</div>
								</fieldset>
								<fieldset class="scheduler-border">
									<legend class="formLegend">Options:</legend>
									<div class="input-group forms">
										<span class="input-group-addon">A</span>
										<input type="text" ng-model="data.optA" class="form-control" id="optionA" placeholder="Option A"/>
									</div>
									<div class="input-group forms">
										<span class="input-group-addon">B</span>
										<input type="text" ng-model="data.optB" class="form-control" id="optionB" placeholder="Option B"/>
									</div>
									<div class="input-group forms" >
										<span class="input-group-addon">C</span>
										<input type="text" ng-model="data.optC" class="form-control" id="optionC" placeholder="Option C"/>
									</div>
									<div class="input-group forms">
										<span class="input-group-addon">D</span>
										<input type="text" ng-model="data.optD" class="form-control" id="optionD" placeholder="Option D"/>
									</div>
								</fieldset>
								<fieldset class="scheduler-border">
									<legend class="formLegend">Correct Answer:</legend>
									<div class="form-group correct">
										<input type="radio" ng-model="data.correctAnswer"  id="correctAns" value="a"/>A
										<input type="radio" ng-model="data.correctAnswer"  id="correctAns" value="b"/>B
										<input type="radio" ng-model="data.correctAnswer"  id="correctAns" value="c"/>C
										<input type="radio" ng-model="data.correctAnswer"  id="correctAns" value="d"/>D
									</div>
								</fieldset>
								<button class="btn btn-info btn-block login form-control" ng-click="addQuestionData()" type="submit">Add</button>
								
							</form>
						</div>
						<div class="panel-footer">
						</div>
					</div>
					<div class="panel-info" style="border: 1px solid #b3e6ff">
						<div class="panel-body" align="center">
							<div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
								<div class="page-header">List of Questions: </div>
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Sr.no.</th>
											<th>Question</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody ng-repeat="x in dataSet">
										<tr>
											<td>{{$index+1}}</td>
											<td>{{x.question}}</td>
											<td colspan="2">
												<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;
												<span class="glyphicon glyphicon-eye-open"></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		<script src="<?php base_url();?>includes/js/app.js"></script>
		<script src="<?php base_url();?>includes/js/controller/quesAns.js"></script>
	</html>