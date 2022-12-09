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
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Patel's Dryfruit And Masala</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link rel="stylesheet" href="css/cart.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <link rel="shortcut icon" type="x-icon" href="images\icon.ico">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
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

    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <!-- Set columns width -->
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 45px;"><button type="button" style="background-color:blueviolet; height: 30px; width:50px; color:white; font-size: 10px; text-align:center;"><a href="cart.php?delete_all" style="color:white;" class="delete-btn <?php echo ($grnd_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a></button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $grnd_total = 0;
                            $select_cart = mysqli_query($conn, "SELECT * FROM `tblcart` WHERE uid = '$uid'") or die('query failed');
                            if (mysqli_num_rows($select_cart) > 0) {
                                while ($rows = mysqli_fetch_assoc($select_cart)) {
                            ?>
                                    <tr>
                                        <td class="p-4">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <a href="#" class="d-block text-dark"><?php echo $rows['pname']; ?></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4"><?php echo $rows['price']; ?></td>
                                        <td class="align-middle p-2"><input type="text" class="form-control text-center" value="<?php echo $rows['quantity']; ?>"><button type="button" style="background-color:blueviolet; height: 20px; width:55px; color:white; font-size: 10px; text-align:center;">Update</button></td>
                                        <td class="text-right font-weight-semibold align-middle p-4">₹ <?php echo $sub_total = ($rows['quantity'] * $rows['price']); ?></td>
                                        <td class="text-center align-middle px-0"><a href="cart.php?delete=<?php echo $rows['cid']; ?>" style="color:black;" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a></td>
                                    </tr>
                                <?php
                                    $grnd_total += $sub_total;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td class="text-right font-weight-semibold align-middle p-4">No Items in the cart</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- / Shopping cart table -->

                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <!-- <label class="text-muted font-weight-normal">Promocode</label>
                        <input type="text" placeholder="ABC" class="form-control"> -->
                    </div>
                    <div class="d-flex">
                        <!-- <div class="text-right mt-4 mr-5">
                            <label class="text-muted font-weight-normal m-0">Discount</label>
                            <div class="text-large"><strong>$20</strong></div>
                        </div> -->
                        <div class="text-right mt-4">
                            <?php

                            ?>
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large"><strong>₹ <?php echo $grnd_total; ?></strong></div>
                        </div>
                    </div>
                </div>

                <div class="float-right">
                    <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3"><a href="Product.php" style="color:white;">Back to shopping</a></button>
                    <button type="button" class="btn btn-lg btn-primary mt-2"><a href="customerinfo.php" style="color: white;" class="check-btn <?php echo ($grnd_total < 1) ? '' : 'disabled'; ?>">Checkout</a></button>
                </div>

            </div>
        </div>
    </div>

    <style type="text/css">
        body {
            background: #eee;
        }

        .ui-w-40 {
            width: 60px !important;
            height: auto;
        }

        .card {
            font-size: medium;
            box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
        }

        .ui-product-color {
            display: inline-block;
            overflow: hidden;
            margin: .144em;
            width: .875rem;
            height: .875rem;
            border-radius: 10rem;
            -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            vertical-align: middle;
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>