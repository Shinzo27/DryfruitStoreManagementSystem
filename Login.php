<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Patel's Dryfruit and Masala</title>

  <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
  <link rel="stylesheet" href="css/formstyle.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">


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
            <form action="index.php">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter your password" required>
                </div>
                <div class="text"><a href="#">Forgot password?</a></div>
                <div class="button input-box">
                  <input type="submit" value="Submit">
                </div>
                <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label><br>
                  <label>Click for <a href="admin.php">admin</a></label>
                </div>
              </div>
            </form>
          </div>
          <div class="signup-form">
            <div class="title">Signup</div>
            <form action="#">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter your password" required>
                </div>
                <div class="button input-box">
                  <input type="submit" value="Submit">
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
   
</body>

</html>