<?php
include 'partials/datacon.php';
session_start();
$invaliduser = false;
$invalidadmin = false;
$passworderr = false;
$showalert = false;
$login = false;
$existalert = false;
$getotp = false;
if (isset($_POST['getotp'])) {
  if (strlen($_POST['regpass']) >= 6) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $regpass = $_POST["regpass"];

    // $existssql = "select * from tbluser where username = '$username'";
    // $existresult = mysqli_query($conn, $existssql);
    // $numrows = mysqli_num_rows($existresult);
    // if ($numrows > 0) {
    //   $exists = true;
    // } 
    // else {
    //   $exists = false;
    // }

    // $emailquery = "select * from tbluser where email = '$email'";
    //   $emailresult = mysqli_query($conn, $emailquery);
    //   $emailrows = mysqli_num_rows($emailresult);
    //   if($emailrows > 0) {
    //     $exists = true;
    //   }
    //   else {
    //     $exists = false;
    //   }

      $otp = rand(100000,999999);
      $sql = "INSERT INTO `tbluser`(`username`, `email`, `password`, `role`, `otp`, `date`) VALUES ('$username','$email','$regpass','customer','$otp',current_time())";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $getotp = true;
      } 
      else 
      {
        $existalert = true;
      }
  } 
  else 
  {
    $passworderr = true;
  }
}

?>
<?php
$loggedin = false;
if (isset($_POST['Lsub'])) {
  if ($_POST['role'] == "customer") {
    $loguname = $_POST['loguname'];
    $logpass = $_POST['logpass'];
    $query = "SELECT * FROM `tbluser` WHERE role='customer' AND (username='$loguname' AND password='$logpass')";
    $res = mysqli_query($conn, $query);
    $num = mysqli_num_rows($res);
    if ($num >= 1) {
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['loguname'] = $loguname;
      header("location: afterlogin.php");
    } else {
      $invaliduser = true;
    }
  } else if ($_POST['role'] == "admin") {
    $loguname = $_POST['loguname'];
    $logpass = $_POST['logpass'];
    $query = "SELECT * FROM `tbluser` WHERE role='admin' AND (username='$loguname' AND password='$logpass')";
    $res = mysqli_query($conn, $query);
    $num = mysqli_num_rows($res);
    if ($num >= 1) {
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['loguname'] = $loguname;
      header("location: admin\index.php");
    } else {
      $invalidadmin = true;
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta charset="UTF-8">
  <title>Patel's Dryfruit and Masala</title>


  <link rel="stylesheet" href="css/formstyle.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <link rel="shortcut icon" type="x-icon" href="images\icon.ico">
</head>

<body>

  <!-- header section starts     -->

  <section class="header">

    <img src="images\logo.png" class="logo">

    <nav class="navbar">
      <a href="index.php">home</a>
      <a href="Product.php">shop</a>
      <a href="gallery.php">gallery</a>
      <a href="index.php#about">about</a>
      <a href="index.php#food">expertise</a>
      <a href="index.php#blogs">reviews</a>
      <a href="index.php#footer">Contact us</a>
      <a href="Login.php">Login</a>
      <a href="cart.php">Cart</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>



  </section>
  <?php
  if ($showalert == true) {
    echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registered Successful!</strong> Now you can Login!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
  }

  if ($passworderr == true) {
    echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Your password should be contains 6 characters or more</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
  }

  if ($invaliduser == true) {
    echo '
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>User Not Found!</strong>Please Register First!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
  }

  if ($invalidadmin == true) {
    echo '
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Admin Not Found!</strong>Please Contact Admin!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
  }

  // if ($exists == true) {
  //   echo '
  //         <div class="alert alert-warning alert-dismissible fade show" role="alert">
  //         <strong>Username or email already taken!</strong>Select another username or login with email!
  //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  //         </div>
  //       ';
  // }

?>
  <!-- header section ends    -->
  <div class="card">
    <div class="container">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="images/home-slide-1.jpg" alt="">
          <div class="text">
            <span class="text-1">Every new friend is a <br> new adventure</span>
            <span class="text-2">Let's get connected</span>
          </div>
        </div>
        <div class="back">
          <img class="backImg" src="images/home-slide-1.jpg" alt="">
          <div class="text">
            <span class="text-1">Complete miles of journey <br> with one step</span>
            <span class="text-2">Let's get started</span>
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <select style="width: 80px; height: 30px; background-color: #7d2ae8; color: white; font-size: 14px;" name="role">
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                  </select>
                  <label style="color: grey; padding-left: 10px; font-size: 15px;">Select Customer/admin</label>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" placeholder="Enter your username" name="loguname" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter your password" name="logpass" required>
                </div>
                <div class="text"><a href="#">Forgot password?</a></div>
                <div class="button input-box">
                  <input type="submit" value="Submit" name="Lsub">
                </div>
                <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label><br>
                </div>
              </div>
            </form>
          </div>
          <div class="signup-form">
            <div class="title">Signup</div>
            <form method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Enter your username" name="username" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter your password" name="regpass" required>
                </div>
                <div class="button input-box">
                  <input type="submit" value="Get Otp" name="getotp">
                </div>
                <div class="input-box">
                  <i class="fas fa-bookmark"></i>
                  <input type="text" placeholder="Enter OTP" name="getotp">
                </div>
                <div class="button input-box">
                  <input type="submit" value="Register" name="register">
                </div>
                <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

  <!-- custom js file link  -->
  <script src="js/script.js"></script>

  <script>
    lightGallery(document.querySelector('.gallery .gallery-container'));
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>