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

$product_id = $_POST['product_id'];
$cart_id = $_POST['cart_id'];
$cart_quantity = $_POST['cart_quantity'];
if ($cart_quantity <= 0) {
    echo "<script> alert('Product Quantity must be greater than 0'); </script>";
} else {
    $stock = "SELECT * FROM `tblstock` WHERE pid = '$product_id'";
    $stockcheck = mysqli_query($conn, $stock);
    $row = mysqli_fetch_assoc($stockcheck);
    $st = $row['stock'];
    if ($cart_quantity < $st) {
        $upq = "UPDATE `tblcart` SET quantity = '$cart_quantity' WHERE cid = '$cart_id'";
        $data = mysqli_query($conn, $upq);

        if ($data) {
            header('location: cart.php');
        } else {
            echo "<script> alert('Some Error Occured'); </script>";
        }
    } else {
        echo "<script> alert('Not Enough Stock'); </script>";
    }
}
