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
         <a href="#home">home</a>
         <a href="Product.php">shop</a>
         <a href="gallery.php">gallery</a>
         <a href="#about">about</a>
         <a href="#food">expertise</a>
         <a href="#blogs">reviews</a>
         <a href="#footer">Contact us</a>
         <a href="Login.php">Login</a>
         <a href="cart.php">Cart</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

   <!-- header section ends    -->

   <!-- home section starts  -->

   <section class="home" id="home">

      <div class="swiper home-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide" style="background: url(images/home-slide-1.jpg) no-repeat;">
               <div class="content">
                  <span>Healthy Dryfruit</span>
                  <h3>Wealthy Life</h3>
                  <a href="Product.php" class="btn">get started</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide-2.jpg) no-repeat;">
               <div class="content">
                  <span>Need Spices?</span>
                  <h3>We have it too!</h3>
                  <a href="Product.php" class="btn">get started</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-slide-3.jpg) no-repeat;">
               <div class="content">
                  <span>Morning Breakfast?</span>
                  <h3>Have A Namkeen!</h3>
                  <a href="Product.php" class="btn">get started</a>
               </div>
            </div>

         </div>

         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>

      </div>

   </section>

   <!-- home section ends -->

   <!-- about section starts  -->

   <section class="about" id="about">

      <div class="image">
         <img src="images/about-img.png" alt="">
      </div>

      <div class="content">
         <h3 class="title">welcome to our store</h3>
         <p>We are famous seller in adajan area! Specially known for our quality dryfruit, And we are selling Bharat
            Masala which is famous all around surat and All types of Namkeens and Chocolates.We have Imported Chocolates
            and Gift Hampers too!</p>
         <div class="icons-container">
            <div class="icons">
               <img src="images/about-icon-1.png" alt="">
               <h3>quality Dryfruit</h3>
            </div>
            <div class="icons">
               <img src="images/about-icon-2.png" alt="">
               <h3>Spices</h3>
            </div>
            <div class="icons">
               <img src="images/about-icon-3.png" alt="">
               <h3>Namkeens</h3>
            </div>
         </div>
      </div>

   </section>

   <!-- about section ends -->

   <!-- food section starts  -->

   <section class="food" id="food">

      <div class="heading">
         <span>popular dryfruits</span>
         <h3>our expertise!</h3>
      </div>

      <div class="swiper food-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide" data-name="food-1">
               <img src="images/food-img-1.png" alt="">
               <h3>Cashew</h3>
               <div class="price">₹800/kg</div>
            </div>

            <div class="swiper-slide slide" data-name="food-2">
               <img src="images/food-img-2.png" alt="">
               <h3>Walnuts</h3>
               <div class="price">₹650/kg</div>
            </div>

            <div class="swiper-slide slide" data-name="food-3">
               <img src="images/food-img-3.png" alt="">
               <h3>Almonds</h3>
               <div class="price">₹750/kg</div>
            </div>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <!-- food section ends -->

   <!-- food preview section starts  -->

   <section class="food-preview-container">

      <div id="close-preview" class="fas fa-times"></div>

      <div class="food-preview" data-target="food-1">
         <img src="images/food-img-1.png" alt="">
         <h3>Cashew</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <p>Rich in protein, healthy fats, and antioxidants such as polyphenols, cashews offer a variety of noteworthy
            health benefits.</p>
         <div class="price">₹750/kg</div>
         <a href="Product.php" class="btn">buy now</a>
      </div>

      <div class="food-preview" data-target="food-2">
         <img src="images/food-img-2.png" alt="">
         <h3>Walnuts</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <p>Walnuts are round, single-seeded stone fruits that grow from the walnut tree. They are a good source of
            healthful fats, protein, and fiber.</p>
         <div class="price">₹670/kg</div>
         <a href="Product.php" class="btn">buy now</a>
      </div>

      <div class="food-preview" data-target="food-3">
         <img src="images/food-img-3.png" alt="">
         <h3>Almonds</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <p>Almonds are rich in valuable nutrients for your body, like magnesium, vitamin E, and dietary fiber</p>
         <div class="price">650/kg</div>
         <a href="Product.php" class="btn">buy now</a>
      </div>

   </section>

   <!-- food preview section ends -->


   <!-- blogs section starts  -->

   <section class="blogs" id="blogs">

      <div class="heading">
         <span>Review Point</span>
         <h3>Our Latest reviews!</h3>
      </div>

      <div class="swiper blogs-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="images/blog-img-1.jpg" alt="">
                  <span>bharat masala</span>
               </div>
               <div class="content">
                  <div class="icon">
                     <a href="#"> <i class="fas fa-calendar"></i> 15th april, 2022 </a>
                     <a href="#"> <i class="fas fa-user"></i> by Drashti Patel </a>
                  </div>
                  <a href="#" class="title">"Bharat Masala in adajan!"</a>
                  <p>It's good to have bharat masala nearby as we don't have to travel more!</p>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="images/blog-img-2.jpg" alt="">
                  <span>gift hampers</span>
               </div>
               <div class="content">
                  <div class="icon">
                     <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2022 </a>
                     <a href="#"> <i class="fas fa-user"></i> by jay dave</a>
                  </div>
                  <a href="#" class="title">Best Gift Hampers i'd seen</a>
                  <p>I want gift hamper for rakshabandhan and i'd found the best hamper!</p>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="images/blog-img-3.jpeg" alt="">
                  <span>services</span>
               </div>
               <div class="content">
                  <div class="icon">
                     <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2022 </a>
                     <a href="#"> <i class="fas fa-user"></i> by ayush rokad</a>
                  </div>
                  <a href="#" class="title">Very Good Services!</a>
                  <p>They were out of stock but they just arranged it by that day evening.</p>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="images/blog-img-6.jpg" alt="">
                  <span>quality</span>
               </div>
               <div class="content">
                  <div class="icon">
                     <a href="#"> <i class="fas fa-calendar"></i> 10th march, 2022 </a>
                     <a href="#"> <i class="fas fa-user"></i> by Ved Master</a>
                  </div>
                  <a href="#" class="title">"Best quality of dryfruit!"</a>
                  <p>I founded best quality of all dryfruits at cheap prices!</p>
               </div>
            </div>

         </div>
         <a href="feedback.php" class="btn">Add Feedback</a>
         <div class="swiper-pagination"></div>

      </div>

   </section>

   <!-- blogs section ends -->

   <!-- footer section starts  -->

   <section class="footer" id="footer">

      <div class="icons-container">

         <div class="icons">
            <i class="fas fa-clock"></i>
            <h3>opening hours</h3>
            <p>09:00am to 08:00pm</p>
         </div>

         <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>phone</h3>
            <p>Kevin Patel - 9898219837</p>
            <p>Meet Patel - 9998513182</p>
         </div>

         <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>email</h3>
            <p>patelsdryfruitstudio@gmail.com</p>
         </div>

         <div class="icons">
            <i class="fas fa-map"></i>
            <h3>address</h3>
            <p>4-5,Regent Residency,Opp. Pratham Ganesha Apt., Nr. Pratham Circle,Pal-Adajan,Surat - 395009</p>
         </div>

      </div>

      <div class="share">
         <a href="https://www.facebook.com/patelcashewnut" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="https://www.instagram.com/patels.cashew.nuts/" class="fab fa-instagram"></a>
      </div>

      <div class="qr">
         <br>
         <br>
         <h2>Scan to get all the information!</h2>
         <img src="images\qrcode.png" style="width: 200px;">
      </div>

      <div class="credit"> created by <span>Pratham Patel, Rohan Vaghasiya</span> | all rights reserved! </div>

   </section>

   <!-- footer section ends  -->










   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script>
      lightGallery(document.querySelector('.gallery .gallery-container'));
   </script>

</body>

</html>