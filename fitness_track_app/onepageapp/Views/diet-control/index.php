<div class="row">
  <div class="col-lg-12 text-center">
    <br>
    <h2 class="section-heading">Diet Control</h2>
  </div>
</div>

<div class="row" ng-controller="social">
  <button class="btn btn-primary" ng-click="login()">
    FB Login
  </button>

</div>

<div class="container content" id="IndexCtrl" ng-controller='IndexCtrl'>
  <div class="row">

    <!-- Chart -->
    <div id="#chartContainer" class="col-sm-12" ng-controller="ChartCtrl" >
      <div class="col-sm-8 col-sm-offset-2 text-center">

          <button id="#chart-calories-btn" class='btn btn-default' ng-click="makeChart('calories')">
            Calories
          </button>
          <button id="#chart-protein-btn" class='btn btn-default' ng-click="makeChart('protein')">
            Protein
          </button>
          <button id="#chart-carbs-btn" class='btn btn-default' ng-click="makeChart('carbs')">
            Carbs
          </button>
          <button id="#chart-fat-btn" class='btn btn-default' ng-click="makeChart('fat')">
            Fat
          </button>
        </div>

        <div class="spacer-40"></div>

        <highchart id="foodChart" config="chartConfig" class="span10" ></highchart>
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
      <div class="modal-content"></div>
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
        <p class="input-group">
          <input type="text" class="form-control" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" datepicker-options="dateOptions" close-text="Close" />
          <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="open($event)">
              <i class="glyphicon glyphicon-calendar"></i>
            </button> </span>
        </p>

      </div>
      <div class="col-sm-5">
        <button type="button" class="btn btn-primary" ng-click="yesterday()">
          Yesterday
        </button>
        <button type="button" class="btn btn-primary" ng-click="today()">
          Today
        </button>
        <button class='btn btn-primary' ng-click="clearFilter()">
          See All
        </button>
      </div>
    </form>
    <div class=" col-sm-2">
      <div id"#title"></div>
      <input id="#search-text" type="text" class="typeahead form-control" data-provide="typeahead" placeholder="Quick Add"/>
      <a id="#quickadd-btn" class="btn btn-primary toggle-modal quickadd initialy-hidden" data-target="#myModal" href=""> Add </a>
    </div>
    <div class=" col-sm-1">
      <a class="btn btn-primary toggle-modal add" data-target="#myModal" href="?action=create"> <i class="glyphicon glyphicon-plus"></i> Add Food </a>
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
              <td><a ng-click="click(row)" title="Edit" class="btn btn-primary btn-sm toggle-modal edit" data-target="#myModal"
              href="?action=edit&id={{row.id}}"> <i class="glyphicon glyphicon-pencil"></i> </a><a ng-click="click(row)" title="Delete" class="btn btn-primary btn-sm toggle-modal delete" data-target="#myModal"
              href="?action=delete&id={{row.id}}"> <i class="glyphicon glyphicon-trash"></i> </a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <div
      class="fb-like"
      data-share="true"
      data-width="450"
      data-show-faces="true"></div>
    </div>

    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.12.0/ui-bootstrap-tpls.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.js"></script>
    <!-- high charts -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.rawgit.com/pablojim/highcharts-ng/master/src/highcharts-ng.js"></script>
    <!-- diet control -->
    <script type="text/javascript" src="../content/js/diet-control.js"></script>

