<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
   header("location: login.php");
}
?>

<?php

session_start();
$loggedin = false;
if (isset($_SESSION['loggedin'])) {
   $loggedin = true;
} else {
   $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Patel's Dryfruit and Masala</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="shortcut icon" type="x-icon" href="images\icon.ico">

</head>

<body>

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
         <?php
         if ($loggedin == true) {
         ?>
            <a href="profile.php"><?php echo ($_SESSION['loguname']); ?></a>;
         <?php
         } else {
         ?>
            <a href="Signin.php">Login</a>;
         <?php
         }
         ?>
         <a href="cart.php">Cart</a>
         <?php
         if ($loggedin == true) { ?>
            <a href="logout.php">Log out</a>
         <?php }
         ?>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

   <section class="order" id="order">

      <div class="heading">
         <span>order now</span>
         <h3>fast home delivery</h3>
      </div>

      <form action="">
         <div class="box-container">
            <div class="box">
               <div class="inputBox">
                  <span>full name</span>
                  <input type="text" placeholder="enter your name" name="name">
               </div>
               <div class="inputBox">
                  <span>Apartment number/wing</span>
                  <input type="text" placeholder="enter your apt. Number/wing" name="aptnum">
               </div>
               <div class="inputBox">
                  <span>Landmark</span>
                  <input type="text" placeholder="enter your landmark" name="landmark">
               </div>
               <div class="inputBox">
                  <span>Village</span>
                  <input type="text" placeholder="enter your village" name="village">
               </div>

            </div>
            <div class="box">
               <div class="inputBox">
                  <span>Contact number</span>
                  <input type="number" placeholder="enter your number" name="cnum">
               </div>
               <div class="inputBox">
                  <span>Street/Apt. Name</span>
                  <input type="text" placeholder="enter your street" name="aptname">
               </div>
               <div class="inputBox">
                  <span>City</span>
                  <input type="text" placeholder="enter your city" name="city">
               </div>
               <div class="inputBox">
                  <span>State</span>
                  <input type="text" placeholder="enter your state" name="state">
               </div>
            </div>
         </div>
         <input type="submit" value="order now" class="btn">
      </form>

   </section>

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script>
      lightGallery(document.querySelector('.gallery .gallery-container'));
   </script>

</body>

</html>