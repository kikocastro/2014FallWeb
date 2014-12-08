

<div class="row">
	<div class="col-lg-12 text-center">
		<br>
		<h2 class="section-heading">Diet Control</h2>
	</div>
</div>

<div class="container content" ng-controller='IndexCtrl'>
	<div class="row">

		<!-- Chart -->
		<div id="#chartContainer" class="col-sm-12" ng-controller="ChartCtrl" >
			<div class="col-sm-8 col-sm-offset-2 text-center">

				<div class="btn-group" role="group" aria-label="...">
					<button id="#chart-calories-btn" class='btn btn-default' ng-click="makeChart('calories')">Calories</button>
					<button id="#chart-protein-btn" class='btn btn-default' ng-click="makeChart('protein')">Protein</button>
					<button id="#chart-carbs-btn" class='btn btn-default' ng-click="makeChart('carbs')">Carbs</button>
					<button id="#chart-fat-btn" class='btn btn-default' ng-click="makeChart('fat')">Fat</button>
				</div>

				<div class="spacer-40"></div>
				
				<highchart id="chart1" config="chartConfig" class="span10" ></highchart>
			</div> 
		</div>
	</div>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3 class="section-heading ">Daily Intake</h3>
		</div>
		
		<div class="col-sm-3">
			<div class="progress">
				<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" ng-style="{ width: (calories() / 2000 * 100) + '%' }">
					Calories 
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="progress">
				<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" ng-style="{ width: (fat() / 90 * 100) + '%' }">
					Fat
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="progress">
				<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" ng-style="{ width: (fat() / 150 * 100) + '%' }">
					Carbs
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" ng-style="{ width: (protein() / 90 * 100) + '%' }">
					Protein
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

	<!-- filters -->
	<div class="row spacer-40">
		<div class="col-lg-12 text-center">
			<h3 class="section-heading ">Food Intake Log {{formatedDt = (dt | date:format)}}</h3>
		</div>
	</div>
	<div class="row spacer-40">
		<form class="form-horizontal" id='#form-filter'>
			<div class="col-sm-2">
				<div class="form-group">
					<input type="text" class="form-control"  id='#food-filter' placeholder='Filter' ng-model="query">
				</div>
			</div>
			<div class="col-sm-2">
				<!-- <input type="date"  id="datepicker" class="form-control" ng-model="myDate" /><br /> -->
				<p class="input-group">
					<input type="text" class="form-control" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" datepicker-options="dateOptions" close-text="Close" />
					<span class="input-group-btn">
						<button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
					</span>
				</p>

			</div>
			<div class="col-sm-5">
				<button type="button" class="btn btn-primary" ng-click="today()">Today</button>

				<button class='btn btn-primary' ng-click="clearFilter()">See All</button>

			</div>
		</form>
		<div class=" col-sm-2">
			<input type="text" class="typeahead form-control" placeholder="Quick add"/> 
		</div>
		<div class=" col-sm-1">
			<a class="btn btn-primary toggle-modal add" data-target="#myModal" href="?action=create">
				<i class="glyphicon glyphicon-plus"></i> Add Food
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
						<tr ng-repeat = "row in filteredData = ( data | filter:formatedDt | filter:query | orderBy: '-dateTime') ">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.12.0/ui-bootstrap-tpls.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>

<!-- high charts -->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.rawgit.com/pablojim/highcharts-ng/master/src/highcharts-ng.js"></script>
<script type="text/javascript">
	// var or functions that angular provides comes with a $ 
	var $mContent;

	var app = angular.module('app', ["highcharts-ng", 'ui.bootstrap'])
	.factory('DataFactory', function($http) {
		var filteredData = {};
		return {
			getData: function(callback){
				return $http.get('?format=json').success(callback);
			},
			setFilteredData: function(newData){
				filteredData = newData;
			},
			getFilteredData: function(){
				return filteredData;
			}
		};
	})
	.controller('ChartCtrl', ['$scope', '$filter', 'DataFactory', function($scope, $filter ,  DataFactory) {
		var dataQ = DataFactory.getData(function(results){
			$scope.data = results;
			$scope.filteredData = results;
		});

		//TODO
				// $scope.chartStartDate = function(){
				// 	DataFactory.setFilteredData($scope.filteredData); 
				// 	$scope.filteredData = DataFactory.getFilteredData();
				// }

				// $scope.$watch('chartStartDate', function(date) { 
				// 	$scope.filteredData = $filter('filter')($scope.data, date);
				// });
	$scope.chartConfig = {

		series: [{
			data: []
		}],
		title: {
			text: 'Press a button to plot a graph'
		}
	}

	$scope.makeChart  = function(field){
		var Title = field.charAt(0).toUpperCase() + field.slice(1);
		$scope.chartConfig.title.text = Title;
		dataQ.success(function(data){
			var preparedData = prepareChartData($scope.filteredData, field);
			var averageData = averageChartData($scope.filteredData, field);

			var data = [
			{ name: Title, data: preparedData.values },
			{ name: "Average", data: averageData }
			];
			$scope.chartConfig.series = data;
			$scope.chartConfig.xAxis = preparedData.xAxis;

		});
	}
	$scope.makeChart('calories');

	
}])
.controller('IndexCtrl', [ '$scope',  '$filter', 'DataFactory', function($scope, $filter, DataFactory){

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
		$scope.dt = null;
	};

	$scope.today = function() {
		$scope.dt = new Date();
	};
	$scope.today();

	$scope.open = function($event) {
		$event.preventDefault();
		$event.stopPropagation();

		$scope.opened = true;
	};

	$scope.dateOptions = {
		formatYear: 'yyyy',
		startingDay: 1
	};

	$scope.format = 'yyyy-MM-dd';

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

// function getXAxis(data) {
// 		var xAxisOutput = [];

// 		$.each(data, function(index){
// 			xAxisOutput.push(element.dateTime);
// 		});
// 		console.log(xAxisOutput);
// 		return xAxisOutput;
// 	}

function prepareChartData(data, field){
	var chartData = {
		values: [],
		xAxis: []
	};

	$.each(data, function(index, element){
		chartData.values.push(parseInt(element[field]));
		chartData.xAxis.push(element['dateTime'].slice(0,10));
	});
	return chartData;
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

			var testSerialize = $(this).serialize();

			$.post(this.action + '&format=json', testSerialize , function(data){
				then(data);
			}, 'json');
		});
	});
}       
// //TODO
// window.onload = function () {
//     angular.element(document.getElementById('#chartContainer')).scope().makeChart('calories');
//     alert("hi");
// }

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

$('.typeahead').typeahead({ },
{
	displayKey: 'name',
	source: function(query, callback){
		$.getJSON('?action=search&format=json&query=' + query, function(data){
			callback(data);
		});

	}
});	

</script>


