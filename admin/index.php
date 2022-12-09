<?php
session_start();
include 'datacon.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
  header("location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" type="x-icon" href="images\logo.png">
  <title>Patel's Dryfruit And Masala</title>

</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">Patel's Dryfruit and Masala</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        <form class="d-flex ms-auto my-3 my-lg-0">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-primary" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Manage Account</a></li>
              <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <!-- <div class="text-muted small fw-bold text-uppercase px-3">
              <br>
              CORE
            </div> -->
          </li>
          <li>
            <br>
            <a href="index.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Dashboard</span>
            </a>
            <a href="product.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              <span>Product</span>
            </a>
            <a href="sales.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-chevron-right"></i></span>
              <span>Sales</span>
            </a>
            <a href="stocks.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-person-fill"></i></span>
              <span>Stocks</span>
            </a>
            <a href="admin.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi-person-badge"></i></span>
              <span>Admin</span>
            </a>
            <a href="feedbacks.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi-heart-fill"></i></span>
              <span>Feedbacks</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- offcanvas -->
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-body py-5" style="font-size: 20px;">
              <?php
              $query = "SELECT SUM(total_price) FROM tblorder";
              $result = mysqli_query($conn, $query);
              $rows = mysqli_fetch_array($result);
              ?>
              <center>₹ <?php echo $rows['SUM(total_price)']; ?></center>
            </div>
            <div class="card-footer d-flex">
              Total Sale
              <span class="ms-auto">
                <i class="bi bi-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-body py-5" style="font-size: 20px;">
              <?php
              $query = "SELECT COUNT(pid) FROM tblproduct";
              $result = mysqli_query($conn, $query);
              $prod = mysqli_fetch_array($result);
              ?>
              <center><?php echo $prod['COUNT(pid)']; ?></center>
            </div>
            <div class="card-footer d-flex">
              Total Products
              <span class="ms-auto">
                <i class="bi bi-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-body py-5" style="font-size: 20px;">
              <?php
              $query = "SELECT COUNT(uid) FROM tbluser";
              $result = mysqli_query($conn, $query);
              $user = mysqli_fetch_array($result);
              ?>
              <center><?php echo $user['COUNT(uid)']; ?></center>
            </div>
            <div class="card-footer d-flex">
              Total Users
              <span class="ms-auto">
                <i class="bi bi-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-danger text-white h-100">
            <div class="card-body py-5" style="font-size: 20px;">
              <?php
              $query = "SELECT COUNT(StId) FROM tblstock WHERE stock<2;";
              $result = mysqli_query($conn, $query);
              $stock = mysqli_fetch_array($result);
              ?>
              <center><?php echo $stock['COUNT(StId)']; ?></center>
            </div>
            <div class="card-footer d-flex">
              Low Quantity Products
              <span class="ms-auto">
                <i class="bi bi-chevron-right"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <canvas class="chart" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <canvas class="chart" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> Total Sales
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Invoice Number</th>
                      <th>Name</th>
                      <th>Number</th>
                      <th>Payment Method</th>
                      <th>Address</th>
                      <th>Total</th>
                      <th>Date</th>
                      <th>Payment Status</th>
                      <th>Delivery Status</th>
                    </tr>
                  </thead>
                  <?php
                  $query = "select * from tblorder";
                  $result = mysqli_query($conn, $query);
                  while ($rows = mysqli_fetch_assoc($result)) {
                  ?>
                    <tbody>
                      <tr>
                        <td><?php echo $rows['oid']; ?></td>
                        <td><?php echo $rows['name']; ?></tc>
                        <td><?php echo $rows['number']; ?></td>
                        <td><?php echo $rows['method']; ?></td>
                        <td><?php echo $rows['address']; ?></td>
                        <td><?php echo $rows['total_price']; ?></td>
                        <td><?php echo $rows['placed_on']; ?></td>
                        <td><?php echo $rows['payment_status']; ?></td>
                        <td><?php echo $rows['delivery_status']; ?></td>
                      </tr>
                    </tbody>
                  <?php
                  }
                  ?>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>