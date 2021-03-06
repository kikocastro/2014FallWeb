// var or functions that angular provides comes with a $
var $mContent;
var $socialScope = null;

var friendsArray = [];

var app = angular.module('app', ["highcharts-ng", 'ui.bootstrap']).factory('DataFactory', function($http) {
  var filteredData = {};
  return {
    getData : function(callback) {
      return $http.get('?format=json').success(callback);
    },
    setFilteredData : function(newData) {
      filteredData = newData;
    },
    getFilteredData : function() {
      return filteredData;
    }
  };
}).controller('ChartCtrl', ['$scope', '$filter', 'DataFactory',
function($scope, $filter, DataFactory) {
  var dataQ = DataFactory.getData(function(results) {
    $scope.data = results;
    $scope.filteredData = results;
  });

  $scope.chartConfig = {

    series : [{
      data : []
    }],
    title : {
      text : ''
    }
  };

  $scope.makeChart = function(field) {
    var Title = field.charAt(0).toUpperCase() + field.slice(1);
    $scope.chartConfig.title.text = Title;
    dataQ.success(function(data) {
      var preparedData = prepareChartData($scope.filteredData, field);
      var averageData = averageChartData($scope.filteredData, field);

      var data = [{
        name : Title,
        data : preparedData.values
      }, {
        name : "Average",
        data : averageData
      }];
      $scope.chartConfig.series = data;
      $scope.chartConfig.xAxis = preparedData.xAxis;

    });
  };
  $scope.makeChart('calories');
}]).controller('IndexCtrl', ['$scope', '$filter', 'DataFactory',
function($scope, $filter, DataFactory) {

  var dataQ = DataFactory.getData(function(results) {
    $scope.data = results;
    $scope.filteredData = results;
  });
  $scope.currentRow = null;
  $scope.click = function(row) {
    $scope.currentRow = row;
  };
  $scope.clearFilter = function() {
    $scope.query = null;
    $scope.dt = null;
  };
  $scope.yesterday = function() {
    $scope.dt = moment().subtract(1, 'days').format('YYYY-MM-DD');
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
    formatYear : 'yyyy',
    startingDay : 1
  };

  $scope.format = 'yyyy-MM-dd';

  dataQ.success(function(data) {
    $scope.calories = function() {
      return sum($scope.filteredData, 'calories');
    };
    $scope.fat = function() {
      return sum($scope.filteredData, 'fat');
    };
    $scope.protein = function() {
      return sum($scope.filteredData, 'protein');
    };
  });

  $socialScope = $scope;
  $scope.login = function() {
    FB.login(function(response) {
      checkLoginState();
    }, {
      scope : 'user_friends, email'
    });
  };



  var friendsArray = function() {
    angular.forEach($scope.friends, function(friend) {
      console.log(friend);
    });
  };

  $('body').on('click', ".toggle-modal", function(event) {
    event.preventDefault();
    var $btn = $(this);
    MyFormDialog(this.href, function(data) {
      $("#myAlert").show().find('div').html(JSON.stringify(data));

      if ($btn.hasClass('edit')) {
        $scope.data[$scope.data.indexOf($scope.currentRow)] = data;
      }
      if ($btn.hasClass('add')) {
        $scope.data.push(data);
      }
      if ($btn.hasClass('delete')) {
        $scope.data.splice($scope.data.indexOf($scope.currentRow), 1);
      }
      if ($btn.hasClass('quickadd')) {
        $scope.data.push(data);
      }
      $scope.$apply();

    });
  });

}]);

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    $socialScope.status = response;
    if (response.status === 'connected') {
      FB.api('/me', function(response) {
        $socialScope.me = response;
        $socialScope.$apply();
        console.log(response);
      });
      FB.api('/me/taggable_friends', function(response) {
        $socialScope.friends = response;
        $socialScope.$apply();
        console.log(response);
      });
    }
  });
}

function prepareChartData(data, field) {
  var chartData = {
    values : [],
    xAxis : []
  };

  $.each(data, function(index, element) {
    chartData.values.push(parseInt(element[field]));
    chartData.xAxis.push(element['dateTime'].slice(0, 10));
  });
  return chartData;
}

function averageChartData(data, field) {
  var chartArray = [];
  var total = sum(data, field);
  var average = Math.round(total / (data.length));

  $.each(data, function(index, element) {
    chartArray.push(average);
  });

  return chartArray;
}

function sum(data, field) {
  var total = 0;
  $.each(data, function(i, el) {
    total += +el[field];
  });
  return total;
}

/* then: callback when the form is submitted */
function MyFormDialog(url, then) {
  $("#myModal").modal("show");
  $.get(url + "&format=plain", function(data) {
    $mContent.html(data);
    $mContent.find('form').on('submit', function(e) {
      e.preventDefault();
      $("#myModal").modal("hide");
      $.post(this.action + '&format=json', $(this).serialize(), function(data) {
        then(data);
      }, 'json');
    });
  });
}

$(function() {
  $(".menu-diet-control").addClass("active");
  $mContent = $("#myModal .modal-content");
  var defaultContent = $mContent.html();
  $('#myModal').on('hidden.bs.modal', function(e) {
    $mContent.html(defaultContent);
  });

  $('.alert .close').on('click', function(e) {
    $(this).closest('.alert').slideUp();
  });
});

$('.typeahead').typeahead({
  hint : true,
  highlight : true
}, {
  displayKey : 'name',
  source : function(query, callback) {
    $.getJSON('?action=search&format=json&query=' + query, function(data) {
      callback(data);
    });
  }
}).on('typeahead:selected', quickAdd).on('typeahead:autocompleted', quickAdd);

function quickAdd($e, datum) {
  MyFormDialog("?action=quickadd&id=" + datum.id);
}

