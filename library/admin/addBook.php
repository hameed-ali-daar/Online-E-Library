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

if(isset($_POST['submit']))
{
    $bName = $_POST['bName'];
    $Category = $_POST['Category'];
    $bAuther = $_POST['bAuther'];
    $bDesc = $_POST['bDesc'];
    $bImage = $_FILES['bImage']['name'];
    $target = "../books/bImages/" . basename($bImage);

    if (move_uploaded_file($_FILES['bImage']['tmp_name'], $target))
    {
        $sql = "INSERT INTO `books` (bImage, Category, bName, bAuther,bDesc) 
        VALUES ('$bImage','$Category','$bName','$bAuther','$bDesc');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
        echo '
        <script>
        alert("Your Book has been added to the list")
        </script>
        ';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>add book -Admin Dashboard</title>

   
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
                    <a href="addBook.php" data-toggle="collapse" style="background-color:#7acbcd; color:white;"><i class="fa fa-fw fa-plus"></i> Add new Book</a> 
                </li>
                <li>
                    <a href="total_books.php" data-toggle="collapse"><i class="fa fa-fw fa-book"></i> Total Books </a> 
                </li>
                <li>
                    <a href="Borrowlist.php" data-toggle="collapse"><i class="fa fa-fw fa-book"></i> Borrowed Books </a> 
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
                    <h1>Please Add new Book by inserting data.</h1>
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
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="bName" class="">Book Name</label>
            <input type="text" name="bName" class="form-control">
        </div>
        <label for="bName" class="">Book Category</label>
        <div class="form-group">
            <select name="Category" class="form-control" style="padding-right: 0px; padding-left: 23px;">
         <option value="" selected="selected" disabled >Sort the Category / Filter</option>
         <option value="Islamic">Islamic Books</option>
         <option value="Science">Science Books</option>
         <option value="Stories">Stories Books</option>
      </select>
        </div>
        <div class="form-group">
            <label for="bAuther" class="">Auther Name</label>
            <input type="text" name="bAuther" class="form-control">
        </div>
        <div class="form-group">
            <label for="bDesc" class="">Book Description</label>
            <textarea type="text" name="bDesc" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="file" class="">Please Select Your Book Cover Image</label>
            <input type="file" name="bImage" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Add to List</button>
      </form>
      </div>
        <div class="alert alert-info alert-dismissible mt-2" style="margin-top:1%;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Note !</strong> Please be Sure while Entering your Book Details.....
        </div>
      </div>
    </div>
</div><!-- /#wrapper -->

</body>
</html>
