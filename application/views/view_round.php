<!DOCTYPE html>
<html lang="en">
<head>
	<title> Quiz </title>
	<?php echo $all_includes ;?>
</head>

<body style="background-image:url('<?php base_url();?>includes/img/confetti6.jpg')" ng-app="App" ng-controller="AppCtrl">
	<div class="container-fluid" ng-controller="round" ng-init="show=false">
		<div class="col-lg-6 col-lg-offset-3 col-md-9 col-sm-10 rounds">
			<div ng-show="show">
				<center><div class="page-header"><h1>Score for Round {{roundData[0].round_no}}</h1></div></center>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class="danger">
								<th>TeamName</th> 
								<th>Score</th>
							</tr>
						</thead>
						<tbody ng-repeat="x in roundData">
							<tr>
								<td class="col-xs-8">
									<b>{{x.team_name}}</b>
								</td>
								<td class="col-xs-1">
									<b>{{x.points}}</b>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div style="text-align:center;padding:30px 30px 30px 30px;">
				<button class="btn btn-danger btn-lg" ng-click="next()" ng-show="!showLast"> Attempt Round {{nextRound}}</button>
				<button class="btn btn-danger btn-lg" ng-click="viewResult()" ng-show="showLast"> View final result</button>
			</div>
		</div>
	</div>
</body>
<script src="<?php base_url();?>includes/js/app.js"></script>
<script src="<?php base_url();?>includes/js/controller/round.js"></script>
</html>