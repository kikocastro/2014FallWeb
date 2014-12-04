      <header>
        <div class="container">
          <h1>Fitness Tracker - Food Type</h1>
        </div>
      </header>

      <div class="container content" ng-app = 'app' ng-controller='IndexCtrl'>
        <div class=" col-md-1 col-md-offset-5 pull-right">
          <a class="btn btn-primary toggle-modal add" data-target="#myModal" href="?action=create">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <img src="../content/images/wait.gif" />
              </div>
            </div>
          </div>
        </div>
        
        <!-- Alert -->
        <div class="alert alert-success initialy-hidden" id="myAlert">
          <button type="button" class="close" >
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <div>
            Excelent Job. Your food type has been recorded
          </div>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="row in data | orderBy:'name'">
                  <td>{{row.name}}</td>
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
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js"></script>
    <script type="text/javascript">
      var $mContent;
      var app = angular.module('app', [])
      .controller('IndexCtrl', function($scope, $http){
        $scope.currentRow = null;
        $scope.click = function(row){
          $scope.currentRow = row;
        }

        $http.get('?format=json')
        .success(function(data){
          $scope.data = data;
        });

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

      });

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

