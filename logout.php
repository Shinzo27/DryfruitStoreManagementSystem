<?php 
session_start();
unset($_SESSION['loggedin']);
session_destroy();
header("location:index.php");
?>
