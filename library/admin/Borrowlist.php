<?php
include '../DBconnect.php';


session_start();

if(empty($_SESSION['username']))
{
	header('location:../index.php');
}
if(!empty($_SESSION['username']))
{
$username = $_SESSION['username'];
}

$sql = "SELECT * FROM book_request WHERE `rStatus`='Approved'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

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
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="admin.php" data-toggle="collapse"><i class="fa fa-fw fa-user"></i>Main Dashboard</a> 
                </li>
                <li>
                    <a href="addBook.php" data-toggle="collapse"><i class="fa fa-fw fa-plus"></i> Add new Book</a> 
                </li>
                <li>
                    <a href="total_books.php" data-toggle="collapse"><i class="fa fa-fw fa-book"></i> Total Books </a> 
                </li>
                <li>
                    <a href="borrowlist.php" data-toggle="collapse" style="background-color:#7acbcd; color:white;"><i class="fa fa-fw fa-book"></i> Borrowed Books </a> 
                </li>
                <li>
                    <a href="requestlist.php" data-toggle="collapse"><i class="fa fa-fw fa-book"></i>  New Requests </a>
                </li>
                <li>
                    <a href="userdata.php" data-toggle="collapse"><i class="fa fa-fw fa-users"></i>  All Users </a>
                </li>
                <li>
                    <a href="investigaciones/favoritas"><i class="fa fa-fw fa-phone"></i>  Contact Us </a>
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
                    <h1>All Approved / Borrowed Books Data is Here</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <form action="./Requestlist.php" method="POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 " style="width: 90%; margin-left:40px;">
                    <input type="hidden" name="req_Id" value="<?php echo $row['req_id']; ?>">
      <table class="table table-bordered">
        <thead>
            <tr>
                <th >SR</th>
                <th>User Name</th>
                <th>Book Name</th>
                <th>Email Address</th>
                <th>Duration</th>
            </tr>
          </thead>
          <tbody>
            <?php $sr="1"; ?>
        <?php while ($row = mysqli_fetch_array($result)) {
            ?>
        <tr class="center">
            <td><?php echo $sr++ ?></td>
            <td><?php echo $row['uName']?></td>
            <td><?php echo $row['bName']?></td>
            <td><?php echo $row['uMail']?></td>
            <td class="text-center">
            Initial Date :(<?php echo $row['rDate']?>) <br> Return Date :(<?php echo $row['finalDate']?>) 
            </td>
        </tr>   

        <?php       
     } 
      ?>
        </tbody>
        </table>
      </div>
      <?php
      if (isset($_GET['req_id'])) {
        $req_id = mysqli_real_escape_string($conn, $_GET['req_id']);
              
        $sql = "SELECT * FROM book_request WHERE req_id = '$req_id'";
        $result = mysqli_query($conn, $sql);
        
        if ($row = mysqli_fetch_array($result)) {
            $uName = $row['uName'];
            $rDate = date('Y/m/d');
            $rStatus = '';
    
            $sql = "UPDATE `book_request` SET `rStatus` = 'Approved' WHERE `req_id` = '$req_id' AND `uName`='$uName'";
            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                echo " <div>
                <strong style='margin-left:30%;'>Success </strong> Request approved successfully...
                </div>";
            } else {
                echo "Error updating request: " . mysqli_error($conn);
            }
        } else {
            echo "Request not found";
        }
    }
      ?>
                </form>
    
        <div class="alert alert-info alert-dismissible mt-2" style="margin-top:1%;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Note !</strong> You can remind user when to return Book ... .. .
        </div>
      </div>
    </div>
</div>
<!-- /#wrapper -->

</body>
</html>
