<link rel="stylesheet" href="assets/css/colorpicker.css" />
<div class="page-header">
	<h1>
		Math Group Table 
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Edit groups
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">

	<div class="widget-box widget-color-blue ui-sortable-handle">
		<!-- #section:custom/widget-box.options -->
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-table"></i>
				Math Groupings
			</h5>

		</div>
		<div class="widget-toolbar widget-toolbar-light no-border">
				<select id="simple-colorpicker-1" class="hide">
					<option selected="" data-class="blue" value="#307ECC">#307ECC</option>
					<option data-class="blue2" value="#5090C1">#5090C1</option>
					<option data-class="blue3" value="#6379AA">#6379AA</option>
					<option data-class="green" value="#82AF6F">#82AF6F</option>
					<option data-class="green2" value="#2E8965">#2E8965</option>
					<option data-class="green3" value="#5FBC47">#5FBC47</option>
					<option data-class="red" value="#E2755F">#E2755F</option>
					<option data-class="red2" value="#E04141">#E04141</option>
					<option data-class="red3" value="#D15B47">#D15B47</option>
					<option data-class="orange" value="#FFC657">#FFC657</option>
					<option data-class="purple" value="#7E6EB0">#7E6EB0</option>
					<option data-class="pink" value="#CE6F9E">#CE6F9E</option>
					<option data-class="dark" value="#404040">#404040</option>
					<option data-class="grey" value="#848484">#848484</option>
					<option data-class="default" value="#EEE">#EEE</option>
				</select>
		</div>

		<!-- /section:custom/widget-box.options -->
		<div class="widget-body">
			<div class="widget-main no-padding">
				<table class="table table-striped table-bordered table-hover">
					<thead class="thin-border-bottom">
						<tr>
							<th>
								<i class="ace-icon fa fa-user"></i>
								Name
							</th>

							<th>
								Group Number 1
							</th>
							<th class="hidden-480">Group Number 2</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class=""></td>

							<td>
								<a href="#"></a>
							</td>

							<td class="hidden-480">
								<span class="label label-warning"></span>
							</td>
						</tr>						
						<tr>
							<td class=""></td>

							<td>
								<a href="#"></a>
							</td>

							<td class="hidden-480">
								<span class="label label-warning"></span>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/ace/elements.colorpicker.js"></script>
<script>
			jQuery(function($) {
				
				$('#simple-colorpicker-1').ace_colorpicker({pull_right:true}).on('change', function(){
					var color_class = $(this).find('option:selected').data('class');
					var new_class = 'widget-box';
					if(color_class != 'default')  new_class += ' widget-color-'+color_class;
					$(this).closest('.widget-box').attr('class', new_class);
				});
			});
</script