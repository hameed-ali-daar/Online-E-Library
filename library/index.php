<?php
session_start();
include './DBconnect.php';

if (isset($_SESSION['username'])) {
  // menubar to display when logged in.
  include('./Assets/navbarlogin.php');
} else {
  include('./Assets/navbar.php'); 
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <link rel="stylesheet" href="./Assets/css/main.css">
   <title>Library</title>
</head>
<body>
<!-- Body -->
<!-- Main heading -->
<div class="jumbotron mb-0 bg_image">
  <h1 class="heading display-4 font-weight-bolder text-info shadow-sm">Book Shelf</h1>
  <p class="paragraph  shadow-sm">
    We are all on the same page.
    Worlds of information and imagination.
  </p>
</div>
<!-- Main Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info ">
<div class="container-fluid">
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link active text-white" aria-current="page" >How well does our reading experience work for you?</a>
  </li>
  <li>
    <a class="btn btn-success bg-success">Give us a Feedback</a>
  </li>
</ul>
</div>
</nav>
<!-- Showing data -->
<div class="cantainer my-3">
  <div class="row filter">
  <div class="col-3">
  <form method="post" class="ml-4 mr-0">
      <select name="Category" class="form-control" style="padding-right: 0px; padding-left: 23px;">
         <option value="" selected="selected" disabled >Sort the Category / Filter</option>
         <option value="all">Display All Books</option>
         <option value="Islamic">Islamic Books</option>
         <option value="Science">Science Books</option>
         <option value="Stories">Stories Books</option>
      </select>
    
  </div>
  <div class="col-4">
    <div class="col-3" style="padding-right: 0px; padding-left: 0px;">
    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit" type="submit">Search</button>
    </div>
  </form>
</div>
<!-- php for filter -->
<?php
   if(isset($_POST['submit']))
   {
     $category = $_POST['Category'];
     if ($category == 'all') {
       $sql = "SELECT * FROM books";
     } else {
       $sql = "SELECT * FROM `books` WHERE Category = '$category'";
     }
     $all_books = $conn->query($sql);
     
   } else {
     $sql = "SELECT * FROM books";
     $all_books = $conn->query($sql);
   }
  ?>
  <!-- filter ends -->

</div>
<div class="container my-4">
<div class="row" style="    
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -60px;
        margin-left: -60px;">

<?php
$bor="";
  while($row = mysqli_fetch_assoc($all_books)){?>
  <div class="col-sm-3 my-3">
<div class="card" style="width: 18rem;">
<img src="./books/bImages/<?php echo $row['bImage']; ?>" alt="<?php echo $row['bImage']; ?>" style="width: 100%; height: 280px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["bName"]; ?></h5>
    <h5 class="card-title"><?php echo $row["bAuther"]; ?></h5>
    <p class="card-text"><?php echo $row["bDesc"]; ?></p>
    <form method="post">
      <input name="borrow" type="submit" class="btn btn-success" style="width: 15.5rem;" />
      <!-- notice -->
    <span><?php $bor;?></span>
   </form>
  </div>
  </div>
  </div>
  <?php

}
?>
</div>
</div>
<!-- Book borrow function -->
<?php
   if(isset($_POST['borrow']))
   {
    if (isset($_SESSION['username'])) {
      // menubar to display when logged in.
       echo"<script>
       window.location.href='user/requestBook.php';
       </script>";
    } else {
      echo"<script>
      alert('Please Login First to Submit your Request');
      </script>";
    }
  }
  ?>
<!-- end Function -->
<!-- Footer -->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; T-Xpert 2023 solutions, All rights reserved.</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use src="#bootstrap"/></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Policy</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Terms & Conditions</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About Us</a></li>
    </ul>
  </footer>
</div>


<!-- Scripts CDN's -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>