<?php

include '../DBconnect.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
       integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
          .gradient-custom-2 {
          /* fallback for old browsers */
          background: hsla(188, 78%, 41%, 1);

          filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#17A2B8", endColorstr="#448ADB", GradientType=1 );
          }

          @media (min-width: 768px) {
          .gradient-form {
          height: 100vh !important;
          }
          }
          @media (min-width: 769px) {
          .gradient-custom-2 {
          border-top-right-radius: .3rem;
          border-bottom-right-radius: .3rem;
          }
          }
    </style>
   
   <title>Login</title>
</head>
<body>
<!-- Body -->
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="../Assets/images/e_Library (s1).png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Your Own Library</h4>
                </div>

                <form method="post">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="username" name="username" id="username" class="form-control"
                      placeholder="Please enter  Your User name" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit" type="submit">Log
                      in</button>
                    <a class="text-muted" href="../loginP/Reset.php">Forgot password?</a>
                  </div>
                  <?php
                  if(isset($_POST['submit']))
                  {
                    $username = $_POST['username'];
                    $password = $_POST['password'];



                  $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
                  $result=mysqli_query($conn, $sql);

                  $row = mysqli_fetch_array($result);

                  //Varify User credentials

                  if(is_array($row))
                  {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    
                    header("location:../admin/admin.php");
                  }
                  else
                  {
                    echo"<span class='text-white bg-danger'> Invalid username or password...</span>";
                  }
                  }
                  ?>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Nothing is pleasanter than exploring a<b><i> " Library "</i></b>.</h4>
                <p class="small mb-0" id="changing-text">As gateways to knowledge and culture, libraries play a fundamental role in society. 
                  The resources and services they offer create opportunities for learning, support literacy and education, 
                  and help shape the new ideas and perspectives that are central to a creative and innovative society.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
       integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
       crossorigin="anonymous"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
       integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUadn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
       crossorigin="anonymous"></script>
   
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
       integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
       crossorigin="anonymous"></script>
</body>
</html>