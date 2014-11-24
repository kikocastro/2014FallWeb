

<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Diet Control</h2>
	</div>
</div>

<div class="container content" ng-app = 'app' ng-controller='index'>

	<div class="row">
		<div class="col-sm-4">
			<div class="well" ng-controller="bmi-calculator">
				<input type="text" ng-model="height" id="txtHeight" class="form-control" placeholder="Your Height (in)">
				<input type="text" ng-model="weight" id="txtWeight" class="form-control" placeholder="Your Weight (lbs)">
				<div class="alert alert-success">
					Your BMI: {{ (results() | number:2)|| ''}}
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="well">
				<div class="progress">
					<div class="progress-bar" ng-style="{ width: (calories / 2000 * 100) + '%' }">
						Calories
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar"  ng-style="{ width: (fat / 60 * 100) + '%' }">
						Fat
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar"  ng-style="{ width: (protein / 60 * 100) + '%' }">
						Fiber
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Alert -->
	<div class="row">
		<div class="alert alert-success initialy-hidden" id="myAlert">
			<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
			</button>
			<div></div>
		</div>
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
						<tr ng-repeat = 'row in data'>
							<td>{{row.name}}</td>
							<td><span class="label label-default">{{row.calories}}</span></td>
							<td>{{row.fat}}</td>
							<td>{{row.carbs}}</td>
							<td>{{row.protein}}</td>
							<td>{{row.dateTime}}</td>
							<td>
								<a title="Edit" class="btn btn-primary btn-sm toggle-modal edit" data-target="#myModal" 
								href="?action=edit&format=plain&id={{row.id}}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<a title="Delete" class="btn btn-primary btn-sm toggle-modal delete" data-target="#myModal" 
							href="?action=delete&format=plain&id={{row.id}}">
							<i class="glyphicon glyphicon-trash"></i>
						</a>
					</td>
				</tr>			
			</tbody>
		</table>
	</div>
</div>
</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script type="text/javascript">

	var app = angular.module('app', [])
	.controller('bmi-calculator', function ($scope){
		$scope.results = function(){
			return ($scope.weight / ($scope.height * $scope.height)) * 703;
		};
	})
	.controller('index', function($scope, $http){
		$http.get('?format=json')
		.success(function(data){
			$scope.data = data;
			$scope.calories = sum(data, 'Calories');
			$scope.fat = sum(data, 'Fat');
			$scope.protein = sum(data, 'Protein');
		});
	});

	function sum(data, field){
		var total = 0;
		$.each(data, function(i, el){
			total += +el[field];
		});
		return total;
	}


	$(function(){
				$(".food").addClass("active");
								
				var $mContent = $("#myModal .modal-content");
				var defaultContent = $mContent.html();
				
								
				
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


