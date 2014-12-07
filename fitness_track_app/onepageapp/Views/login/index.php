<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="section-heading">Welcome! Please login</h2>
  </div>
</div>

<div class="container content" ng-app = 'app' ng-controller='IndexCtrl'>
  <div class="row spacer-40">


    <div class="col-sm-12" ng-controller="ChartCtrl" >
      <div class="row spacer-40">
        <div class="text-center">
        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
       </fb:login-button>
     </div>
   </div>
 </div>

</div>

</div>