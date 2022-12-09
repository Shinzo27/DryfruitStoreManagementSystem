<?php
session_start();
include 'datacon.php';

$id = $_GET['id'];


?>

<?php
if (isset($_POST['updatesale'])) {
    $delivery = $_POST['deliverystatus'];
    $payment = $_POST['paymentstatus'];

    $query = "update tblorder set payment_status='$payment', delivery_status='$delivery' where oid='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("location: sales.php");
    }
}


?>



<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patel's Dryfruit and Masala</title>

    <!-- font awesome cdn link  -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="css/addproduct.css" type="text/css" media="all" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="..\css\style.css">

    <link rel="shortcut icon" type="x-icon" href="images\icon.ico">

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->

    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    $error = false;
    if ($error == true) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> ' . $error . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    ?>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images\undraw_experience_design_re_ca7l.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Update Order</h2>
                        <p>You can change delivery status and payment status only!</p>
                        <?php
                        $select = "select * from tblorder where oid='$id'";
                        $data = mysqli_query($conn, $select);
                        $rows = mysqli_fetch_assoc($data);
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            <label style="font-size: large;">Name : </label>
                            <input type="email" class="email" name="name" value="<?php echo $rows['name']; ?>" readonly>
                            <label style="font-size: large;">Number : </label>
                            <input type="email" class="email" name="number" value="<?php echo $rows['number']; ?>" readonly>
                            <label style="font-size: large;">Payment Method : </label>
                            <input type="email" class="email" name="payment" value="<?php echo $rows['method']; ?>" readonly>
                            <label style="font-size: large;">Address : </label>
                            <input type="email" class="email" name="address" value="<?php echo $rows['address']; ?>" readonly>
                            <label style="font-size: large;">Total : </label>
                            <input type="email" class="email" name="name" value="<?php echo $rows['total_price']; ?>" readonly>
                            <select style="width: 90px; height: 30px; text-align: center; background-color: #4169e1; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="paymentstatus">
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                            </select><label style="color: #666; padding-left: 10px; font-size: 15px;">Select if payment is paid or not!</label><br><br>
                            <select style="width: 90px; height: 30px; text-align: center; background-color: #4169e1; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="deliverystatus">
                                <option value="Pending">Pending</option>
                                <option value="Delivered">Delivered</option>
                            </select><label style="color: #666; padding-left: 10px; font-size: 15px;">Select if product is delivered or not!</label><br><br>
                            <button name="updatesale" class="btn" type="submit">Update Order</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

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