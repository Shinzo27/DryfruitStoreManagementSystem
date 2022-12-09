<?php
include 'partials/datacon.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: Signin.php");
}

$uid = $_SESSION['uid'];

$query1 = "SELECT * from tblcart where uid = '$uid'";
$result1 = mysqli_query($conn, $query1);
while ($row1 = mysqli_fetch_assoc($result1)) :
    $pid = $row1['pid'];
    $qty = $row1['quantity'];

    $query = "SELECT * from tblstock where pid = '$pid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $st = $row['stock'];

    $ab = $st - $qty;

    mysqli_query($conn, "UPDATE `tblstock` SET `stock`='$ab' WHERE pid='$pid'");
endwhile;


mysqli_query($conn, "DELETE FROM `tblcart` WHERE uid = '$uid'") or die('query failed');
header("location: productplaced.php");

?>
<html>

<head>
    <link rel="shortcut icon" type="x-icon" href="images\icon.ico">
</head>

</html>