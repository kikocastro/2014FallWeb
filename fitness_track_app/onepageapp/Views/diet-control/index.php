<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Diet Control</h2>
	</div>
</div>

<!-- Alert -->
<div class="alert alert-success initialy-hidden" id="myAlert">
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	<div></div>
</div>

<div class="pull-right">
	<a class="btn btn-primary toggle-modal add" data-target="#myModal" href="?action=create&format=plain">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content">
		</div>
	</div>
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
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){

		var $mContent = $("#myModal .modal-content");
		var defaultContent = $mContent.html();

		var tmpl = Handlebars.compile($("#tmpl").html());

		$.getJSON('?format=json', function(data){
			$.each(data, function(i,el){
				$('tbody').append(tmpl(el));
			});
		});

		$('body').on('click', ".toggle-modal", function(event){
			event.preventDefault();
			$("#myModal").modal("show");
			var $btn = $(this);

			$.get(this.href + "&format=plain", function(data){
				$mContent.html(data);
				$mContent.find('form')
				.on('submit', function(e){
					e.preventDefault();
					$("#myModal").modal("hide");

					$.post(this.action + '&format=json', $(this).serialize(), function(data){

						$("#myAlert").show().find('div').html(JSON.stringify(data));

						if($btn.hasClass('edit')){
							$btn.closest('tr').replaceWith(tmpl(data));							
						}
						if($btn.hasClass('add')){
							$('tbody').append(tmpl(data));							
						}
						if($btn.hasClass('delete')){
							$btn.closest('tr').remove();							
						}

					}, 'json');


				});
			});
		})

		$('#myModal').on('hidden.bs.modal', function (e) {
			$mContent.html(defaultContent);

		})

		$('.alert .close').on('click',function(e){
			$(this).closest('.alert').slideUp();
		});


	});
</script>

<script type="text/x-handlebars-template" id="tmpl">
	<tr>
		<td>{{name}}</td>
		<td><span class="label label-default">{{calories}}</span></td>
		<td>{{fat}}</td>
		<td>{{carbs}}</td>
		<td>{{protein}}</td>
		<td>{{dateTime}}</td>
		<td>
			<a title="Edit" class="btn btn-primary btn-sm toggle-modal edit" data-target="#myModal" href="?action=edit&format=plain&id={{id}}">
				<i class="glyphicon glyphicon-pencil"></i>
			</a>
			<a title="Delete" class="btn btn-primary btn-sm toggle-modal delete" data-target="#myModal" href="?action=delete&format=plain&id={{id}}">
				<i class="glyphicon glyphicon-trash"></i>
			</a>
		</td>
	</tr>			
</script>


