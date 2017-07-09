<!DOCTYPE html>
<html lang="en" ng-app="myLoginApp">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>My Portal</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--Angular-->
		<script src="assets/js/angular/angular.min.js"></script>
		<script src="assets/js/angularApps/LoginApp.js"></script>
		<script src="https://code.angularjs.org/1.4.0/angular-sanitize.js"></script>
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
	</head>
	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container" >
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							My Portal
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>
			</div>
		</div>
	<div class="main-container" id="main-container">	
		<!-- /section:basics/content.breadcrumbs -->
		<div class="page-content">
			<!-- /section:settings.box -->
			<div class="page-header">
				<h1>
					Log In
				</h1>
			</div><!-- /.page-header -->	

			<div class="row">
				<div class="col-xs-9" ng-controller="mainController">

					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form">
						<!-- #section:elements.form -->
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

							<div class="col-sm-6">
								<input type="email" id="email" name = "email" placeholder="Email" class="col-xs-10 col-sm-5" ng-model="username" required/>
							</div>

						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>

							<div class="col-sm-6">
								<input type="password" id="password" name = "password" placeholder="Password" class="col-xs-10 col-sm-5"  ng-model="password" required/>
							</div>
							
						</div>
						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-6">
								<button class="btn btn-info" type="submit" ng-click="validateLogin()" >
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Reset
								</button>
							</div>
						</div>
						<div class="col-sm-3" ng-model="result">
						
						</div>						
						<div class="col-sm-6" ng-bind-html="msgReturn">
							<div ng-bind-html="msgReturn"></div>
						</div>
			 		</form>
			 	</div>

		</div>














<?php include('includes/footer.php') ?>