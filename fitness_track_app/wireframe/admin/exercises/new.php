<!DOCTYPE html>
<html lang="en">
<head>
  <title>SUNY Fitness Tracking</title>
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
          <a class="navbar-brand" href="#">Suny Fitness Track App</a>
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
          <h1 class="page-header">New Exercise</h1>

          <div class="row">
            <div class="bs-example">
              <form class="form-horizontal">
                <div class="col-sm-6 col-sm-offset-2">

                  <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3">Name</label>
                    <div class="col-xs-8">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3">Category</label>
                    <div class="col-xs-8">
                      <select class="form-control">
                      <option>Endurance</option>
                      <option>Strength</option>
                      <option>Balance</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-3">Description</label>
                    <div class="col-xs-8">
                      <textarea class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-3">Upload Image</label>
                    <div class="col-xs-8">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Image">
                    </div>
                  </div>
                  &nbsp;
                  <div class="form-group">
                    <div class="col-xs-offset-6 col-xs-8">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn">Cancel</button>
                    </div>
                  </div>
                </div>
              </form>
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
