<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Quiz </title>
		<?php include 'template/all_includes.php';?>
	</head>
	<body ng-app="App" ng-controller="AppCtrl">
		<div class="container" ng-controller="loginCtrl">
			<div class="row">
				<div style="margin-top: 50px"class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="panel-info" style="border: 1px solid #b3e6ff">
						<div class="panel-heading">
							<div class="panel-title" style="text-align:center">Login</div>
						</div>
						<div class="panel-body" align="center">
							<img class="img-circle" style="height:100px ; width:100px ; margin-bottom: 10px" id="img_logo" src="<?php base_url();?>includes/img/login_icon.png">
							<form class="form-horizontal" role="form" name="loginForm">
								<div class="input-group" style="margin-bottom: 25px">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" ng-model="userName" class="form-control" id="username" placeholder="Username" ng-required="true" name="userName"/>
								</div>

								<div class="input-group" style="margin-bottom: 25px">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-lock"></i>
									</span>
									<input type="password" ng-model="passWord" class="form-control" id="password" placeholder="Password" ng-required="true" ng-required="true" name="pass" />
									<!-- <div ng-messages="loginForm.pass.$dirty && loginForm.pass.$touched">
										<div ng-message="loginForm.pass.$error.required">
											Password is required
										</div>
									</div> -->
								</div>
								<button class="btn btn-info btn-block login" type="submit" ng-disabled="loginForm.$invalid" ng-click="login()">Login</button>								
							</form>
						</div>
						<div class="panel-footer">
						</div>
					</div>
				</div>
			</div>
		</body>
		<script src="<?php base_url();?>includes/js/app.js"></script>
		<script src="<?php base_url();?>includes/js/controller/login.js"></script>
	</html>