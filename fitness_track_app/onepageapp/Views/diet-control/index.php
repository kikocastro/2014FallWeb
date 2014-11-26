

<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Diet Control</h2>
	</div>
</div>

<div class="container content" ng-app = 'app' ng-controller='index'>

	<div class="row spacer-40">
		<div class="col-sm-4">
			<div class="well" ng-controller="bmi-calculator">
				<input type="text" ng-model="height" id="txtHeight" class="form-control" placeholder="Your Height (in)">
				<input type="text" ng-model="weight" id="txtWeight" class="form-control" placeholder="Your Weight (lbs)">
				<div class="alert alert-success">
					Your BMI: {{ (results() | number:2) || ''}}
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div ng-controller="DatepickerCtrl">
				<div class="row">
					<div class="col-md-7 col-md-offset-5">
						<p class="input-group">
							<input type="text" class="form-control" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" min-date="minDate" max-date="'2015-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
							</span>
						</p>
					</div>
				</div>
			</div>
			<div class="well">
				<div class="progress">
					<div class="progress-bar" ng-style="{ width: (calories / 2000 * 100) + '%' }">
						Calories 
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar"  ng-style="{ width: (fat / 90 * 100) + '%' }">
						Fat
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar"  ng-style="{ width: (protein / 90 * 100) + '%' }">
						Protein
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
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" >
		<div class="modal-dialog">
			<div class="modal-content">
			</div>
		</div>
	</div>

	<!-- table of food -->
	<div class="row spacer-40">
		<div class="col-lg-12 text-center">
			<h3 class="section-heading">Food Intake Log</h3>
		</div>
	</div>
	<div class="row">
		<div class="pull-right">
			<a class="btn btn-primary toggle-modal add" data-target="#myModal" href="?action=create">
				<i class="glyphicon glyphicon-plus"></i>
			</a>
		</div>
	</div>
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
						<tr ng-repeat = "row in data | filter: dt | date:'yyyy-MM-dd'">
							<td>{{row.name}}</td>
							<td><span class="label label-default">{{row.calories}}</span></td>
							<td>{{row.fat}}</td>
							<td>{{row.carbs}}</td>
							<td>{{row.protein}}</td>
							<td>{{row.dateTime}}</td>
							<td>
								<a title="Edit" class="btn btn-primary btn-sm toggle-modal edit" data-target="#myModal" 
								href="?action=edit&id={{row.id}}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<a title="Delete" class="btn btn-primary btn-sm toggle-modal delete" data-target="#myModal" 
							href="?action=delete&id={{row.id}}">
							<i class="glyphicon glyphicon-trash"></i>
						</a>
					</td>
				</tr>			
			</tbody>
		</table>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.10.0.js"></script>
<script type="text/javascript">

	var app = angular.module('app', ['ui.bootstrap'])
	.controller('bmi-calculator', function ($scope){
		$scope.results = function(){
			return ($scope.weight / ($scope.height * $scope.height)) * 703;
		};
	})
	.controller('index', function($scope, $http){
		$http.get('?format=json')
		.success(function(data){
			$scope.data = data;
			$scope.calories = sum(data, 'calories');
			$scope.fat = sum(data, 'fat');
			$scope.protein = sum(data, 'protein');
		});
	})
	.controller('DatepickerCtrl', function ($scope) {
		$scope.today = function() {
			$scope.dt = new Date();
		};
		// $scope.today();

		$scope.clear = function () {
			$scope.dt = null;
		};

	  $scope.toggleMin = function() {
	  	$scope.minDate = $scope.minDate ? null : new Date();
	  };
	  $scope.toggleMin();

	  $scope.open = function($event) {
	  	$event.preventDefault();
	  	$event.stopPropagation();

	  	$scope.opened = true;
	  };

	  $scope.dateOptions = {
	  	formatYear: 'yy',
	  	startingDay: 1
	  };

	  $scope.formats = ['yyyy-MM-dd', 'dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
	  $scope.format = $scope.formats[0];
	});

	function sum(data, field){
		var total = 0;
		$.each(data, function(i, el){
			total += +el[field];
		});
		return total;
	}


	$(function(){

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
							console.log(data);
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


