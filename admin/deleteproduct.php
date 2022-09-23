<?php
include 'datacon.php';
$id = $_GET['id'];
$query = "delete from tblproduct where pid='$id'";
$data = mysqli_query($conn, $query);

if ($data) {
    header("location: product.php");
} else {
    echo "Invalid Data!";
}
