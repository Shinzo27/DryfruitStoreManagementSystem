<?php
   session_start();

   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
   {
      header("location: login.php");
   }
?>

<?php
    $loggedin = false;
    session_start();
    if($_SESSION['loggedin'] == true)
    {
        $loggedin = true;
    }
    else
    {
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
         <a href="index.php">Home</a>
         <a href="Product.php">shop</a>
         <a href="gallery.php">gallery</a>
         <a href="index.php#about">about</a>
         <a href="index.php#food">expertise</a>
         <a href="index.php#blogs">reviews</a>
         <a href="index.php#footer">Contact us</a>
         <?php
                if($loggedin == true)
                {
                    ?>
                    <a href="profile.php"><?php echo ($_SESSION['loguname']); ?></a>;
                    <?php
                }
                else
                {
                    ?>
                    <a href="Login.php">Login</a>;
                    <?php
                }
         ?>
         <a href="cart.php">Cart</a>
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
                <input type="text" placeholder="enter your name">
             </div>
             <div class="inputBox">
                <span>food name</span>
                <input type="text" placeholder="food you want">
             </div>
             <div class="inputBox">
                <span>order details</span>
                <input type="text" placeholder="specifics with food">
             </div>
             <div class="inputBox">
                <span>your address</span>
                <textarea name="" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
             </div>
          </div>
          <div class="box">
             <div class="inputBox">
                <span>number</span>
                <input type="number" placeholder="enter your number">
             </div>
             <div class="inputBox">
                <span>how much</span>
                <input type="number" placeholder="how many you want">
             </div>
             <div class="inputBox">
                <span>when you want</span>
                <input type="datetime-local">
             </div>
             <div class="inputBox">
                <span>our address</span>
                <iframe class="map"
                   src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d60307.59083109428!2d72.840725!3d19.141651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1642222128240!5m2!1sen!2sin"
                   allowfullscreen="" loading="lazy"></iframe>
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