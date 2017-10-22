<!DOCTYPE html>
<html lang="en">
<head>
	<title> Quiz </title>
	<?php echo $all_includes ;?>
</head>
<body ng-app="App" ng-controller="AppCtrl">
	<div class="container" ng-controller="finaResult">
		<div class="row">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr class="danger">
							<th>Srno.</th>
							<th>TeamName</th> 
							<th>Members</th>
							<th ng-repeat="y in finalData[0].points">Round{{$index}}</th>
							<th>Total Score</th>
						</tr>
					</thead>
					<tbody ng-repeat="x in finalData">
						<tr>
							<td>{{$index+1}}</td>
							<td>
								<b>{{x.team_name}}</b>
							</td>
							<td rowspan="2"><b>{{x.members[0]}}</b>
								<br><b>{{x.members[1]}}</b></td>
								<td ng-repeat="y in x.points">
									<b>{{y.points}}</b>
								</td>
								<td>
									<b>{{x.total_points}}</b>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<button class="btn btn-info btn-block login form-control" onclick="location.href='Instructions';" type="submit">Redirect to main menu</button>
			</div>
		</div>
	</body>
	<script src="<?php base_url();?>includes/js/app.js"></script>
	<script src="<?php base_url();?>includes/js/controller/finaResult.js"></script>
	</html>