<form class="form-horizontal" action="?action=save" method="post">
	<input type="hidden" name='id' value="<? $model['id']?>" />

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Record a food</h4>
  </div>
  <div class="modal-body row">
		<? if(!empty($errors)): ?>
			<div class="alert alert-danger">
				<ul>
				<? foreach ($errors as $key => $value): ?>
				  <li><?=$key?> <?= $value ?></li>
			<? endforeach; ?>
			</ul>
			</div>
		<? endif; ?>

		<div class="col-sm-8 col-sm-offset-2">
		  &nbsp;
			<div class="form-group <?=!empty($errors['name']) ? 'has-error has-feedback' : '' ?>">
		    <label for="txtName" class="col-xs-4 control-label">Name</label>
		    <div class="col-xs-8">
		      <input type="text" class="form-control" id="txtName" name="Name" placeholder="Name" value="<?=$model['name']?>">
		      <? if(!empty($errors['name'])): ?>
		      	<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		      	<span class="help-block"><?=$errors['name']?></span>
		      <? endif; ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="selType_id" class="col-xs-4  control-label">Type</label>
		    <div class="col-xs-8">
		    	<select class="form-control" id="selType_id" name="Type_id" placeholder='Select a type'>
		    		<? foreach (FoodType::Get() as $value): ?>
						<option <?= $value['id']==$model['food_type_id'] ? 'selected' : '' ?> value="<?=$value['id']?>"><?=$value['name']?></option>
					<? endforeach; ?>
		    	</select>
		    </div>
		  </div>
			<div class="form-group">
				<label for="calories" class="control-label col-xs-4">Calories</label>
				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the calories *" id="calories" name='calories' value="<?=$model['calories'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">
				<label for="fat" class="control-label col-xs-4">Fat</label>
				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the fat *" id="fat" name='fat' value="<?=$model['fat'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">
				<label for="carbs" class="control-label col-xs-4">Carbs</label>
				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the carbs *" id="carbs" name='carbs' value="<?=$model['carbs'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">
				<label for="protein" class="control-label col-xs-4">Protein</label>
				<div class="col-xs-8">
					<input type="text" class="form-control" placeholder="Insert the protein *" id="protein" name='protein' value="<?=$model['protein'] ?>">
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="form-group">

				<label for="dateTime" class="control-label col-xs-4">Date and time</label>
				<div class="col-xs-8">
						
					<input type="datetime" class="form-control" id="txtTime" name='dateTime' placeholder="Time" value="<?=date('m/d/Y H:i', strtotime($model['dateTime'])) ?>">
				</div>
			</div>
			<div class="modal-footer">
				<div class="col-lg-12 text-right">
					<input type="button" data-dismiss="modal" class="btn btn-xl" value='Cancel'></input>
					<input type="submit" name='submit' class="btn btn-xl" value="Save"></input>
				</div> 
			</div>
		</div>
	</div>
</form>

