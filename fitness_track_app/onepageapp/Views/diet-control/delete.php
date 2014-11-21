<form class="form-horizontal" action="?action=delete" method="post" >
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
      
      <h5>Are you sure you want to delete <?=$model['name']?> from <?=$model['dateTime']?>?</h5>
      
    </div>
  <div class="modal-footer">
    <input type="hidden" name="id" value="<?=$model['id']?>" />
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
    <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
  </div>
</form>