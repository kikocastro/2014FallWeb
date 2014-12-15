<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SUNY Fitness Tracking APP</title>

	<!-- Bootstrap Core CSS -->
	<link href="../content/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../content/css/style.css" rel="stylesheet">

	<!-- jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<!-- Custom Fonts -->
	<link href="../content/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body id="page-top" class="index">


 <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '318935921632995',
              xfbml      : true,
              cookie     : true,
              version    : 'v2.0'
            });
            checkLoginState();
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
    </script>


		<!-- <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
  	console.log('statusChangeCallback');
  	console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.

      redirectLogin();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
      'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
      'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
  	FB.getLoginStatus(function(response) {
  		statusChangeCallback(response);
  	});
  }

  window.fbAsyncInit = function() {
  	FB.init({
  		appId      : '318935921632995',
    cookie     : true,  // enable cookies to allow the server to access
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
  	statusChangeCallback(response);
  });

};

  // Load the SDK asynchronously
  (function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
  	js.src = "//connect.facebook.net/en_US/sdk.js";
  	fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function redirectLogin() {
  	console.log('Welcome!  Fetching your information.... ');
  	FB.api('/me', function(response) {
  		console.log('Successful login for: ' + response.name);
  		document.getElementById('status').innerHTML =
  		'Thanks for logging in, ' + response.name + '!';
  		window.location.href = ("../Controllers/diet-control");
  	});
  }
</script> -->



<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">SUNY Fitness Tracking APP</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
<!-- 						<li class='menu-exercises'>
							<a href="exercises">Exercise</a>
						</li> -->
						<li class='menu-diet-control'>
							<a href="diet-control">Diet Control</a>
						</li>
						<li class='menu-profile'>
							<a href="profile">Profile</a>
						</li>
						<!-- <li id='#menu-logout'>
							<fb:login-button autologoutlink="true" perms="user_likes" size="large"></fb:login-button>
						</li> -->
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		<div class="main-container" ng-app="app">
			<? include __DIR__ . '/../' . $view; ?>
		</div>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<span class="copyright">Copyright &copy; SUNY Fitness Tracking App 2014</span>
					</div>
				</div>
			</div>
		</footer>

		<!-- Bootstrap Core JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="../content/js/classie.js"></script>
		<script src="../content/js/cbpAnimatedHeader.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="../content/js/main.js"></script>

		<!-- ajax -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		<script type="text/javascript">
			$('body').on('click', "#menu-logout", function(event){
				FB.logout(function(response) {
	  			// user is now logged out
	  			FB.Event.subscribe("auth.logout", function() {
	  				window.location.href = ("../Controllers/login");
	  				console.log("Logout");
	  			});
	  		});

			});
		</script>
	</body>

	</html>
