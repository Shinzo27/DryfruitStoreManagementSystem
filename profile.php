<?php
session_start();
include 'partials\datacon.php';
$loggedin = false;
if (isset($_SESSION['loggedin'])) {
    $loggedin = true;
}
$uid = $_SESSION['uid'];
$updated = false;

if (isset($_POST['submit'])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $query = "select * from tbluser where uid = $uid";
    $result = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        if (password_verify($oldpass, $rows['password'])) {
            $newpass1 = password_hash($newpass, PASSWORD_DEFAULT);
            $update = "update tbluser set password='$newpass1' where uid='$uid'";
            $upres = mysqli_query($conn, $update);

            if ($upres) {
                $updated = true;
            }
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

    <!-- font awesome cdn link  -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="css/loginstyle.css" type="text/css" media="all" />

    <!-- <link rel="stylesheet" href="css/cart.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" type="x-icon" href="images\icon.ico">

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->

    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

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
    <?php
    if ($updated) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Password Updated Successfully</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images\undraw_reminder_re_fe15.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>User Profile</h2>
                        <?php
                        $query = "select * from tbluser where uid='$uid'";
                        $result = mysqli_query($conn, $query);
                        while ($rows = mysqli_fetch_array($result)) {
                        ?>
                            <form action="" method="post">
                                <label style="font-size: large;">Username : </label>
                                <input type="email" class="email" name="username" value="<?php echo $rows['username']; ?>" readonly>
                                <label style="font-size: large;">Email : </label>
                                <input type="email" class="email" name="email" value="<?php echo $rows['email']; ?>" readonly>
                                <label style="font-size: large;">Account created on: </label>
                                <input type="text" name="date" value="<?php echo $rows['date']; ?>" style="margin-bottom: 2px;" readonly>
                                <label style="font-size: large;">Change Password</label>
                                <input type="password" name="oldpass" class="password" placeholder="Enter Old Password">
                                <input type="password" name="newpass" class="password" placeholder="Enter New Password">
                                <button name="submit" class="btn" type="submit">Change Password</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>


        <div class="container px-3 my-5 clearfix">
            <!-- Shopping cart table -->
            <div class="card">
                <div class="card-header">
                    <h2>Order History</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered m-0" style="font-size: large;">
                            <thead>
                                <tr>
                                    <!-- Set columns width -->
                                    <th class="text-center py-4 px-4" style="width: 100px;">Order id</th>
                                    <th class="text-center py-4 px-4" style="width: 100px;">Name</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Placed_On</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Delivery Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grnd_total = 0;
                                $select_cart = mysqli_query($conn, "SELECT * FROM `tblorder` WHERE uid = '$uid'") or die('query failed');
                                if (mysqli_num_rows($select_cart) > 0) {
                                    while ($rows = mysqli_fetch_assoc($select_cart)) {
                                ?>
                                        <tr>
                                            <td class="p-4">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a href="invoice.php?oid=<?php echo $rows['oid']; ?>" class="d-block text-dark"><?php echo $rows['oid']; ?></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?php echo $rows['name']; ?></td>
                                            <td class="align-middle p-2"><input type="text" class="form-control text-center" value="<?php echo $rows['total_price']; ?>" readonly></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"> <?php echo $rows['placed_on']; ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4">₹ <?php echo $rows['delivery_status']; ?></td>
                                        </tr>
                                    <?php
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

                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.main-mockup').fadeOut('slow', function(c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>