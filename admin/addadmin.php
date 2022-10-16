<?php
session_start();
include 'datacon.php';
$loggedin = false;
$showerror = false;
$emailexist = false;
if (isset($_SESSION['loggedin'])) {
    $loggedin = true;
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php
    if ($showerror == true) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong>Enter Details Properly!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    if ($emailexist == true) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong>Admin Already exist!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    ?>
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
                        <h2>Register New Admin</h2>
                        <p>Welcome to our store where you can get everything fresh with fresh vibes!</p>

                        <form method="post" enctype="multipart/form-data">
                            <input type="text" name="username" class="name" placeholder="Enter Username" required>
                            <input type="text" name="email" class="name" placeholder="Enter Email" required>
                            <input type="text" name="password" class="name" placeholder="Enter Password" require>

                            <button name="addadmin" class="btn" type="submit">Register</button>
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

<?php

if (isset($_POST['addadmin'])) {

    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $showerror = " Invalid Email-Id";
    } else {

        $emailSql = "SELECT * FROM tbluser where email = '$email' ";
        $query = mysqli_query($conn, $emailSql);
        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            $emailexist = true;
        } else {

            $sql = "insert into tbluser(username,email,password,role,otp,date) values ('$uname','$email','$hash','admin','',current_time())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("admin.php");
            } else {
                $showerror = true;
            }
        }
    }
}

?>