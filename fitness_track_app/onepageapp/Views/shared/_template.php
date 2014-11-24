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
						<li>
							<a href="exercises">Exercise</a>
						</li>
						<li>
							<a class='menu-diet-control' href="diet-control">Diet Control</a>
						</li>
						<li>
							<a href="profile">Profile</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		<div class="main-container">
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

		<!-- high charts -->
		<script src="http://code.highcharts.com/highcharts.js"></script>
		<script type="text/javascript" src="../content/js/high_chart_test.js"></script>

		<!-- ajax -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>

		<!-- handlebars -->
		<script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>

	</body>

	</html>
