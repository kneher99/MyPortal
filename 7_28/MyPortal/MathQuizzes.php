
<?php include('includes/header.php') ?>


<script src="assets/js/angular/angular.min.js"></script>
<script src="assets/js/angular/angular-route.min.js"></script>
<script src="assets/js/angularApps/mathQuizzesApp.js"></script>
<div class="page-content" ng-app="myMathQuizzesApp" style="z-index:99;margin-bottom:75px;">


	<!-- /section:settings.box -->
	<div class="page-header">
		<h1>
			Math Quiz
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Test you math knowledge!
			</small>
		</h1>
	</div><!-- /.page-header -->

							
	<div class="row">
		<ng-view></ng-view>
	</div>



</div>









<?php include('includes/footer.php') ?>