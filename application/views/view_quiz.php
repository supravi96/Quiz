<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Bootstrap practice </title>
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
		
		#option{
		margin-bottom:10px;
		}

		</style>
	</head>
	<body ng-app="App" ng-controller="AppCtrl">
		<div class="container" ng-controller="quizCtrl">
		<div class="row">
			<div style="margin-top: 50px ; padding:20px;">
				<div class="panel panel-info" style="box-shadow:0px 0px 20px #003171;">
					<div class="panel-heading" style=" background-color:#003171">
					<div class="panel-title forms">Quiz</div>
					</div>
					<div class="panel-body" align="center">
						<div class="col-md-12">
						<div class="panel">
						<div class="panel-heading">
						<div class="panel-title">Question: </div>				          
			            </div>
						<div class="panel-body">
				          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, 
						  consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						  Integer posuere erat a ante. 
			            </div>
						</div>
							
							<div class="col-md-6"><button type="button" id="option" class="btn btn-lg btn-success btn-square form-control">Answer1</button></div>
							<div class="col-md-6"><button type="button" id="option" class="btn btn-lg btn-success form-control">Answer2</button></div>
							<div class="col-md-6"><button type="button" id="option" class="btn btn-lg btn-success form-control">Answer3</button></div>
							<div class="col-md-6"><button type="button" id="option" class="btn btn-lg btn-success form-control">Answer4</button></div>
								
					</div>
					<div class="panel-footer">
					<div class="col-md-12"><button type="button" id="option" class="btn btn-sm btn-danger pull-right">PASS</button></div>
					</div>
			</div>
		</div>
		</div>


		</div>
	</body>
	<script src="<?php base_url();?>includes/js/app.js"></script>
	<script src="<?php base_url();?>includes/js/controller/quiz.js"></script>
</html>