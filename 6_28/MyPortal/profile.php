<?php include('includes/header.php') ?>
<!--Angular-->

<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
<meta http-equiv="pragma" content="no-cache" />
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
				<form class="form-horizontal" role="form" action="updateProfile.php" id="profileForm" enctype="multipart/form-data" name="profileForm">	
					
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name </label>

						<div class="col-sm-6">
							<input type="fName" id="fName" name = "fName" placeholder="First Name" class="col-xs-10 col-sm-5" ng-model="fName" required autocomplete="off"/>
						</div>

					</div>		
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

						<div class="col-sm-6">
							<input type="lName" id="lName" name = "lName" placeholder="Last Name" class="col-xs-10 col-sm-5" ng-model="lName" required autocomplete="off"/>
						</div>

					</div>									
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

						<div class="col-sm-6">
							<input type="email" id="email" name = "email" placeholder="Email" class="col-xs-10 col-sm-5" ng-model="username" required autocomplete="off"/>
						</div>

					</div>	
					<div class="col-sm-3">
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<!-- #section:custom/file-input -->
							<input type="file" id="id-input-file-2" data-bind-file="" data-ng-model="theFile" autocomplete="off"/>
						</div>
					</div>

					<div class="col-sm-3">
					</div>			
					<div class="col-xs-6 col-sm-3 center">
						<div>
							<span>
									<img id="myAvatar" alt="{{fName}}'s Avatar" ng-src="{{avatar}}"></img>
							</span>						
							<!-- #section:pages/profile.picture -->


							<!-- /section:pages/profile.picture -->
							<div class="space-4"></div>

							<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
								<div class="inline position-relative">
									<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
										<i class="ace-icon fa fa-circle light-green"></i>
										&nbsp;
										<span class="white" ng-bind="fullName"></span>
									</a>

									<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
										<li class="dropdown-header"> Change Status </li>

										<li>
											<a href="#">
												<i class="ace-icon fa fa-circle green"></i>
														&nbsp;
												<span class="green">Available</span>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="ace-icon fa fa-circle red"></i>
														&nbsp;
												<span class="red">Busy</span>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="ace-icon fa fa-circle grey"></i>
														&nbsp;
												<span class="grey">Invisible</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="space-6"></div>




						<!-- /section:custom/extra.grid -->
						<div class="hr hr16 dotted"></div>						
						<div class="clearfix form-actions">
							<div class="col-xs-12 col-sm-3 center">
									<button class="btn btn-info" type="button" ng-Click="submitForm()">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Submit
									</button>

							</div>
						</div>
				</form>
			</div>
		</div>

</div>









<?php include('includes/footer.php') ?>