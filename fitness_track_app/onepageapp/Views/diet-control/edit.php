<div class="row">
	<form class="form-horizontal">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Insert the name *" id="name" required="" data-validation-required-message="Please enter the name.">
				<p class="help-block text-danger"></p>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Insert the calories *" id="cal" required="" data-validation-required-message="Please enter the calories.">
				<p class="help-block text-danger"></p>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Insert the fat *" id="fat" required="" data-validation-required-message="Please enter the fat.">
				<p class="help-block text-danger"></p>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Insert the carbs *" id="carbs" required="" data-validation-required-message="Please enter the carbs.">
				<p class="help-block text-danger"></p>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Insert the protein *" id="protein" required="" data-validation-required-message="Please enter the protein.">
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
