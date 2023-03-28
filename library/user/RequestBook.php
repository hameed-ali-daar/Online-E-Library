<?php
include '../DBconnect.php';
session_start();
$sqls = "SELECT * FROM `book_request` WHERE uName = '{$_SESSION['username']}'";
$results = mysqli_query($conn, $sqls);

if(isset($_POST['submit'])) {
    $uName = $_POST['uName'];
    $bName = $_POST['bName'];
    $uMail = $_POST['uMail'];
    $tid = $_POST['tid'];
    $rStatus = $_POST['rStatus'];

    $sql = "INSERT INTO `book_request` (uName, bName, uMail, rStatus, tid) VALUES ('$uName','$bName','$uMail', '$rStatus', '$tid')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '
            <script>
            alert("Your Request has been successfully sent to Librarian for Approval")
            </script>';
    }
}
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
                    <a href="RequestBook.php" data-toggle="collapse" style="background-color:#7acbcd; color:white;"><i class="fa fa-fw fa-plus"></i> Request new Book</a> 
                </li>
                <li>
                    <a href="requestStatus.php" data-toggle="collapse"><i class="fa fa-fw fa-link"></i> Status of Request </a> 
                </li>
                <li>
                    <a href="pendingReturn.php" data-toggle="collapse"><i class="fa fa-fw fa-clock-o"></i>  Pending to return </i></a>
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
                    <h1>Please Add Book Book detail you wants..</h1>
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
      <form method="post">
        <div class="form-group">
            <!-- <label for="uName" class="">User Name</label> -->
            <input type="hidden" name="uName" class="form-control" value="<?php echo $_SESSION['username']?>" placeholder="Please enter your name" required>
        </div>
        <div class="form-group">
            <label for="uMail" class="">User Email</label>
            <input type="email" name="uMail" class="form-control" placeholder="Please enter your Email Address">
            <input type="hidden" name="rStatus"  value="Pending">
        </div>
        <div class="form-group">
            <label for="bName" class="">Book Name</label>
            <select name="bName" id="bName" class="form-control" >
                <option value="1" disabled selected>Please Select your Book Name</option>
                <?php
                $sqlr="SELECT bName FROM books";
                $resultr=mysqli_query($conn,$sqlr);
                while ($row=mysqli_fetch_array($resultr)){
                
                echo "<option value'$row[bName]'>";
                     echo $row['bName'];
                echo "</option>";
                }?>
                </select>
        </div>
        <div class="form-group">
            <label for="tid" class="">Transaction ID:</label>
            <input type="text" name="tid" class="form-control" placeholder="Please enter Payment Transaction ID" required>
            <p class="text-primary bg-danger" style="font-weight: 700; margin-top:10px;margin-bottom:30px;padding:15px 10px; ">⮬ Please sent Payment through Jazz Cash or EasyPaisa at (+92 123 234552) and Enter Transaction id here... &#x2BAD;</p>
        </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-info" >Request to admin</button>
        </div>  
    </form>

      </div>
        <div class="alert alert-warning alert-dismissible mt-2" style="margin-top:1%;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Note !</strong> Please be Sure while Entering your Book Details.....
        </div>
      </div>
    </div>
</div><!-- /#wrapper -->

</body>
</html>
