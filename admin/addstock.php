<?php
session_start();
include 'datacon.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: Signin.php");
}

$id = $_GET['id'];
$select = "SELECT * FROM tblproduct WHERE pid='$id'";
$data = mysqli_query($conn, $select);
$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="x-icon" href="images\icon.ico">
    <title>
        Manage Stock
    </title>
</head>
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #02055A;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #fa9200;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>

<body>

    <h2>Manage Stock</h2>

    <div>
        <form action="" method="post">
            <label for="fname">Product Name: </label> <?php echo $row['pname'] ?> <br><br>

            <label for="fname">Product Price: </label> <?php echo $row['price'] ?> <br><br>

            <label for="lname">New Quantity: </label>
            <input type="text" id="lname" name="qty" value="0" required> <br><br>

            <input type="submit" name="restock" value="Submit">
        </form>
    </div>

</body>

</html>

<?php
if (isset($_POST['restock'])) {
    $qty = $_POST['qty'];
    $check = "select * from tblstock where pid = '$id'";
    $data1 = mysqli_query($conn, $check);
    $numrows = mysqli_num_rows($data1);
    if ($numrows > 0) {
        $query = "UPDATE `tblstock` SET `stock`='$qty',`date`=current_timestamp() WHERE pid='$id'";
        $data = mysqli_query($conn, $query);
        if ($data) {
            header('location: stocks.php');
        } else {
            echo "Invalid Data";
        }
    }
}
?>