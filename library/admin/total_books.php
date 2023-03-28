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

        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn, $sql);
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>add book -Admin Dashboard</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="../Assets/css/style.css"></script>
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
                    <a href="total_books.php" data-toggle="collapse" style="background-color:#7acbcd; color:white;"><i class="fa fa-fw fa-book"></i> Total Books </a> 
                </li>
                <li>
                    <a href="Borrowlist.php" data-toggle="collapse"><i class="fa fa-fw fa-book"></i> Borrowed Books </a> 
                </li>
                <li>
                    <a href="requestlist.php" data-toggle="collapse"><i class="fa fa-fw fa-user-plus"></i>  New Requests </a>
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
                    <h1>Here's Your all Books list.You can Update and delete the data.</h1>
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
                <th>SR</th>
                <th>Image</th>
                <th>Name</th>
                <th>Auth. Name</th>
                <th>Description</th>
                <th>Update Data</th>
            </tr>
          </thead>
          <tbody>
            <?php $sr="1"; ?>
        <?php while ($info = mysqli_fetch_assoc($result)) {
            ?>
        <tr class="center">
            <td><?php echo $sr++ ?></td>
            <td><img style="vertical-align: middle; width: 45px !important;" src="../books/bImages/<?php echo $info['bImage']; ?>" alt="<?php echo $info['bImage']; ?>"></td>
            <td><?php echo $info['bName']?></td>
            <td><?php echo $info['bAuther']?></td>
            <td><?php echo $info['bDesc']?></td>
            <td>
              <a href="upateBook.php?bid=<?php echo $info['bid'];?>" class="btn btn-info">Edit</a>
              <a href="deletebook.php?bid=<?php echo $info['bid']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>   
        <?php } ?>

        </tbody>
          <tfooter>

          </tfooter>
        </table>
      </div>
        <div class="alert alert-info alert-dismissible mt-2" style="margin-top:1%;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Note !</strong> Please be sure What you edit....
        </div>
      </div>
    </div>
    
</div><!-- /#wrapper -->

</body>
</html>
