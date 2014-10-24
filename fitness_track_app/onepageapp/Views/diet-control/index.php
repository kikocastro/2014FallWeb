<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Diet Control</h2>
	</div>
</div>
<div class="pull-right">
	<a data-toggle="modal" data-target="#newListModal" class="page-scroll btn btn-xl"  href="?action=edit&format=plain">+</a>
</div>
<!-- table of food -->
<div class="row ">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Calories</th>
						<th>Fat</th>
						<th>Carbs</th>
						<th>Protein</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody>
					<? foreach ($model as $rs): ?>
						<tr>
						<td><?=$rs['name']?></td>
						<td><span class="label label-default"><?=$rs['calories']?></span></td>
						<td><?=$rs['fat']?></td>
						<td><?=$rs['carbs']?></td>
						<td><?=$rs['protein']?></td>
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

