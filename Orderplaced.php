<?php
include 'partials/datacon.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: Signin.php");
}

$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
$payment = $_SESSION['payment'];
$number = $_SESSION['number'];
$total_products = $_SESSION['total_products'];
$total_price = $_SESSION['total_price'];
$address = $_SESSION['address'];
$placed_on = $_SESSION['placed_on'];

if ($payment == 'prepaid') {
    $insert = mysqli_query($conn, "INSERT INTO `tblorder`(uid, name, number, method, address, total_products, total_price, placed_on,payment_status) VALUES('$uid', '$name', '$number', '$payment', '$address', '$total_products', '$total_price', '$placed_on','Paid')") or die('query failed');
}

if ($payment == 'cashondelivery') {
    $insert = mysqli_query($conn, "INSERT INTO `tblorder`(uid, name, number, method, address, total_products, total_price, placed_on) VALUES('$uid', '$name', '$number', '$payment', '$address', '$total_products', '$total_price', '$placed_on')") or die('query failed');
}
unset($_SESSION['name']);
unset($_SESSION['payment']);
unset($_SESSION['number']);
unset($_SESSION['total_price']);
unset($_SESSION['address']);
unset($_SESSION['placed_on']);
unset($_SESSION['total_products']);
header("location: clearcart.php");
