<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Exercises</h2>
	</div>
</div>
<div class="pull-right">
	<a data-toggle="modal" data-target="#newListModal" class="page-scroll btn btn-xl"  href="?action=edit&format=plain">+</a>
</div>
<!-- table of exercise -->
<div class="row ">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Type</th>
						<th>Distance</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<? foreach ($model as $rs): ?>
						<tr>
						<td><?=$rs['exercise_type']?></td>
						<td><?=$rs['distance']?></td>
						<td><?=$rs['dateTime']?></td>
					</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- modal -->
<div class="modal fade" id="newListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		</div>
	</div>
</div>

