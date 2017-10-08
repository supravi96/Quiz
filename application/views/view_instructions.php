<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Quiz </title>
		<?php echo $all_includes ;?>
	</head>
	<body ng-app="App" ng-controller="AppCtrl">
		<?php echo $side_view;?>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-9 col-xs-9 back">
				<div class="col-md-10 col-md-offset-1">
				<div class="page-header"><h1>Instructions</h1></div>
				  <ul>
					<li>To begin Quiz, click on the "ATTEMPT QUIZ NOW" button.</li>
					<li>The quiz consists of 25 multiple choice.</li>
					<li>Click the button to indicate your choice.</li>
					<li>Only one answer can be selected for a multiple choice question.</li>
				  </ul>
				  <button class="btn btn-danger btn-lg" onclick="location.href='Quiz';"> Attempt Quiz Now</button>
				</div>
				</div>
			</div>
		</div>
	</body>
	<script src="<?php base_url();?>includes/js/app.js"></script>
	<script src="<?php base_url();?>includes/js/controller/quiz.js"></script>
</html>