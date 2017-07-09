<?php include('includes/header.php') ?>

<script src="assets/js/angular/angular.min.js"></script>
<script src="assets/js/angularApps/mathGroupMembers.js"></script>

<!-- /section:settings.box -->
<div class="page-header">
	<h1>
		Math Group Admin 
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Add, delete or edit groups
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="col-xs-6 col-sm-6" ng-app="myMathGroupMembers">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row" ng-controller="mgController">
			<div class="col-xs-12">
				<table id="mgMemberTable" class="table table-striped table-bordered table-hover" >
					<thead>
						<tr>
							<th>Member Name</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<tr ng-repeat="member in members">
						<td><input type="text" id="Member" class="col-xs-10 col-sm-5" ng-model="member.mgUserName"></td>
						<td class="center">
							<button class="btn btn-xs btn-info" ng-click="goToMathGroup(table.ChartID);">
									<i class="ace-icon fa fa-pencil"></i>
							</button>
							<button class="btn btn-xs btn-danger" ng-click="deleteMathGroupMember(member.mgUserID);">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</button>							
						</td>						
					</tr>

					</tbody>
				</table>
			</div>

		</div>
			<div class="row">
				<div class="col-xs-12">
					<form class="form-horizontal" role="form">
						<label class="col-sm-3 control-label no-padding-right" for="newMathGroup">New Member:</label>
						<div class="col-sm-9">
							<input type="text" id="newMember" class="col-xs-10 col-sm-5" ng-model="newMember" required>&nbsp;
							<button class="btn btn-info" type="button" ng-click="addNewMember();">
								<i class="ace-icon fa fa-check bigger-110">
								</i>
								Add
							</button>
						</div>
					</form>
				</div>

			</div>		
</div>
<?php include('includes/footer.php') ?>