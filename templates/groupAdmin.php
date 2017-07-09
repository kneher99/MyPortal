
<script src="assets/js/angular/angular.min.js"></script>
<script src="assets/js/angularApps/mathGroupApp.js"></script>

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
<div class="col-xs-12 col-sm-6" ng-app="myMathGroupApp">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-xs-12">
				<table id="simple-table" class="table table-striped table-bordered table-hover" >
					<thead>
						<tr>
						<th>&nbsp;</th>
						<th>Table Name</th>	
						<th>Date Created</th>
						</tr>
					</thead>
					<tbody>
					<tr ng-repeat="table in tables">
						<td class="center">
							<button class="btn btn-xs btn-info">
									<a href=""><i class="ace-icon fa fa-pencil"></i></a>
							</button>
						</td>
						<td>{{ table.ChartName }}</td>
						<td>{{ table.dt_log }}</td>
					</tr>

					</tbody>
				</table>
			</div>
		</div>
</div>



