<div class="container content" ng-app = 'app' ng-controller='IndexCtrl'>

	<div class="pull-right">
		<a data-toggle="modal" data-target="#newListModal" class="page-scroll btn btn-xl"  href="?action=edit&format=plain">Edit Profile</a>
	</div>


	<div class="row spacer-40"></div>
	<div class="row spacer-40"></div>

	<div class="row text-center">
		<div class="col-md-4">
			<span class="fa-stack fa-4x">
				<i class="fa fa-circle fa-stack-2x text-primary"></i>
				<i class="fa fa-user fa-stack-1x fa-inverse"></i>
			</span>
			<h4 class="service-heading">Profile</h4>
			<div class="text-muted">
				<p>Name: <?=$model['first_name'] . ' ' . $model['last_name']?></p>
				<p>Birthdate: <?=$model['birthdate']?></p>
				<p>Weight: <?=$model['weight']?></p>
			</div>
		</div>
		<div class="col-md-4">
			<span class="fa-stack fa-4x">
				<i class="fa fa-circle fa-stack-2x text-primary"></i>
				<i class="fa fa-crosshairs fa-stack-1x fa-inverse"></i>
			</span>
			<h4 class="service-heading">BMI Calculator</h4>
			<div ng-controller="BmiCalculatorCtrl">
				<input type="text" ng-model="height" id="txtHeight" class="form-control" placeholder="Your Height (in)">
				<input type="text" ng-model="weight" id="txtWeight" class="form-control" placeholder="Your Weight (lbs)">
				<div class="alert alert-success">
					Your BMI: {{ (results() | number:2) || ''}}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<span class="fa-stack fa-4x">
				<i class="fa fa-circle fa-stack-2x text-primary"></i>
				<i class="fa fa-cutlery fa-stack-1x fa-inverse"></i>
			</span>
			<h4 class="service-heading">Weight Tracker</h4>
			
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" >
		<div class="modal-dialog">
			<div class="modal-content">
			</div>
		</div>
	</div>
</div>

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js"></script>
<!-- high charts -->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="../content/js/high_chart_test.js"></script>
<script type="text/javascript">

	var app = angular.module('app', [])
	.controller('BmiCalculatorCtrl', function ($scope){
		$scope.results = function(){
			return ($scope.weight / ($scope.height * $scope.height)) * 703;
		};
	})
	.controller('IndexCtrl', function($scope, $http){
		$http.get('?format=json')
		.success(function(data){
			$scope.data = data;
			$scope.filteredData = data;
		});
	});

	$(function(){

		var $mContent = $("#myModal .modal-content");
		var defaultContent = $mContent.html();

		$('body').on('click', ".toggle-modal", function(event){
			event.preventDefault();
			$("#myModal").modal("show");
			var $btn = $(this);
		})

		$('#myModal').on('hidden.bs.modal', function (e) {
			$mContent.html(defaultContent);

		})

		$('.alert .close').on('click',function(e){
			$(this).closest('.alert').slideUp();
		});


	});

</script>