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

   <section class="menu" id="menu">
      <section class="gallery" id="gallery">

         <div class="heading">
            <span>our gallery</span>
            <h3>our untold stories</h3>
         </div>

         <div class="gallery-container">

            <a href="images/food-galler-img-1.jpg" class="box">

               <img src="images/food-galler-img-1.jpg" alt="">
               <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>

            <a href="images/food-galler-img-2.jpg" class="box">
               <img src="images/food-galler-img-2.jpg" alt="">
               <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/food-galler-img-3.jpg" class="box">
               <img src="images/food-galler-img-3.jpg" alt="">
               <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>

            <a href="images/food-galler-img-4.jpg" class="box">
               <img src="images/food-galler-img-4.jpg" alt="">
               <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>

            <a href="images/food-galler-img-5.jpg" class="box">
               <img src="images/food-galler-img-5.jpg" alt="">
               <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>

            <a href="images/food-galler-img-6.jpg" class="box">
               <img src="images/food-galler-img-6.jpg" alt="">
               <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>

         </div>

      </section>
      
      <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script>
      lightGallery(document.querySelector('.gallery .gallery-container'));
   </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
</body>
</html>