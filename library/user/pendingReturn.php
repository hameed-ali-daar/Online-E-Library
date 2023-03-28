<?php
include '../DBconnect.php';
session_start();



$sql = "SELECT * FROM `book_request`";
$result = mysqli_query($conn, $sql);

$row = (mysqli_fetch_array($result));

$uName = $row['uName'];

$sqls = "SELECT * FROM `book_request` WHERE uName = '{$_SESSION['username']}'";
$results = mysqli_query($conn, $sqls);

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>

   
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="/Assets/js/main.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
            <a class="navbar-brand" href="#">
                <img src="../Assets/images/e_Library (s1).png" alt="LOGO">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
        <li class="dropdown">
                <a href="../loginP/logOut.php" class="dropdown-toggle mx-3" data-toggle="dropdown"> Log Out<b class="fa fa-power-off" style="margin-left:10px;"></b></a>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="userDashboard.php" data-toggle="collapse"><i class="fa fa-fw fa-book"></i> Main Dashboard </a> 
                </li>
                <li>
                    <a href="RequestBook.php" data-toggle="collapse"><i class="fa fa-fw fa-plus"></i> Request new Book</a> 
                </li>
                <li>
                    <a href="requestStatus.php" data-toggle="collapse"><i class="fa fa-fw fa-link"></i> Status of Request </a> 
                </li>
                <li>
                    <a href="pendingReturn.php" data-toggle="collapse" style="background-color:#7acbcd; color:white;"><i class="fa fa-fw fa-clock-o" style="background-color:#7acbcd; color:white;"></i>  Pending to return </i></a>
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
                    <h1>Check Your Request Status</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <div class="container-fluid">
      <div class="row">
      <div class="col-6 " style="width: 90%; margin-left:40px;">
      <table class="table table-bordered">
        <thead>
            <tr>
                <th >SR</th>
                <th>User Name</th>
                <th>Book Name</th>
                <th>Email Address</th>
                <th>Status</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $sr="1";
              while($info = (mysqli_fetch_array($results))){
                    ?>
            <tr">
            <td><?php echo $sr++ ?></td>
            <td><?php echo $info['uName']?></td>
            <td><?php echo $info['bName']?></td>
            <td><?php echo $info['uMail']?></td>
            <td><?php echo $info['rStatus'] ?></td>
        </tr>   
    <?php } ?>
      </div>
        <div class="alert alert-warning alert-dismissible mt-2" style="margin-top:1%;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Note !</strong> Status shows that your request Approved or not....
        </div>
      </div>
    </div>
</div><!-- /#wrapper -->

</body>
</html>
