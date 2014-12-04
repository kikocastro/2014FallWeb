
<form class="form-horizontal" action="?action=save" method="post" >
  
  <input type="hidden" name="id" value="<?=$model['id']?>" />
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Record a food type</h4>
  </div>
  <div class="modal-body">
    
      <? if(!empty($errors)): ?>
        <div class="alert alert-danger">
          <ul>
          <? foreach ($errors as $key => $value): ?>
            <li><?=$key?> <?= $value ?></li>
        <? endforeach; ?>
        </ul>
        </div>
      <? endif; ?>

      <div class="form-group <?=!empty($errors['name']) ? 'has-error has-feedback' : '' ?>">
        <label for="txtName" class="col-sm-2 col-sm-offset-2 control-label">Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="txtName" name="name" placeholder="Name" value="<?=$model['name']?>">
          <? if(!empty($errors['name'])): ?>
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            <span class="help-block"><?=$errors['name']?></span>
          <? endif; ?>
        </div>
      </div>

  </div>
  <div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
    <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
  </div>
</form>