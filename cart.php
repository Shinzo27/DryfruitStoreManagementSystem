<?php
include 'partials\datacon.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: Signin.php");
}
$loggedin = false;

if (isset($_SESSION['loggedin'])) {
    $loggedin = true;
}

$uid = $_SESSION['uid'];
$nodata = false;
if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `tblcart` WHERE uid = '$uid'") or die('query failed');
    header('location:cart.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `tblcart` WHERE cid = '$delete_id'") or die('query failed');
    header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patel's Dryfruit and Masala</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- CSS only -->
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
    <section class="main">
        <div class="CartContainer">
            <div class="Header">
                <h3 class="Heading">Shopping Cart</h3>
                <h5 class="Action"><button type="button" style="background-color:blueviolet; height: 30px; width:95px; color:white; font-size: 15px; text-align:center;"><a href="cart.php?delete_all" style="color:white;" class="delete-btn <?php echo ($grnd_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a></button></h5>
            </div>
            <?php
            $grnd_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `tblcart` WHERE uid = '$uid'") or die('query failed');
            if (mysqli_num_rows($select_cart) > 0) {
                while ($rows = mysqli_fetch_assoc($select_cart)) {
            ?>
                    <div class="Cart-Items">
                        <div class="about">
                            <h1 class="title" style="font-size:28px;"><?php echo $rows['pname']; ?></h1>
                            <h3 class="subtitle" style="font-size:20px;">₹ <?php echo $rows['price']; ?></h3><br>
                            <input type="number" size="8" placeholder="quantity" value="<?php echo $rows['quantity']; ?>" min="1" name="quantity" style="padding-left: 10px; height: 30px; font-size: 18px; background-color:skyblue;" required><br><br>
                            <button type="button" style="background-color:blueviolet; height: 30px; width:55px; color:white; font-size: 15px; text-align:center;">Update</button>
                        </div>
                        <div class="prices">
                            <div class="amount">₹ <?php echo $sub_total = ($rows['quantity'] * $rows['price']); ?></div>
                            <div><button type="button" style="background-color:blueviolet; height: 30px; width:55px; color:white; font-size: 15px; text-align:center;"><a href="cart.php?delete=<?php echo $rows['cid']; ?>" style="color:white;" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a></button></div>
                        </div>
                    </div>
            <?php
                    $grnd_total += $sub_total;
                }
            }
            ?>
            <hr>
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                    </div>
                    <div class="total-amount">₹ <?php echo $grnd_total; ?></div>
                </div>
                <button class="button">
                    <a href="customerinfo.php" style="color: black;" class="check-btn <?php echo ($grnd_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a></button>
            </div>
        </div>
    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>