<!DOCTYPE html>
<html lang="en">
<head>
  <title>SUNY Fitness Tracking App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link href="../css/admin/admin.css" rel="stylesheet">
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
            <li class="active"><a href="../dashboard.php">Dashboard</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">New Exercise List</h1>
          &nbsp;
          <div>
            <button type="submit" class="btn btn-success pull-right">Add Exercise</button>
          </div>
          <div class="row">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Sets</th>
                      <th>Repetitions</th>
                      <th>Rest Time</th>
                      <th>Weight</th>
                      <th>Duration</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Endurance</td>
                      <td>Lorem Ipsum</td>
                      <td>3</td>
                      <td>15</td>
                      <td>15</td>
                      <td>45</td>
                      <td>2</td>
                      <td>
                        <button type="submit" class="btn btn-primary">
                          <i class="glyphicon glyphicon-pencil icon-white"></i> 
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="glyphicon glyphicon-remove icon-white"></i> 
                        </button>
                      </td>
                    </tr>

                    <tr>
                      <td>1</td>
                      <td>Endurance</td>
                      <td>Lorem Ipsum</td>
                      <td>3</td>
                      <td>15</td>
                      <td>15</td>
                      <td>45</td>
                      <td>2</td>
                      <td>
                        <button type="submit" class="btn btn-primary">
                          <i class="glyphicon glyphicon-pencil icon-white"></i> 
                        </button>
                        <button type="submit" class="btn btn-primary">
                          <i class="glyphicon glyphicon-remove icon-white"></i> 
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            &nbsp;

          </div>
          &nbsp;

          <div class="row">
            <form class="form-horizontal">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group">
                  <label for="category" class="control-label col-xs-3">Category</label>
                  <div class="col-xs-8">
                    <select class="form-control">
                      <option>Endurance</option>
                      <option>Strength</option>
                      <option>Balance</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="control-label col-xs-3">Name</label>
                  <div class="col-xs-8">
                    <select class="form-control">
                      <option>Ex1</option>
                      <option>Ex2</option>
                      <option>Ex3</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="start-date" class="control-label col-xs-3">Start Date</label>
                  <div class="col-xs-8">
                    <input type="date" class="form-control" id="start-date" placeholder="Insert start date">
                  </div>
                </div>
                <div class="form-group">
                  <label for="end-date" class="control-label col-xs-3">End Date</label>
                  <div class="col-xs-8">
                    <input type="date" class="form-control" id="end-date" placeholder="Insert end date">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="control-label col-xs-3">Description</label>
                  <div class="col-xs-8">
                    <textarea class="form-control" rows="3"></textarea>
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
