<?php
include 'partials/datacon.php';
session_start();
$loggedin = false;
if (isset($_SESSION['loggedin'])) {
   $loggedin = true;
}

$success = false;
$login = true;
$exists = false;

if (isset($_POST['addtocart'])) {
   if (isset($_SESSION['uid'])) {
      $uid = $_SESSION['uid'];
      $pname = $_POST['pname'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $packingtype = $_POST['weight'];

      $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `tblcart` WHERE pname = '$pname' AND uid = '$uid'") or die('query failed');

      if (mysqli_num_rows($check_cart_numbers) > 0) {
         $exists = true;
      } else {
         $result = mysqli_query($conn, "INSERT INTO `tblcart`(uid, pname, price, quantity, date) VALUES('$uid', '$pname', '$price', '$quantity', current_time())") or die('query failed');
         if ($result) {
            $success = true;
         }
      }
   } else {
      $login = false;
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Patel's Dryfruit and Masala</title>
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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
         <a href="showorder.php">Orders</a>
         <?php
         if ($loggedin == true) { ?>
            <a href="logout.php">Log out</a>
         <?php }
         ?>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

   <?php
   if ($success == true) {
      echo '<div class="alert alert-success alert-dismissible fade show" style="font-size: 15px;" role="alert">
                  <strong>Product Added Successfully</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
   }

   if ($login == false) {
      echo '<div class="alert alert-warning alert-dismissible fade show" style="font-size: 15px;" role="alert">
                  <strong>You are not logged in!</strong>Log in first!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
   }

   if ($exists == true) {
      echo '<div class="alert alert-warning alert-dismissible fade show" style="font-size: 12px;" role="alert">
                  <strong>Product Already Added</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
   }
   ?>

   <section class="menu" id="dryfruit">

      <div class="heading">
         <span>list</span>
         <h3>Our products</h3>
      </div>
      <div class="swiper menu-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <h3 class="title">Dryfruits</h3>
               <div class="alert alert-warning" style="font-size: 15px;" role="alert">
                  Only 250gms packing available on dryfruits! If want more contact admin!
               </div>
               <br>
               <div class="box-container">
                  <?php
                  $query = "select * from tblProduct where category='dryfruit'";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) :
                  ?> <div class="box">
                        <div class="info">
                           <h3><?php echo $row['pname']; ?></h3>
                           <br>
                           <form method="post">
                              <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
                              <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                              <input type="text" size="8" placeholder="quantity" name="quantity" style="height: 45px; font-size: 18px;" required>
                              <select name="weight" style="width: 70px; height: 28px; font-size: 15px;" required>
                                 <option value="250gm">250gms</option>
                              </select><br><br>
                              <input class="btn" type="submit" name="addtocart" value="Add To Cart">
                           </form>
                           <br>
                        </div>
                        <div class="img"><img src="admin/<?php echo $row['pimage']; ?>" style="float: right; width: 100px; height: 100px;" required>
                        </div>
                        <div class="price">₹<?php echo $row['price']; ?>/kg</div>
                     </div>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="menu" id="driedfruit">
      <div class="swiper menu-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <h3 class="title">Driedfruits</h3>
               <div class="alert alert-warning" style="font-size: 15px;" role="alert">
                  Only 250gms packing available on driedfruits! If want more contact admin!
               </div>
               <br>
               <div class="box-container">
                  <?php
                  include 'partials/datacon.php';
                  $query = "select * from tblProduct where category='driedfruit'";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
                     <div class="box">
                        <div class="info">
                           <h3><?php echo $row['pname']; ?></h3>
                           <br>
                           <form method="post">
                              <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
                              <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                              <input type="text" size="8" name="quantity" placeholder="quantity" style="height: 45px; font-size: 18px;" required>
                              <select name="weight" style="width: 70px; height: 28px; font-size: 15px;" required>
                                 <option value="250gm">250gms</option>
                              </select><br><br>
                              <input class="btn" type="submit" name="addtocart" value="Add To Cart">
                           </form>
                           <br>
                        </div>
                        <div class="img"><img src="admin/<?php echo $row['pimage'] ?>" style="float: right; width: 100px; height: 100px;">
                        </div>
                        <div class="price">₹<?php echo $row['price']; ?>/kg</div>
                     </div>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="menu" id="namkeen">
      <div class="swiper menu-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <h3 class="title">Namkeens</h3>
               <div class="box-container">
                  <?php
                  include 'partials/datacon.php';
                  $query = "select * from tblProduct where category='namkeen'";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
                     <div class="box">
                        <div class="info">
                           <h3><?php echo $row['pname']; ?></h3>
                           <br>
                           <form method="post">
                              <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
                              <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                              <input type="text" size="8" name="quantity" placeholder="quantity" style="height: 45px; font-size: 18px;" required>
                              <select name="weight" style="width: 70px; height: 28px; font-size: 15px;" required>
                                 <option value="pkt">pkt</option>
                              </select><br><br>
                              <input class="btn" type="submit" name="addtocart" value="Add To Cart">
                           </form>
                        </div>
                        <div class="img"><img src="admin/<?php echo $row['pimage'] ?>" style="float: right; width: 100px; height: 100px;">
                        </div>
                        <div class="price">₹<?php echo $row['price']; ?>/pkt</div>
                     </div>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="menu" id="Masala">
      <div class="swiper menu-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <h3 class="title">Masala</h3>
               <div class="alert alert-warning" style="font-size: 15px;" role="alert">
                  We have all masala of bharat masala that is known in whole surat!
               </div>
               <br>
               <div class="box-container">
                  <?php
                  include 'partials/datacon.php';
                  $query = "select * from tblProduct where category='masala'";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
                     <div class="box">
                        <div class="info">
                           <h3><?php echo $row['pname']; ?></h3>
                           <br>
                           <form method="post">
                              <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
                              <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                              <input type="text" size="8" name="quantity" placeholder="quantity" style="height: 45px; font-size: 18px;" required>
                              <select name="weight" style="width: 70px; height: 28px; font-size: 15px;" required>
                                 <option value="pkt">pkt</option>
                              </select><br><br>
                              <input class="btn" type="submit" name="addtocart" value="Add To Cart">
                           </form>
                        </div>
                        <div class="img"><img src="admin/<?php echo $row['pimage'] ?>" style="float: right; width: 80px; height: 90px;">
                        </div>
                        <div class="price">₹<?php echo $row['price']; ?>/pkt</div>
                     </div>
                  <?php endwhile; ?>

               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="menu" id="colddrink">
      <div class="swiper menu-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <h3 class="title">Cold Drink</h3>
               <div class="box-container">
                  <?php
                  include 'partials/datacon.php';
                  $query = "select * from tblProduct where category='colddrink'";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
                     <div class="box">
                        <div class="info">
                           <h3><?php echo $row['pname']; ?></h3>
                           <br>
                           <form method="post">
                              <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
                              <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                              <input type="text" size="8" name="quantity" placeholder="quantity" style="height: 45px; font-size: 18px;" required>
                              <select name="weight" style="width: 70px; height: 28px; font-size: 15px;" required>
                                 <option value="bottle">bottle</option>
                              </select><br><br>
                              <input class="btn" type="submit" name="addtocart" value="Add To Cart">
                           </form>
                        </div>
                        <div class="img"><img src="admin/<?php echo $row['pimage'] ?>" style="float: right; width: 100px; height: 100px;">
                        </div>
                        <div class="price">₹<?php echo $row['price']; ?>/bottle</div>
                     </div>
                  <?php endwhile; ?>

               </div>
            </div>
         </div>
      </div>
   </section>
   </div>
   </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

   </section> -->

   <!-- menu section ends -->


   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   <script>
      lightGallery(document.querySelector('.gallery .gallery-container'));
   </script>
</body>

</html>