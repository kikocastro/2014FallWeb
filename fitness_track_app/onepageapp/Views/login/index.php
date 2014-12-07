<div class="container" ng-controller='LoginCtrl'>

  <div class="row">
    <div class="col-lg-12 text-center">
      <h2 class="section-heading">Welcome! Please login</h2>
    </div>
  </div>

  <div class="container content" ng-app = 'app' ng-controller='IndexCtrl'>
    <div class="row spacer-40">


      <div class="col-sm-12" ng-controller="ChartCtrl" >
        <div class="text-center">
          <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
        </fb:login-button>
        <div id="status">
        </div>

       <!--  <div class="well" ng-controller="social" >
          <img src="http://graph.facebook.com/{{me.id}}/picture" align="left" />
          <b>{{me.name}}</b><br>
          {{me.email}}
      </div>       -->
      </div>
    </div>
  </div>

</div>
</div>

</div>

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>

<!-- <script type="text/javascript">
  var $socialScope = null;
  app.controller('social', function($scope){
    $socialScope = $scope;
    $socialScope.$apply();
  });
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      $socialScope.status = response;
      if (response.status === 'connected') {
        FB.api('/me', function(response) {
          $socialScope.me = response;
          $socialScope.$apply();
          console.log("response");
        });
      }
    });
  }

FB.api('/me', function(response) {
      console.log('Successfuuuuuul login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });

</script> -->