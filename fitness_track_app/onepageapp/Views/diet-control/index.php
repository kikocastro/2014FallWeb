<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Diet Control</h2>
	</div>
</div>
<div class="pull-right">
	<a data-toggle="modal" data-target="#dietControlModal" class="page-scroll btn btn-xl"  href="?action=save&format=plain">+</a>
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
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<? foreach ($model as $rs): ?>
						<tr>
						<td><?=$rs['name'] ?></td>
						<td><span class="label label-default"><?=$rs['calories'] ?></span></td>
						<td><?=$rs['fat'] ?></td>
						<td><?=$rs['carbs'] ?></td>
						<td><?=$rs['protein'] ?></td>
						<td><?=date('m/d/Y H:i', strtotime( $rs['dateTime'] )) ?></td>
						
						<td>
							<button title class="btn btn-primary" data-toggle="modal" data-target="#dietControlModal" href="?action=edit&format=plain&id=<?=$rs['id']?>">
              	<span>Edit</span>
							</button>
							<button type="submit" class="btn btn-primary">
								<span>x</span>
							</button>
						</td>
					</tr>
					<? endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- modal -->
<div class="modal fade" id="dietControlModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		</div>
	</div>
</div>

