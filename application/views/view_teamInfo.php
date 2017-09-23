<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Quiz</title>
		<?php include 'template/all_includes.php';?>
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
		<div class="container" ng-controller="teamInfoCtrl">
		<div class="row">
			<div style="margin-top: 50px ; padding:20px;" class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
				<div class="panel-info" style="border: 1px solid #b3e6ff">
					<div class="panel-heading">
					<div class="panel-title forms">Team Info</div>
					</div>
					<div class="panel-body" align="center">
						<form class="form-horizontal" role="form">
						<div class="col-md-6 pull-left">
						<button class="btn btn-default"><span><i class="glyphicon glyphicon-plus"></i></span></button>
						<label>Add Teams</label>
						</div>
						<div class="col-md-6">
							<div class="input-group forms">
								<span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
								<input type="number" min="1" max="10" class="form-control" id="password" placeholder="No. of rounds">
							</div>
							</div>
							<fieldset class="scheduler-border col-md-12" >
							    <legend class="formLegend">Team Info:</legend>
								<div class="col-md-4">
									<div class="input-group forms">
										<span class="input-group-addon"><img style="height:15px ; width:15px ;"src="img/teams.png"></span>
										<input type="text" class="form-control" id="teamName" placeholder="Team Name" />
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="input-group forms">
										<span class="input-group-addon">1</span>
										<input type="text" class="form-control" id="Member1" placeholder="Member1 Name"/>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="input-group forms">
										<span class="input-group-addon">2</span>
										<input type="text" class="form-control" id="Member2" placeholder="Member2 Name"/>
									</div>
								</div>
							</fieldset>
								<button class="btn btn-info btn-block login form-control" type="submit">Add</button>
							
						</form>				
					</div>
					<div class="panel-footer">
					</div>
			</div>
		</div>
		</div>
	</body>
	<script src="<?php base_url();?>includes/js/app.js"></script>
	<script src="<?php base_url();?>includes/js/controller/teamInfo.js"></script>
</html>