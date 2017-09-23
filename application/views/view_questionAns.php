<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quiz</title>
	<?php echo $all_includes ;?>
	<style>
	.formLegend{
		text-align:left !important;
		font-size:16px !important;
		border-bottom:none !important;
		width:auto;
	}

	fieldset.scheduler-border {
		border: 1px solid #ddd !important;
		padding: 0 1.4em 1.4em 1.4em !important;
		margin: 0 0 1.5em 0 !important;
		border-radius: 5px;
		-webkit-box-shadow:  0px 0px 0px 0px #000;
		box-shadow:  0px 0px 0px 0px #000;
	}
	.input-group.forms{
		margin-bottom: 25px;
	}

	.panel-title.forms{
		text-align:center;
		font-size: 1.2em;
		font-weight:bold;
	}

</style>
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
								<div class="input-group forms">
									<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
									<input type="text" ng-model="data.correctAnswer" class="form-control" id="correctAns" placeholder="Correct Answer"/>
								</div>
							</fieldset>
							<button class="btn btn-info btn-block login form-control" ng-click="addQuestionData()" type="submit">Add</button>
							
						</form>				
					</div>
					<div class="panel-footer">
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="<?php base_url();?>includes/js/app.js"></script>
	<script src="<?php base_url();?>includes/js/controller/quesAns.js"></script>
	</html>