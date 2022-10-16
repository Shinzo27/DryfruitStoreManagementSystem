<?php
session_start();
session_destroy();
if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}
header("location:../index.php");
