<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quiz</title>
	<?php include 'template/all_includes.php';?>
</head>
<body ng-app="App" ng-controller="AppCtrl">
	<?php echo $side_view;?>
	<div class="container" ng-controller="teamInfoCtrl">
		<div class="row">
			<div style="margin-top: 50px ; padding:20px;" class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2" style="position: relative; " ng-show="show">
				<div style="position: absolute; top: 25px;right: 20px;" >
					<button type="button" class="btn btn-link" ng-click="delete()" ng-show="view">
						<span class="glyphicon glyphicon-trash"></span>
					</button>
				</div>
				<div class="panel-info" style="border: 1px solid #b3e6ff">
					<div class="panel-heading">
						<div class="panel-title forms">Team Info</div>
					</div>
					<div class="panel-body" align="center">
						<form class="form-horizontal" role="form" >
							<div class="col-md-4 pull-left">
								<button class="btn btn-default" ng-click="addTeams()" ng-disabled="!save">
									<span>
										<i class="glyphicon glyphicon-plus"></i>
									</span>
								</button>
								<label>Add Teams</label>
							</div>
							<div class="col-md-4">
								<div class="input-group forms">
									<input type="text" ng-model="data.quiz_name" class="form-control" id="password" placeholder="Quiz Name" ng-disabled="disable">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group forms">
									<span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
									<input type="number" ng-model="data.rounds" min="1" max="10" class="form-control" id="password" placeholder="No. of rounds" ng-disabled="disable">
								</div>
							</div>
							<fieldset class="scheduler-border col-md-12" >
								<legend class="formLegend">Team Info:</legend>
								<div ng-repeat="x in data.teams">
									<div class="col-md-4">
										<div class="input-group forms">
											<span class="input-group-addon"><img style="height:15px ; width:15px ;" src="<?php base_url();?>includes/img/teams.png"></span>
											<input type="text" ng-model="x.teamName" class="form-control" id="teamName" placeholder="Team Name" ng-disabled="!save" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group forms">
											<span class="input-group-addon">1</span>
											<input type="text" ng-model="x.memberName1" class="form-control" id="Member1" placeholder="Member1 Name" ng-disabled="!save" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group forms">
											<span class="input-group-addon">2</span>
											<input type="text" ng-model="x.memberName2" class="form-control" id="Member2" placeholder="Member2 Name" ng-disabled="!save" />
										</div>
									</div>
								</div>
							</fieldset>
							<button class="btn btn-info btn-block login form-control" ng-click="save=true;view=true;" type="submit" ng-show="!save">Edit</button>
							<button class="btn btn-info btn-block login form-control" ng-click="addTeamInfo()" type="submit" ng-show="save">Save</button>
						</form>
					</div>
				</div>
			</div>
			<div style="margin-top: 50px ; padding:20px;" class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2" style="position: relative; ">
				<div style="position: absolute; top: 50px;right: 50px;" >
					<button type="button" class="btn btn-default" ng-click="show=true;view=false;disable=false" ng-show="!show">
						<span>Add Team Info</span>
					</button>
				</div>
				<div class="panel-info" style="border: 1px solid #b3e6ff">
					<div class="panel-body" align="center">
						<div style="" class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
							<div class="page-header"><h3>List of teams </h3></div>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Sr.no.</th>
										<th>Quiz</th>
										<th>No. of Rounds</th>
										<th>TeamName</th>
										<th>Member1</th>
										<th>Member2</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody ng-repeat="x in dataset">
									<tr>
										<td>{{$index+1}}</td>
										<td>{{x.quiz_name}}</td>
										<td>{{x.rounds}}</td>
										<td>{{x.team_name}}</td>
										<td>{{x.members[0]}}</td>
										<td>{{x.members[1]}}</td>
										<td colspan="2">
											<button type="button" class="btn btn-link" ng-click="viewForm(x)">
												<span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;
											</button>
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
	<script src="<?php base_url();?>includes/js/controller/teamInfo.js"></script>
	</html>