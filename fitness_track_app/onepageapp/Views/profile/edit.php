<form class="form-horizontal" action="?action=save" method="post">
  <input type="hidden" name='id' value="<? $model['id']?>" />

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Profile</h4>
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
  <div class="form-group <?=!empty($errors['first_name']) ? 'has-error has-feedback' : '' ?>">
    <label for="txtName" class="col-xs-4 control-label">Name</label>
    <div class="col-xs-8">
      <input type="text" class="form-control" id="txtName" name="Name" placeholder="Name" value="<?=$model['first_name']?>">
      <? if(!empty($errors['first_name'])): ?>
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      <span class="help-block"><?=$errors['first_name']?></span>
    <? endif; ?>
  </div>
</div>
  <div class="form-group <?=!empty($errors['last_name']) ? 'has-error has-feedback' : '' ?>">
    <label for="txtName" class="col-xs-4 control-label">Name</label>
    <div class="col-xs-8">
      <input type="text" class="form-control" id="txtName" name="Name" placeholder="Name" value="<?=$model['last_name']?>">
      <? if(!empty($errors['last_name'])): ?>
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      <span class="help-block"><?=$errors['last_name']?></span>
    <? endif; ?>
  </div>
</div>
<div class="form-group">
  <label for="weight" class="control-label col-xs-4">Weight</label>
  <div class="col-xs-8">
    <input type="text" class="form-control" placeholder="Insert your weight *" id="weight" name='weight' value="<?=$model['weight'] ?>">
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="form-group">
<label for="birthdate" class="control-label col-xs-4">Birthdate</label>
  <div class="col-xs-8">
  <input type="date" class="form-control" placeholder="Insert your birthdate *" id="birthdate" name='birthdate' value="<?=date('m/d/Y H:i', strtotime($model['birthdate'])) ?>">
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

