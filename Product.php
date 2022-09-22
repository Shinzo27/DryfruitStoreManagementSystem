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
         <?php
         if ($loggedin == true) { ?>
            <a href="logout.php">Log out</a>
         <?php }
         ?>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>


   <section class="menu" id="dryfruit">

      <div class="heading">
         <span>list</span>
         <h3>Our products</h3>
      </div>
      <div class="swiper menu-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <h3 class="title">Dryfruits</h3>
               <div class="box-container">
                  <?php
                  include 'partials/datacon.php';
                  $query = "select * from tblProduct where category='dryfruit'";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
                     <div class="box">
                        <div class="info">
                           <h3><?php echo $row['pname']; ?></h3>
                           <br>
                           <form method="post">
                              <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                              <select name="weight" style="width: 70px; height: 28px;">
                                 <option value="500gm">500gm</option>
                                 <option value="1kg">1kg</option>
                              </select>
                           </form>
                           <br>
                           <a href="order.php" class="btn">Buy now</a><br>
                           <a href="cart.php" class="btn">Add to cart</a>
                        </div>
                        <div class="img"><img src="<?php echo $row['pimage']; ?>" style="float: right; width: 100px; height: 100px;">
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
                              <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                              <select name="weight" style="width: 70px; height: 28px;">
                                 <option value="500gm">500gm</option>
                                 <option value="1kg">1kg</option>
                              </select>
                           </form>
                           <br>
                           <a href="order.php" class="btn">Buy now</a><br>
                           <a href="cart.php" class="btn">Add to cart</a>
                        </div>
                        <div class="img"><img src="<?php echo $row['pimage']; ?>" style="float: right; width: 100px; height: 100px;">
                        </div>
                        <div class="price">₹<?php echo $row['price']; ?>/kg</div>
                     </div>
                  <?php endwhile; ?>

               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- <section class="menu" id="namkeens">
      <div class="swiper-slide slide">
         <h3 class="title">Namkeens</h3>
         <div class="box-container">
            <div class="box">
               <div class="info">

                  <h3>Bhatha Kani 240gm</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Pkt</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen1.png" style="float: right; width: 150px; height: 100px;">
               </div>
               <div class="price">₹40/Pkt</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Bhavnagari Gathiya 240gm</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Pkt</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen2.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹50/Pkt</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Plain Sev 240gm</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Pkt</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen3.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹40/Pkt</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Khatta Mitha 240gm</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Pkt</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen4.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹50/Pkt</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Surti Special 240gm</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Pkt</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen5.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹50/Pkt</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Mangalori Mix 240gm</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Pkt</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen6.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹50/Pkt</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Nadiyadi Mix 240gm</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Pkt</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen7.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹40/Pkt</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Desi Ghee Nankhatai</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Box</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen8.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹130/Box</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Butter Bite</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Box</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen9.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹100/Box</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Chocolate Cream Roll</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Box</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen10.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹180/Box</div>
            </div>

            <div class="box">
               <div class="info">

                  <h3>Strawberry Cream Roll</h3>
                  <br>
                  <form method="post">
                     <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                     <select name="weight" style="width: 70px; height: 28px;">
                        <option value="0">Box</option>
                     </select>
                  </form>
                  <br>
                  <a href="order.php" class="btn">Buy now</a><br>
                  <a href="cart.php" class="btn">Add to cart</a>
               </div>
               <div class="img"><img src="images\namkeen11.png" style="float: right; width: 150px; height: 150px;">
               </div>
               <div class="price">₹180/Box</div>
            </div>
         </div>
      </div>


      <section class="menu" id="masala">
         <div class="swiper-slide slide">
            <h3 class="title">Masala</h3>
            <div class="box-container">
               <div class="box">
                  <div class="info">
                     <h3>Garam Masala</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Pkt</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\Masala1.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹80/Box</div>
               </div>

               <div class="box">
                  <div class="info">
                     <h3>Chaat Masala</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Pkt</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\Masala2.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹30/Box</div>
               </div>

               <div class="box">
                  <div class="info">
                     <h3>Biryani Masala</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Pkt</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\Masala3.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹50/Box</div>
               </div>

               <div class="box">
                  <div class="info">
                     <h3>Kasmiri Chilli Powder</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Pkt</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\Masala4.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹86/Box</div>
               </div>

               <div class="box">
                  <div class="info">
                     <h3>Turmeric Powder</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Pkt</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\Masala5.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹250/Box</div>
               </div>

               <div class="box">
                  <div class="info">
                     <h3>Kitchen King Masala</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Pkt</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\Masala6.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹50/Box</div>
               </div>
            </div>
         </div>
      </section>

      <section class="menu" id="colddrink">
         <div class="swiper-slide slide">
            <h3 class="title">Cold Drink</h3>
            <div class="box-container">
               <div class="box">
                  <div class="info">
                     <h3>Coke 750ml</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Bottle</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Buy now</a><br>
                  </div>
                  <div class="img"><img src="images\colddrink1.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹40/Bottle</div>
               </div>


               <div class="box">
                  <div class="info">
                     <h3>Fanta 750ml</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Bottle</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\colddrink2.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹40/Bottle</div>
               </div>

               <div class="box">
                  <div class="info">
                     <h3>Nescafe Coffee 180ml</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Bottle</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\colddrink3.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹40/Bottle</div>
               </div>

               <div class="box">
                  <div class="info">
                     <h3>RAW Coconut Water</h3>
                     <br>
                     <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 50px; font-size: 18px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                           <option value="0">Bottle</option>
                        </select>
                     </form>
                     <br>
                     <a href="order.php" class="btn">Buy now</a><br>
                     <a href="cart.php" class="btn">Add to cart</a>
                  </div>
                  <div class="img"><img src="images\colddrink4.jpg" style="float: right; width: 150px; height: 150px;">
                  </div>
                  <div class="price">₹40/Bottle</div>
               </div> -->
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

   <script>
      lightGallery(document.querySelector('.gallery .gallery-container'));
   </script>
</body>

</html>