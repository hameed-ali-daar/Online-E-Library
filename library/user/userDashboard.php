<?php
include '../DBconnect.php';

session_start();

$sqls = "SELECT * FROM tbl_user WHERE username = '{$_SESSION['username']}'";

$results = mysqli_query($conn, $sqls);

$info = mysqli_fetch_array($results);

if ($info === false) {
    echo "Error fetching user info: " . mysqli_error($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Dashboard</title>


   
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<!-- <script src="../Assets/js/jquery.min.js"></script> -->
<!-- <script src="../Assets/js/main.js"></script> -->
<link rel="stylesheet" href="../Assets/css/style.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">
                <img src="../Assets/images/e_Library (s1).png" alt="LOGO">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="../loginP/logOut.php" class="dropdown-toggle mx-3" data-toggle="dropdown">User log Out<b class="fa fa-power-off" style="margin-left:10px;"></b></a>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="userDashboard.php" data-toggle="collapse" style="background-color:#7acbcd; color:white;"><i class="fa fa-fw fa-book"></i> Main Dashboard</a> 
                </li>
                <li>
                    <a href="RequestBook.php" data-toggle="collapse"><i class="fa fa-fw fa-plus"></i> Request new Book</a> 
                </li>
                <li>
                    <a href="RequestStatus.php" data-toggle="collapse"><i class="fa fa-fw fa-link"></i> Status of Request </a> 
                </li>
                <li>
                    <a href="#" data-toggle="collapse"><i class="fa fa-fw fa-clock-o"></i>  Pending to return </i></a>
                </li>
                <li>
                    <a href="investigaciones/favoritas"><i class="fa fa-fw fa-phone"></i>  Contact Admin </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>


    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Welcome to Dashboard</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <div class="container">
      <div class="row">
      <div class="col-6 ">
        <table class="table offset-3">
          <tr>
            <th>Name</th>
            <td><?php echo $_SESSION['username']; ?></td>
          </tr>
          <tr>
            <th>Mail Address</th>
            <td><?php echo $info['email']; ?></td>
          </tr>
          <tr>
            <th>Contact Info</th>
            <td><?php echo $info['contact']; ?></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><input type="password" value="<?php echo $_SESSION['password']; ?>"></td>
          </tr>
        </table>
      <a href="#" class="btn btn-lg btn-primary">Edit your Info</a>
      </div>
        <div class="alert alert-warning alert-dismissible mt-2" style="margin-top:1%;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Note !</strong> Please Check the side navbar for your Operations. & be careful in changing your Credentials
        </div>
      </div>
    </div>
</div><!-- /#wrapper -->

</body>
<!-- Sdns -->

</html>
