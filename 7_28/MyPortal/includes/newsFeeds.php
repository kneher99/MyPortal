<?php 
	
	// The request is a JSON request.
	// We must read the input.
	// $_POST or $_GET will not work!
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1); 

	$feedURL = '';
	$tableHeader = '';
	if ($feed == 'Science'){
		$feedURL = 'http://news.sciencemag.org/rss/current.xml';
		$tableHeader = 'Science';
	}
	else{
		$feedURL = 'http://collider.com/feed/';
		$tableHeader = 'Collider';
	}
?>


	<div class="widget-box">
		<div class="widget-header">
			<h5 class="widget-title"><?php echo $tableHeader ?> News</h5>	
					<div class="widget-toolbar">
						<div class="widget-menu">
							<a href="#" data-action="settings" data-toggle="dropdown">
								<i class="ace-icon fa fa-bars"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
								<li>
									<a data-toggle="tab" href="#dropdown1">See All</a>
								</li>
							</ul>
						</div>



						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>

					</div>

					<!-- /section:custom/widget-box.toolbar -->
				</div>
				<div class="widget-body">
					<div class="widget-main">		

						<?php
							$rss = new DOMDocument();
							$rss->load($feedURL);
							//print_r($rss);
							$feed = array();
							foreach ($rss->getElementsByTagName('item') as $node) {
								$item = array ( 
									'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
									'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
									'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
									'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
									);
								array_push($feed, $item);
							}

							$limit = 5;
							for($x=0;$x<$limit;$x++) {
								$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
								$link = $feed[$x]['link'];
								$description = $feed[$x]['desc'];
								$date = date('l F d, Y', strtotime($feed[$x]['date']));
								echo '<p class="alert alert-info">';
								echo '<strong><a href="'.$link.'" title="'.$title.'" target="_blank"> '.$title.'</a></strong>';
								echo ' <small><em>Posted on '.$date.'</em></small></p>';
								//echo  '<span style="margin-left:50px;">' . $description . "</span>";
								echo '</p>';
							}

						?>	
				</div>
		</div>
	</div>