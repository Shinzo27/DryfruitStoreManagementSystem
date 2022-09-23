<?php
include 'partials\datacon.php';
$loggedin = false;
if (isset($_SESSION['loggedin'])) {
    $loggedin = true;
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

    <link rel="stylesheet" href="css/loginstyle.css" type="text/css" media="all" />

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

    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require('PHPMailer.php');
    require('Exception.php');
    require('SMTP.php');

    $showsuccess = false;
    $showerror = false;

    if (isset($_POST['getotp'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $showerror = " Invalid Email-Id";
        } else {

            $emailSql = "SELECT * FROM tbluser where email = '$email' ";
            $query = mysqli_query($conn, $emailSql);
            $emailcount = mysqli_num_rows($query);

            if ($emailcount > 0) {
                $showerror = " Email already exists";
            } else {

                $email = $_POST['email'];
                $otp = rand(100000, 999999);

                $mail = new PHPMailer(true);

                try {

                    //Server settings

                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'pateldryfruit55@gmail.com';
                    $mail->Password   = 'tynfuhtpugepkiku';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;



                    //Recipients
                    $mail->setFrom('pateldryfruit55@gmail.com', 'Patel\'s Dryfruit And Masala');
                    $mail->addAddress($email);     //Add a recipient

                    $mail->isHTML(true);
                    //$msg=file_get_contents("beefree-wbrjvkqo22s.php");

                    $mail->Subject = 'Sign Up Verification';

                    $mail->Body    = "Thanks For Registering! <br> Here is the One Time Password for  " . $otp;

                    $mail->MsgHTML = ('h');



                    $mail->send();

                    $sql = "INSERT INTO `tbluser`(`username`, `email`, `password`, `role`, `otp`, `date`) VALUES ('$name','$email','$hash','customer','$otp',current_time())";
                    $run = mysqli_query($conn, $sql);
                    if ($run) {
                        $showsuccess = "Otp Sent to your Email!";
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
    }


    if ($showerror) {

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showerror . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($showsuccess) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> ' . $showsuccess . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    ?>

    <?php
    $regerror = false;
    $regsuccess = false;

    if (isset($_POST['submit'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $regotp = $_POST['regotp'];

        $regquery = "select * from tbluser where email='$email' and otp='$regotp'";
        $result = mysqli_query($conn, $regquery);
        $regcount = mysqli_num_rows($result);

        if ($regcount == 1) {
            $regsuccess = "Register Successful! Now You Can Login.";
        } else {
            $regerror = "Invalid OTP! Insert Correct OTP!";
        }
    }

    if ($regsuccess) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> ' . $regsuccess . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        header("location:signin.php");
    }
    if ($regerror) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $regerror . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

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

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images\undraw_showing_support_re_5f2v.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <p>Join Us In This Journey By Being A Part Of It! </p>

                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name" value="" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" value="" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <button name="getotp" class="btn">Get Otp</button><br>
                            <br><input type="text" name="regotp" placeholder="Enter Your Otp">
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="Signin.php">Login</a>.</p>
                        </div>
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