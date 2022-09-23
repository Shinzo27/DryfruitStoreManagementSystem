
<?php
session_start();
include 'datacon.php';
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
    $success = false;
    if(isset($_POST['addproduct']))
    {
        $name= $_POST['pname'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $fsize = $_FILES["file"]["size"];
        $extension = explode('.', $filename);
        $extension = strtolower(end($extension));

        $folder = "./image/" . $filename;
        
        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Max Image Size is 1024kb!</strong> Try different Image.</div>';
            } else {
                $query = "INSERT INTO `tblproduct`(`pname`, `category`, `pimage`, `price`, `status`, `delete_flag`, `date`) VALUES ('$name','$category','$filename','$price','$status','0',current_time()";
                $run = mysqli_query($conn,$query);
                if($run)
                {
                    $move = move_uploaded_file($temp, $store);
                    if($move)
                    {
                        $success = true;
                    }
                }
            }
        } elseif ($extension == '') {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>select image</strong></div>';
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>invalid extension!</strong>png, jpg, Gif are accepted.</div>';
        }

    }
    if($success){
        echo '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Product Added Successfully.</div>';
    }
    if($error)
    {
        echo $error;
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
                            <img src="images\undraw_experience_design_re_ca7l.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <p>Welcome to our store where you can get everything fresh with fresh vibes!</p>

                        <form action="" method="post">
                            <input type="text" name="pname" class="name" placeholder="Enter Product Name" required>
                            <select style="width: 90px; height: 30px; text-align: center; background-color: #7d2ae8; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="category">
                                <option hidden>Category</option>
                                <option value="dryfruit">Dryfruit</option>
                                <option value="driedfruit">Driedfruit</option>
                                <option value="namkeen">Namkeen</option>
                                <option value="masala">Masala</option>
                                <option value="colddrink">Cold Drink</option>
                            </select><label style="color: #666; padding-left: 10px; font-size: 15px;">Select Category!</label><br><br>
                            <input type="file" name="file" required>
                            <input type="text" name="price" class="name" placeholder="Enter Product Price" required>
                            <select style="width: 90px; height: 30px; text-align: center; background-color: #7d2ae8; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="status">
                                <option hidden>Status</option>
                                <option value="activate">Activate</option>
                                <option value="deactivate">Deactivate</option>
                            </select><label style="color: #666; padding-left: 10px; font-size: 15px;">Select if product is active or not!</label><br><br>
                            <button name="addproduct" class="btn" type="submit">Login</button>
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

