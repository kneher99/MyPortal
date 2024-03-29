<?php include('includes/header.php');

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

?>
<!-- /section:basics/content.breadcrumbs -->
<div class="page-content">
	<!-- /section:settings.box -->
	<div class="page-header">
		<h1>
			Math Group Data 
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				The data and statistics for the math groups
			</small>
		</h1>
	</div><!-- /.page-header -->

							
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-sm-5">
						<div class="widget-box">
							<div class="widget-header widget-header-flat widget-header-small">
								<h5 class="widget-title">
									<i class="ace-icon fa fa-signal"></i>
									Traffic Sources
								</h5>

								<div class="widget-toolbar no-border">
									<div class="inline dropdown-hover">
										<button class="btn btn-minier btn-primary">
											This Week
											<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
										</button>

										<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
											<li class="active">
												<a href="#" class="blue">
													<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
													This Week
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
													Last Week
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
													This Month
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
													Last Month
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<!-- #section:plugins/charts.flotchart -->
									<div id="piechart-placeholder"></div>

									<!-- /section:plugins/charts.flotchart -->
									<div class="hr hr8 hr-double"></div>

									<div class="clearfix">
										<!-- #section:custom/extra.grid -->
										<div class="grid3">
											<span class="grey">
												<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
												&nbsp; likes
											</span>
											<h4 class="bigger pull-right">1,255</h4>
										</div>

										<div class="grid3">
											<span class="grey">
												<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
												&nbsp; tweets
											</span>
											<h4 class="bigger pull-right">941</h4>
										</div>

										<div class="grid3">
											<span class="grey">
												<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
												&nbsp; pins
											</span>
											<h4 class="bigger pull-right">1,050</h4>
										</div>

										<!-- /section:custom/extra.grid -->
									</div>
								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div><!-- /.widget-box -->
					</div><!-- /.col -->
				</div><!-- /.row -->			


			</div>
		</div>
	</div>






<script>

	$(function(){
		

	  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
	  //but sometimes it brings up errors with normal resize event handlers
	  $.resize.throttleWindow = false;
	
	  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
	  var data = [
		{ label: "social networks",  data: 38.7, color: "#68BC31"},
		{ label: "search engines",  data: 24.5, color: "#2091CF"},
		{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
		{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
		{ label: "other",  data: 10, color: "#FEE074"}
	  ]
	  function drawPieChart(placeholder, data, position) {
	 	  $.plot(placeholder, data, {
			series: {
				pie: {
					show: true,
					tilt:0.8,
					highlight: {
						opacity: 0.25
					},
					stroke: {
						color: '#fff',
						width: 2
					},
					startAngle: 2
				}
			},
			legend: {
				show: true,
				position: position || "ne", 
				labelBoxBorderColor: null,
				margin:[-30,15]
			}
			,
			grid: {
				hoverable: true,
				clickable: true
			}
		 })
	 }
	 drawPieChart(placeholder, data);
	
	 /**
	 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
	 so that's not needed actually.
	 */
	 placeholder.data('chart', data);
	 placeholder.data('draw', drawPieChart);
	
	
	  //pie chart tooltip example
	  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
	  var previousPoint = null;
	
	  placeholder.on('plothover', function (event, pos, item) {
		if(item) {
			if (previousPoint != item.seriesIndex) {
				previousPoint = item.seriesIndex;
				var tip = item.series['label'] + " : " + item.series['percent']+'%';
				$tooltip.show().children(0).text(tip);
			}
			$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
		} else {
			$tooltip.hide();
			previousPoint = null;
		}
		
	 });
	
		/////////////////////////////////////
		$(document).one('ajaxloadstart.page', function(e) {
			$tooltip.remove();
		});
	
	
	
	
		var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
			d1.push([i, Math.sin(i)]);
		}
	
		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.5) {
			d2.push([i, Math.cos(i)]);
		}
	
		var d3 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.2) {
			d3.push([i, Math.tan(i)]);
		}


		var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
		$.plot("#sales-charts", [
			{ label: "Domains", data: d1 },
			{ label: "Hosting", data: d2 },
			{ label: "Services", data: d3 }
		], {
			hoverable: true,
			shadowSize: 0,
			series: {
				lines: { show: true },
				points: { show: true }
			},
			xaxis: {
				tickLength: 0
			},
			yaxis: {
				ticks: 10,
				min: -2,
				max: 2,
				tickDecimals: 3
			},
			grid: {
				backgroundColor: { colors: [ "#fff", "#fff" ] },
				borderWidth: 1,
				borderColor:'#555'
			}
		});












	});

		

</script>

<?php include('includes/footer.php') ?>