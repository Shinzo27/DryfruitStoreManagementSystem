<?php
session_start();
ob_start();
include 'datacon.php';
$loggedin = false;
if (isset($_SESSION['loggedin'])) {
    $loggedin = true;
}
$success = "";
$error = "";
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
                        <h2>Add Product</h2>
                        <p>Fill all the details properly!</p>

                        <form method="post" enctype="multipart/form-data">
                            <input type="text" name="pname" class="name" placeholder="Enter Product Name" required>
                            <select style="width: 90px; height: 30px; text-align: center; background-color: #4169e1; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="category">
                                <option hidden>Category</option>
                                <option value="dryfruit">Dryfruit</option>
                                <option value="driedfruit">Driedfruit</option>
                                <option value="namkeen">Namkeen</option>
                                <option value="masala">Masala</option>
                                <option value="colddrink">Cold Drink</option>
                            </select><label style="color: #666; padding-left: 10px; font-size: 15px;">Select Category!</label><br><br>
                            <input type="file" id="file" name="file" multiple />
                            <input type="text" name="price" class="name" placeholder="Enter Product Price" required>
                            <input type="text" name="stock" class="name" placeholder="Enter Opening Stock" required>
                            <label style="color: #666; padding-left: 10px; font-size: 15px;">Enter Stock in Kg or Packets!</label><br><br>
                            <select style="width: 90px; height: 30px; text-align: center; background-color: #4169e1; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="status">
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

<?php

if (isset($_POST['addproduct'])) {
    if (isset($_FILES['file'])) {
        $pname = $_POST['pname'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $stock = $_POST['stock'];

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;

        $store = "images/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 2000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Max Image Size is 1024kb!</strong> Try different Image.</div>';
            } else {
                move_uploaded_file($temp, $store);
                $sql = "INSERT INTO `tblproduct`(`pname`, `category`, `pimage`, `price`,`stock`, `status`, `date`) VALUES ('$pname','$category','$store','$price','$stock','$status',current_time())";
                $result = mysqli_query($conn, $sql);
                // move_uploaded_file($fname, "admin/images/");
                if ($result) {
?>
                    <script>
                        window.location.href = "product.php";
                    </script>
<?php

                } elseif ($extension == '') {
                    $error = "Select Image Only!";
                } else {
                    $error = "Select File under 2 MB!";
                }
            }
        }
    }
}
?>