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
    <link rel="stylesheet" href="css/cart.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <link rel="shortcut icon" type="x-icon" href="images\icon.ico">

</head>

<body>

    <!-- header section starts     -->

    <section class="header">

        <img src="images\logo.png" class="logo">

        <nav class="navbar">
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
    <section class="main">
        <div class="CartContainer">
            <div class="Header">
                <h3 class="Heading">Shopping Cart</h3>
                <h5 class="Action">Remove all</h5>
            </div>

            <div class="Cart-Items">
                <div class="image-box">
                    <img src="images/product1.jpg" style="height:120px;">
                </div>
                <div class="about">
                    <h1 class="title">Cashew</h1>
                    <h3 class="subtitle">250gm</h3>
                </div>
                <div class="counter">
                    <div class="btn">+</div>
                    <div class="count">2</div>
                    <div class="btn">-</div>
                </div>
                <div class="prices">
                    <div class="amount">₹188</div>
                    <div class="save"><u>Save for later</u></div>
                    <div class="remove"><u>Remove</u></div>
                </div>
            </div>

            <div class="Cart-Items pad">
                <div class="image-box">
                    <img src="images/product2.png" style="height:120px;">
                </div>
                <div class="about">
                    <h1 class="title">Almond</h1>
                    <h3 class="subtitle">250gm</h3>
                </div>
                <div class="counter">
                    <div class="btn">+</div>
                    <div class="count">1</div>
                    <div class="btn">-</div>
                </div>
                <div class="prices">
                    <div class="amount">₹162</div>
                    <div class="save"><u>Save for later</u></div>
                    <div class="remove"><u>Remove</u></div>
                </div>
            </div>
            <hr>
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                        <div class="items">2 items</div>
                    </div>
                    <div class="total-amount">₹350</div>
                </div>
                <a href="payment.php">
                <button class="button">Checkout</button>
                </a>
            </div>
        </div>
    </section>
</body>

</html>