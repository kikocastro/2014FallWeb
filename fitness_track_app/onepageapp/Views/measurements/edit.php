<form class="form-horizontal" action="?action=save" method="post">
  <input type="hidden" name='id' value="<? $model['id']?>" />
  <input type="hidden" name='user_id' value="1" />

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
      <div class="form-group <?=!empty($errors['weight']) ? 'has-error has-feedback' : '' ?>">
        <label for="txtName" class="col-xs-4 control-label">Weight</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" id="txtName" name="weight" placeholder="Weight" value="<?=$model['weight']?>">
          <? if(!empty($errors['weight'])): ?>
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            <span class="help-block"><?=$errors['weight']?></span>
          <? endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label for="biceps" class="control-label col-xs-4">Biceps</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" placeholder="Insert the biceps *" id="biceps" name='biceps' value="<?=$model['biceps'] ?>">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="form-group">
        <label for="chest" class="control-label col-xs-4">Chest</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" placeholder="Insert the chest *" id="chest" name='chest' value="<?=$model['chest'] ?>">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="form-group">
        <label for="waist" class="control-label col-xs-4">Waist</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" placeholder="Insert the waist *" id="waist" name='waist' value="<?=$model['waist'] ?>">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="form-group">
        <label for="hips" class="control-label col-xs-4">Hips</label>
        <div class="col-xs-8">
          <input type="text" class="form-control" placeholder="Insert the hips *" id="hips" name='hips' value="<?=$model['hips'] ?>">
          <p class="help-block text-danger"></p>
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

