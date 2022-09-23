<?php
    $error = false;
    $success = false;
    if(isset($_POST['addproduct']))
    {
        $name= $_POST['pname'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $fname = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $fsize = $_FILES['image']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;

        $store = "images/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Max Image Size is 1024kb!</strong> Try different Image.</div>';
            } else {

                $query = "INSERT INTO `tblproduct`(`pname`, `category`, `pimage`, `price`, `status`, `delete_flag`, `date`) VALUES ('$name','$category','$fnew','$price','$status','0',current_time()";
                $run = mysqli_query($conn,$query);
                move_uploaded_file($temp, $store);

                $success = true;
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