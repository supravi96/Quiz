<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Bootstrap practice </title>
		 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script src="Jquery/jquery-3.2.1.js"></script>
		<script src="js/bootstrap.js"></script> 
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
	<body>
		<div class="container">
		<div class="row">
			<div style="margin-top: 50px ; padding:20px;" class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="panel-info" style="border: 1px solid #b3e6ff">
					<div class="panel-heading">
					<div class="panel-title forms">Rounds</div>
					</div>
					<div class="panel-body" align="center">
						<form class="form-horizontal" role="form">
							<div class="input-group forms">
								<span class="input-group-addon"><img style="height:15px ; width:15px ;"src="img/teams.png"></span>
								<input type="number" min="1" max="10" class="form-control" id="username" placeholder="No. of teams">
							</div>
							<div class="input-group forms">
								<span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
								<input type="number" min="1" max="10" class="form-control" id="password" placeholder="No. of rounds">
							</div>

								<button class="btn btn-info btn-block login form-control" type="submit">Add</button>
							
						</form>				
					</div>
					<div class="panel-footer">
					</div>
			</div>
		</div>
		</div>
	</body>
</html>