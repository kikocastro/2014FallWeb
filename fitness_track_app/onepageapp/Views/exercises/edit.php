<div class="row">
  <form class="form-horizontal">
    <div class="col-sm-8 col-sm-offset-2">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insert the type *" id="exercise-type" required="" data-validation-required-message="Please enter the type.">
        <p class="help-block text-danger"></p>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insert the distance *" id="distance" required="" data-validation-required-message="Please enter the distance.">
        <p class="help-block text-danger"></p>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insert the calories *" id="calories" required="" data-validation-required-message="Please enter the calories.">
        <p class="help-block text-danger"></p>
      </div>
      <div class="form-group">
        <label for="date" class="control-label col-xs-4">Date and time</label>
        <div class="col-xs-8">
          <input type="datetime-local" class="form-control" id="txtTime" placeholder="Time">
        </div>
      </div>
      

      <div class="col-lg-12 text-right">
        <div id="success"></div>
        <button type="submit" class="btn btn-xl">
          Save
        </button>
      </div>
    </div>
  </form>
</div>
