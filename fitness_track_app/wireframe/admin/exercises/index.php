<!DOCTYPE html>
<html lang="en">
<head>
  <title>SUNY Fitness Trackinging</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link href="../../css/admin/admin.css" rel="stylesheet">
</head>

<body>
  <div>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <!-- <span class="icon-bar"></span> -->
          </button>
          <a class="navbar-brand" href="#">Suny Fitness Tracking App - Admin Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="../exercises-categories">Exercise Categories</a></li>
            <li class="active"><a href="">Exercises</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Exercises List</h1>
          <div class="row placeholders">
            <div class="col-lg-3 col-lg-offset-9">
              <div class="input-group top-bottom-margin">
                <span class="input-group-btn">
                  <a class="btn btn-success" type="button" href="new.php">New Exercise</a>
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div>

          <div class="table-responsive">
           <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Endurance</td>
                <td>Lorem Ipsum</td>
                <td>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-eye-open icon-white"></i> 
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-pencil icon-white"></i> 
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-remove icon-white"></i> 
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Strength</td>
                <td>amet consectetur</td>
                <td>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-eye-open icon-white"></i> 
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-pencil icon-white"></i> 
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-remove icon-white"></i> 
                  </button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Balance</td>
                <td>amet consectetur</td>
                <td>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-eye-open icon-white"></i> 
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-pencil icon-white"></i> 
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-remove icon-white"></i> 
                  </button>
                </td>
              </tr>

            </table>  
          </div>
        </div>
      </div>
    </div>


    <footer>
     <div class="container">
      <p>
       &copy; Copyright
     </p>
   </div>
 </footer>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
