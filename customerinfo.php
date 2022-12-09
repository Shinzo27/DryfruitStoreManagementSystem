<?php
include 'partials\datacon.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: Signin.php");
}

?>

<?php

$loggedin = false;
if (isset($_SESSION['loggedin'])) {
    $loggedin = true;
} else {
    $loggedin = false;
}
$uid = $_SESSION['uid'];
$emptycart = false;
$alreadyplaced = false;
$placed = false;

if (isset($_POST['order_btn'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['cnum'];
    $payment = mysqli_real_escape_string($conn, $_POST['payment']);
    $address = mysqli_real_escape_string($conn, 'flat no. ' . $_POST['aptnum'] . ', ' . $_POST['aptname'] . ', ' . $_POST['landmark'] . ', ' . $_POST['city'] . ' , ' . $_POST['state']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `tblcart` WHERE uid = '$uid'") or die('query failed');
    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_products[] = $cart_item['pname'] . ' (' . $cart_item['quantity'] . ') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ', $cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `tblorder` WHERE name = '$name' AND number = '$number' AND method = '$payment' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if ($cart_total == 0) {
        $emptycart = true;
    } else {
        if (mysqli_num_rows($order_query) > 0) {
            $alreadyplaced = true;
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['number'] = $number;
            $_SESSION['payment'] = $payment;
            $_SESSION['total_products'] = $total_products;
            $_SESSION['total_price'] = $cart_total;
            $_SESSION['address'] = $address;
            $_SESSION['placed_on'] = $placed_on;
            header("location: checkout.php");
            // mysqli_query($conn, "INSERT INTO `tblorder`(uid, name, number, method, address, total_products, total_price, placed_on) VALUES('$uid', '$name', '$number', '$payment', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
            // $placed = true;
            // mysqli_query($conn, "DELETE FROM `tblcart` WHERE uid = '$uid'") or die('query failed');
        }
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
    <?php
    if ($emptycart == true) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Cart is empty!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }

    if ($alreadyplaced == true) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Order is already placed!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }

    if ($placed == true) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Order Placed!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <section class="order" id="order">

        <div class="heading" style="margin-bottom: 2px;">
            <span>order now</span>
            <h3>fast home delivery</h3>
        </div>

        <section class="display-order">
            <h2 class="heading" style="font-size: 30px; color:white; margin-bottom:20px;">Your Order</h2>
            <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `tblcart` WHERE uid = '$uid'") or die('query failed');
            if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price;
            ?>
                    <div class="alert alert-warning" role="alert">
                        <p style="font-size:18px; padding-top:10px;"> <?php echo $fetch_cart['pname']; ?> <span>(<?php echo '₹' . $fetch_cart['price'] . '/-' . ' x ' . $fetch_cart['quantity']; ?>)</span> </p>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="alert alert-warning" role="alert">
                    <p style="font-size:18px; padding-top:10px;"> Cart is Empty! </p>
                </div>
            <?php
            }
            ?>
            <div class="alert alert-warning" role="alert" style="font-size: 18px;">
                grand total : <span>₹ <?php echo $grand_total; ?>/-</span>
            </div>


        </section>

        <form method="post">
            <div class="box-container">
                <div class="box">
                    <div class="inputBox">
                        <span>full name</span>
                        <input type="text" placeholder="enter your name" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>Payment Method</span><br><br>
                        <select name="payment" style="width: 150px; height: 50px; text-align: center; background-color: #cd9452; color: white; font-size: 16px; border-radius: 5px 5px 5px 5px;" required>
                            <option value="cashondelivery">Cash On Delivery</option>
                            <option value="prepaid">Prepaid</option>
                        </select>
                    </div>
                    <div class="inputBox" style="padding-top: 7px;">
                        <span>Society Name,Village</span>
                        <input type="text" placeholder="enter your society name and village" name="aptname" required>
                    </div>

                    <div class="inputBox">
                        <span>City</span>
                        <input type="text" placeholder="enter your city" name="city" required>
                    </div>

                </div>
                <div class="box">
                    <div class="inputBox">
                        <span>Contact number</span>
                        <input type="number" placeholder="enter your number" name="cnum" required>
                    </div>
                    <div class="inputBox">
                        <span>House Number/Wing</span>
                        <input type="text" placeholder="enter your house number" name="aptnum" required>
                    </div>
                    <div class="inputBox">
                        <span>Landmark</span>
                        <input type="text" placeholder="enter your landmark" name="landmark">
                    </div>
                    <div class="inputBox">
                        <span>State</span>
                        <input type="text" placeholder="enter your state" name="state" required>
                    </div>
                </div>
            </div>
            <input type="submit" value="order now" name="order_btn" class="btn">
        </form>

    </section>

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