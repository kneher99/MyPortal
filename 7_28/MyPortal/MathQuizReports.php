
<?php include('includes/header.php') ?>



<!-- /section:basics/content.breadcrumbs -->
<div class="page-content">
	<div class="page-header">
		<h1>
			Math Quiz Data 
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				The data and statistics for the math quizzes
			</small>
		</h1>
	</div><!-- /.page-header -->

							
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">

				<?php

				require_once("/classes/mathQuiz.php");

				$qryQuizData = new MyPortal\Queries\mathQuizzes\MathQuizzes();
				//echo $uID;
				$myMathResultsArray = $qryQuizData->getMathQuizData(0,0);

				$myArrayCount = count($myMathResultsArray);

				print_r($myMathResultsArray[0]["user_fname"]);


				$limit = 5;
				for($x=0;$x<$limit;$x++) {
					$firstName = $myMathResultsArray[$x]["user_fname"];
					$score = $myMathResultsArray[$x]["mathScore"];
					$date = $myMathResultsArray[$x]["DateAndTime"];
					$mathLevel = $myMathResultsArray[$x]["difficultyLevel"];
					echo '<p class="alert alert-info">';
					echo '<strong>' . $firstName . '</strong>';
					echo ' <small><em>on '.$date.'</em></small></p>';
					//echo  '<span style="margin-left:50px;">' . $description . "</span>";
					echo '</p>';
				}					
				
				?>
			</div>

		</div>
	</div>





</div>
<?php include('includes/footer.php') ?>