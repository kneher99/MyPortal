<?php include('includes/header.php') ?>
<!--Angular-->
<script src="assets/js/angular/angular.min.js"></script>
<script src="assets/js/angularApps/ProfileApp.js"></script>
<script src="https://code.angularjs.org/1.4.0/angular-sanitize.js"></script>
<!-- /section:basics/content.breadcrumbs -->
<div class="page-content" ng-app="myProfileApp">
		<!-- /section:settings.box -->
		<div class="page-header">
			<h1>
				My Profile
			</h1>
		</div><!-- /.page-header -->	

		<div class="row">
			<div class="col-xs-9" ng-controller="profileController" ng-init="init('<?php echo $_SESSION['userID']?>')">

				<!-- PAGE CONTENT BEGINS -->
				<form class="form-horizontal" role="form">	
					
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name </label>

						<div class="col-sm-6">
							<input type="fName" id="fName" name = "fName" placeholder="First Name" class="col-xs-10 col-sm-5" ng-model="fName" required/>
						</div>

					</div>		
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

						<div class="col-sm-6">
							<input type="lName" id="lName" name = "lName" placeholder="Last Name" class="col-xs-10 col-sm-5" ng-model="lName" required/>
						</div>

					</div>									
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

						<div class="col-sm-6">
							<input type="email" id="email" name = "email" placeholder="Email" class="col-xs-10 col-sm-5" ng-model="username" required/>
						</div>

					</div>	
					<div class="col-sm-3">	
					</div>
					<div class="col-sm-6">				
						<div class="form-group">
							<div class="widget-header">
								<h4 class="widget-title">Profile Picture</h4>

							</div>

							<div class="widget-body">
								<div class="widget-main">
									<div class="form-group">
										<div class="col-xs-6">
											<!-- #section:custom/file-input -->
											<label class="ace-file-input"><input type="file" id="id-input-file-2"><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6">
											<label class="ace-file-input ace-file-multiple"><input multiple="" type="file" id="id-input-file-3"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>

											<!-- /section:custom/file-input -->
										</div>
									</div>



									<!-- /section:custom/file-input.filter -->
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

</div>










<?php include('includes/footer.php') ?>