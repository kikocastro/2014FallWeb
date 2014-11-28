<div class="container content" ng-app = 'app' ng-controller='IndexCtrl'>

	<div class="pull-right">
		<a class="btn btn-primary toggle-modal add" data-target="#myModal" href="?action=edit&format=plain">
			<i class="glyphicon glyphicon-pencil"></i>
			 &nbsp; Edit Profile
		</a>
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
				<div class="alert" ng-class="{bmiBgColor}" >
					Your BMI: {{ (bmiResults() | number:2) || ''}}
					{{bmiBgColor}}
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

<script type="text/javascript">

	var app = angular.module('app', [])
	.controller('BmiCalculatorCtrl', function ($scope){
		$scope.bmiResults = function(){
			return ($scope.weight / ($scope.height * $scope.height)) * 703;
		};
		$scope.bmiBgColor = function($scope){
			// console.log(bmiResults);
			if($scope.bmiResults <= 18.5 || $scope.bmiResults >= 30 ){
				return 'alert-danger'
			}else if($scope.bmiResults >= 25){
				return 'alert-warning'
			}else{
				return 'alert-success'
			}
		};
	})
	.controller('IndexCtrl', function($scope, $http){
		$http.get('?format=json')
		.success(function(data){
			$scope.data = data;
		});
	});

	$(function(){

		var $mContent = $("#myModal .modal-content");
		var defaultContent = $mContent.html();

		$.get(this.href + "&format=plain", function(data){
				$mContent.html(data);
				$mContent.find('form')
				.on('submit', function(e){
					e.preventDefault();
					$("#myModal").modal("hide");
				});
			});

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