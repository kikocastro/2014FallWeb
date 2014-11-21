<form class="form-horizontal" action="?action=save" method="post">
	<input type="hidden" name='id' value="<? $model['id']?>" />

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Record a food</h4>
  </div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		  &nbsp;
			<div class="form-group">
				<label for="date" class="control-label col-xs-4">Name</label>

				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the name *" id="name" name='name' required="" data-validation-required-message="Please enter the name." value="<?=$model['name'] ?>">
					<p class="help-block text-danger"></p>
				</div>

			</div>
			<div class="form-group">

				<label for="date" class="control-label col-xs-4">Calories</label>

				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the calories *" id="cal" name='calories' required="" data-validation-required-message="Please enter the calories." value="<?=$model['calories'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">

				<label for="date" class="control-label col-xs-4">Fat</label>
				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the fat *" id="fat" name='fat' required="" data-validation-required-message="Please enter the fat." value="<?=$model['fat'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">

				<label for="date" class="control-label col-xs-4">Carbs</label>

				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the carbs *" id="carbs" name='carbs' required="" data-validation-required-message="Please enter the carbs." value="<?=$model['carbs'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">

				<label for="date" class="control-label col-xs-4">Protein</label>

				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the protein *" id="protein" name='protein' required="" data-validation-required-message="Please enter the protein." value="<?=$model['protein'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">

				<label for="date" class="control-label col-xs-4">Date and time</label>
				<div class="col-xs-8">
						
					<input type="datetime" class="form-control" id="txtTime" name='dateTime' placeholder="Time" value="<?=date('m/d/Y H:i', strtotime($model['dateTime'])) ?>">
				</div>
			</div>
			<div class="modal-footer">
				<div class="col-lg-12 text-right">
					<div id="success"></div>
					<input type="button" data-dismiss="modal" class="btn btn-xl" value='Cancel'></input>
					<input type="submit" name='submit' class="btn btn-xl"></input>
				</div>
			</div>
		</div>
	</div>
</form>

