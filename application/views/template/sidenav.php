<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Quiz</title>
		<style>
			
		.sidebar{
		margin-top:75px;
		}
		.navbar{
		/*background-image:url('img/navbar1.jpg');*/
		background-size:cover;
		box-shadow:2px 2px 2px #5A55A3;
		height:auto;
		min-height:75px;
		}
		.container-fluid {
		padding-right: 0px;
		padding-left: 0px;
		}
		div.bhoechie-tab-menu{
		padding-right: 0;
		padding-left: 0 !important;
		padding-bottom: 0;
		}
		div.bhoechie-tab-menu div.list-group{
		margin-bottom: 0;
		}
		div.bhoechie-tab-menu div.list-group>a{
		margin-bottom: 0;
		height:120px;
		}
		div.bhoechie-tab-menu div.list-group>a .glyphicon,
		div.bhoechie-tab-menu div.list-group>a .fa {
		color: #5A55A3;
		}
		div.bhoechie-tab-menu div.list-group>a:first-child{
		border-top-right-radius: 0;
		-moz-border-top-right-radius: 0;
		}
		div.bhoechie-tab-menu div.list-group>a:last-child{
		border-bottom-right-radius: 0;
		-moz-border-bottom-right-radius: 0;
		}
		div.bhoechie-tab-menu div.list-group>a.active,
		div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
		div.bhoechie-tab-menu div.list-group>a.active .fa{
		background-color: #5A55A3;
		background-image: #5A55A3;
		color: #ffffff;
		}
		div.bhoechie-tab-menu div.list-group>a.active:after{
		content: '';
		position: absolute;
		left: 100%;
		top: 50%;
		margin-top: -13px;
		border-left: 0;
		border-bottom: 13px solid transparent;
		border-top: 13px solid transparent;
		border-left: 10px solid #5A55A3;
		}
		div.bhoechie-tab-content{
		background-color: #ffffff;
		/* border: 1px solid #eeeeee; */
		padding-left: 20px;
		padding-top: 10px;
		}
		div.bhoechie-tab div.bhoechie-tab-content:not(.active){
		display: none;
		}
		</style>
		<script>
		$(document).ready(function() {
		$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
		e.preventDefault();
		$(this).siblings('a.active').removeClass("active");
		$(this).addClass("active");
		var index = $(this).index();
		$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
		});
		});
		</script>
		<body>
			<div class="container-fluid">
				<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
					
					<div class="navbar-header">
						<div class="navbar-brand" href="#"><img src="<?php base_url();?>includes/img/quiz_icon.png" height="50px" width="150px"></img></div>
						<button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</div>
					<div id="navbarCollapse" class="collapse navbar-collapse">
						<ul class="nav navbar-nav pull-right">
							<li><a href="#Home"> Home </a></li>
							<li><a href="#About Us"> Logout </a></li>
						</ul>
					</div>
				</nav>
				<div class="sidebar">
					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 bhoechie-tab-menu">
						<div class="list-group">
							<a href="Quiz" class="list-group-item active text-center">
								<h4 class="glyphicon glyphicon-plane"></h4><br/>QUIZ
							</a>
							<a href="Questionans" class="list-group-item text-center">
								<h4 class="glyphicon glyphicon-plane"></h4><br/>Question Set
							</a>
							<a href="#" class="list-group-item text-center">
								<h4 class="glyphicon glyphicon-road"></h4><br/>Report
							</a>
							<a href="Teaminfo" class="list-group-item text-center">
								<h4 class="glyphicon glyphicon-home"></h4><br/>Add Teams
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
					
				</div>
				
			</div>
		</body>
	</html>