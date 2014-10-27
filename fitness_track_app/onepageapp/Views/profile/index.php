<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Your profile</h2>
	</div>
</div>
<div class="pull-right">
	<a data-toggle="modal" data-target="#newListModal" class="page-scroll btn btn-xl"  href="?action=edit&format=plain">Edit</a>
</div>

<div class="row ">
	<div class="col-lg-12 text-center">
		<p>Name: <?=$model['first_name'] . ' ' . $model['last_name']?></p>
		<p>Birthdate: <?=$model['birthdate']?></p>
		<p>Weight: <?=$model['weight']?></p>
	</div>
</div>



<!-- modal -->
<div class="modal fade" id="newListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		</div>
	</div>
</div>

