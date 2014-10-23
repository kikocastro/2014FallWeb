<div class="row">
  <form class="form-horizontal">
    <div class="col-sm-8 col-sm-offset-2">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insert your name *" id="name" required="" data-validation-required-message="Please enter your name.">
        <p class="help-block text-danger"></p>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insert your age *" id="age" required="" data-validation-required-message="Please enter your age.">
        <p class="help-block text-danger"></p>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Insert your weight *" id="weight" required="" data-validation-required-message="Please enter your weight.">
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
