<!-- SignIn Model -->
<!-- Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul class="nav nav-pills nav-justified mb-3 " id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link bg-success text-white mx-1" href="./loginP/admin_login.php" data-mdb-toggle="pill" href="#pills-login" role="tab"
            aria-controls="pills-login" aria-selected="true">Login as Admin / Librarian</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link bg-info text-white mx-3" href="./loginP/login.php" data-mdb-toggle="pill" href="#pills-register" role="tab"
            aria-controls="pills-register" aria-selected="false">Login as User / Student </a>
        </li>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<!-- Navbar menu starts -->

    <nav class="navbar navbar-expand-lg navbar-light bg-info ">
  <div class="container-fluid">
   <a class="navbar-brand" href="#">
    <img src="./Assets/images/homelogo.png" style="width: 151px;" alt="LOGO">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white" href="#">Contact Us</a>
        </li>
      </ul>
      <!-- Register ot sign in -->
      <div class="ml-auto">
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- check for admin and user -->
          <?php
                $role  = mysqli_query($conn,"SELECT * FROM tbl_user WHERE username='".$_SESSION["username"]."'");
                $a=(mysqli_fetch_assoc($role));
                // $role= $_SESSION['role'];
                // print_r($a);
                $role1= "$a[role]";

                // check if is admin or user
                switch ($role1) {
                  case 'admin':
                      $_SESSION['role'] = 'admin';
                      // redirect to admin
                      echo"<a href='../library/admin/admin.php' class='nav-link text-white'> Dashboard </a>";
                      break;
                  case 'user':
                      $_SESSION['role'] = 'user';
                      // redirect to client
                      echo"<a href='../library/user/userDashboard.php' class='nav-link text-white'> Dashboard </a>";
                      break;
                  }
          ?>

          <!-- End user -->
        </li>
      </ul>
      </div>
    </div>
  </div>
</nav>
