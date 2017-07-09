<div class="page-content">
	<!-- #section:settings.box -->
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal" role="form">
				<div class="row" style="margin-left:15px;">
					<div class="form-group" ng-show="question == 10 || question == 0">
						<label for="lvlSelect"> Level: </label>
						<select id="levelID" id="lvlSelect" ng-model="myLevel" ng-options="level.levelVal as level.levelName for level in levels" ng-change="changeLevel(1);" >
							<option value="">Choose a Level</option>
						</select>
					</div>
				</div>
				<div class="space-8"></div>
				<div class="row">
					<div class="form-group" style="margin-left:15px;">

						
						<form class="form-inline">
							<input type="text" id ="num1" class="input-small" ng-model="minuend" placeholder="Minuend" disabled/>
							<label class="inline">
								<i class="ace-icon fa fa-minus blue"></i>
							</label>			
							<input type="text" id="num2" class="input-small" ng-model="subtrahend" placeholder="Subtrahend" disabled/>
							<input type="text" id="answer" class="input-small" ng-model="myAnswer" autofocus/>

							<button type="button" class="btn btn-info btn-sm" ng-click="setAnswer();" onClick="document.getElementById('answer').focus();">
								<i class="ace-icon fa fa-check bigger-110"></i>Solve
							</button>
						</form>

					</div>
				</div>

			</form>
		</div>
	</div>
	<div class="row">
		<div ng-show="answerMessage.length > 0" ng-class="answerMessage == 'Correct!' ? 'alert-success' : 'alert-danger'" style="font-weight:bold" class="col-xs-3">{{answerMessage}}</div>
	</div>	
	<div class="row">
		<div style="font-weight:bold;color:green;font-size:18px;" ng-hide="answerMessage.length == 0">Your score: {{score}}/10</div>
	</div>		
</div>