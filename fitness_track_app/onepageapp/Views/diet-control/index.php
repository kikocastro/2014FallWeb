

<div class="row">
	<div class="col-lg-12 text-center">
		<h2 class="section-heading">Diet Control</h2>
	</div>
</div>

<div class="container content" ng-app = 'app' ng-controller='IndexCtrl'>
	<div class="row spacer-40">
		<div class="col-sm-4">
			<!-- PUT THE MAX NUMBERS ON THE MODEL -->
			<div class="well">
				<div class="progress">
					<div class="progress-bar" ng-style="{ width: (calories() / 2000 * 100) + '%' }">
						Calories 
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar"  ng-style="{ width: (fat() / 90 * 100) + '%' }">
						Fat
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar"  ng-style="{ width: (fat() / 150 * 100) + '%' }">
						Carbs
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar"  ng-style="{ width: (protein() / 90 * 100) + '%' }">
						Protein
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-8" ng-controller="ChartCtrl" >
			<button class='btn btn-primary' ng-click="makeChart('calories')">Calories</button>
			<button class='btn btn-primary' ng-click="makeChart('protein')">Protein</button>
			<highchart id="chart1" config="chartConfig" class="span10" ></highchart> 
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

	<!-- filters -->
	<div class="row spacer-40">
		<div class="col-lg-12 text-center">
			<h3 class="section-heading ">Food Intake Log</h3>
		</div>
	</div>
	<div class="row spacer-40">
		<form class="form-horizontal" id='#form-filter'>
			<div class="col-md-2">
				<div class="form-group">
					<input type="text" class="form-control"  id='#food-filter' placeholder='Filter' ng-model="query">
				</div>
			</div>
			<div class="col-md-2">
				<input type="date"  id="datepicker" class="form-control" ng-model="myDate" /><br />
			</div>
			<div class="col-md-2">
				<button class='btn btn-primary' ng-click="clearFilter()">Clear Filters</button>

			</div>
		</form>
		<div class=" col-md-1 col-md-offset-5 pull-right">
			<a class="btn btn-primary toggle-modal add" data-target="#myModal" href="?action=create">
				<i class="glyphicon glyphicon-plus"></i>
			</a>
		</div>
	</div>
	<!-- table of food -->
	<div class="row spacer-40 ">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Type</th>
							<th>Calories</th>
							<th>Fat</th>
							<th>Carbs</th>
							<th>Protein</th>
							<th>Time</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat = "row in filteredData = (data | filter:myDate | filter:query | orderBy: '-dateTime') ">
							<td>{{row.name}}</td>
							<td><span class="label label-info">{{row.T_name}}</span></td>
							<td>{{row.calories}}</td>
							<td>{{row.fat}}</td>
							<td>{{row.carbs}}</td>
							<td>{{row.protein}}</td>
							<td>{{row.dateTime}}</td>
							<td>
								<a ng-click="click(row)" title="Edit" class="btn btn-primary btn-sm toggle-modal edit" data-target="#myModal" 
								href="?action=edit&id={{row.id}}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<a ng-click="click(row)" title="Delete" class="btn btn-primary btn-sm toggle-modal delete" data-target="#myModal" 
							href="?action=delete&id={{row.id}}">
							<i class="glyphicon glyphicon-trash"></i>
						</a>
					</td>
				</tr>			
			</tbody>
		</table>
	</div>
	<div
	class="fb-like"
	data-share="true"
	data-width="450"
	data-show-faces="true">
</div>
</div>

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js"></script>
<!-- high charts -->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/pablojim/highcharts-ng/master/src/highcharts-ng.js"></script>
<script type="text/javascript">
	// var or functions that angular provides comes with a $ 
	var $mContent;
	var $foodScope;

	var app = angular.module('app', ["highcharts-ng", 'ui.bootstrap'])
	.factory('DataFactory', function($http) {
		
		return {
			getData: function(callback){
				$http.get('?format=json').success(callback);
			}
		};
	})
	.controller('ChartCtrl', ['$scope', 'DataFactory', function($scope, DataFactory) {
		DataFactory.getData(function(results){
			$scope.data = results;
		});

		$scope.makeChart  = function(field){
			var Title = field.charAt(0).toUpperCase() + field.slice(1);
			$scope.chartConfig.title.text = Title;

			var preparedData = prepareChartData($scope.data, field);
			var averageData = averageChartData($scope.data, field);

			var data = [
			{ name: Title, data: preparedData },
			{ name: "Average", data: averageData }
			];
			$scope.chartConfig.series = data;
		}

		$scope.chartConfig = {
			options: {
				chart: {
					type: 'line'
				}
			},
			series: [{
				data: [10, 15, 12, 8, 7]
			}],
			title: {
				text: 'Hello'
			},

			loading: false
		}
	}])
	.controller('IndexCtrl', [ '$scope', 'DataFactory', function($scope, DataFactory){
		$foodScope = $scope;

		DataFactory.getData(function(results){
			$scope.data = results;
			$scope.filteredData = results;
		});
		$scope.currentRow = null;
		$scope.click = function(row){
			$scope.currentRow = row;
		}
		$scope.clearFilter = function() {
			$scope.query = null;
			$scope.myDate = null;
		};

		$scope.calories = function(){ return sum($scope.filteredData, 'calories')};
		$scope.fat = function(){ return sum($scope.filteredData, 'fat')};
		$scope.protein = function(){ return sum($scope.filteredData, 'protein')};

		$('body').on('click', ".toggle-modal", function(event){
			event.preventDefault();
			var $btn = $(this);
			MyFormDialog(this.href, function (data) {
				$("#myAlert").show().find('div').html(JSON.stringify(data));

				if($btn.hasClass('edit')){
					$scope.data[$scope.data.indexOf($scope.currentRow)] = data;
				}
				if($btn.hasClass('add')){
					$scope.data.push(data);             
				}
				if($btn.hasClass('delete')){
					$scope.data.splice($scope.data.indexOf($scope.currentRow), 1);          
				}
				$scope.$apply();
			})                
		});

	}]);

function prepareChartData(data, field){
	var chartArray = [];

	$.each(data, function(index, element){
		chartArray.push(parseInt(element[field]));
	});
	return chartArray;
}
function averageChartData(data, field){
	var chartArray = [];
	var total = sum(data, field);
	var average = Math.round(total/(data.length));

	$.each(data, function(index, element){
		chartArray.push(average);
	});

	return chartArray;
}

function sum(data, field){
	var total = 0;
	$.each(data, function(i, el){
		total += +el[field];
	});
	return total;
}

/* then: callback when the form is submitted */ 
function MyFormDialog (url, then) {
	$("#myModal").modal("show");
	$.get(url + "&format=plain", function(data){
		$mContent.html(data);
		$mContent.find('form')
		.on('submit', function(e){
			e.preventDefault();
			$("#myModal").modal("hide");

			$.post(this.action + '&format=json', $(this).serialize(), function(data){
				then(data);
			}, 'json');
		});
	});
}       



$(function(){
	$(".menu-diet-control").addClass("active");
	$mContent = $("#myModal .modal-content");
	var defaultContent = $mContent.html();
	$('#myModal').on('hidden.bs.modal', function (e) {
		$mContent.html(defaultContent);

	})

	$('.alert .close').on('click',function(e){
		$(this).closest('.alert').slideUp();
	});
});
</script>


