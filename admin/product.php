<?php
include 'datacon.php';
?>
<?php

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
    <title>Patel's Dryfruit And Masala</title>
    <link rel="shortcut icon" type="x-icon" href="images\icon.ico">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="post">
                        Product Name : <input type=text name="pname" placeholder="Enter Product Name"><br><br>
                        Category : <select name="category" class="btn btn-primary btn-sm dropdown-toggle">
                            <option value="dryfruit">Dryfruit</option>
                            <option value="driedfruit">Driedfruit</option>
                            <option value="masala">Masala</option>
                            <option value="colddrink">Cold Drink</option>
                        </select><br><br>
                        Product Image : <input type=text name="image" placeholder="Enter Product Image"><br><br>
                        Product Price : <input type=text name="price" placeholder="Enter Product Price"><br><br>
                        Status : <select name="status" class="btn btn-primary btn-sm dropdown-toggle">
                            <option value="activate">Activate</option>
                            <option value="deactivate">Deactivate</option>
                        </select><br><br>
                        Date : <input type="date" name="date">


                        <div class="modal-footer">
                            <br>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="updateproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="post">
                        Product Name : <input type=text name="pname" placeholder="Enter Product Name"><br><br>
                        Category : <select name="category" class="btn btn-primary btn-sm dropdown-toggle">
                            <option value="dryfruit">Dryfruit</option>
                            <option value="driedfruit">Driedfruit</option>
                            <option value="masala">Masala</option>
                            <option value="colddrink">Cold Drink</option>
                        </select><br><br>
                        Product Image : <input type=text name="image" placeholder="Enter Product Image"><br><br>
                        Product Price : <input type=text name="price" placeholder="Enter Product Price"><br><br>
                        Status : <select name="status" class="btn btn-primary btn-sm dropdown-toggle">
                            <option value="activate">Activate</option>
                            <option value="deactivate">Deactivate</option>
                        </select><br><br>
                        Date : <input type="date" name="date">


                        <div class="modal-footer">
                            <br>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
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
                        <a href="stock.php" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-table"></i></span>
                            <span>Stock</span>
                        </a>
                        <a href="sales.php" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-chevron-right"></i></span>
                            <span>Sales</span>
                        </a>
                        <a href="admin.php" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-person-fill"></i></span>
                            <span>Admin</span>
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
                    <h4>Products
                        <a href="" class="btn btn-primary float-right" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</a>
                    </h4>

                </div>

            </div>
            <br>
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
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Image Path</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = "select * from tblproduct";
                                        $data = mysqli_query($conn, $query);
                                        $result = mysqli_fetch_row($data);

                                        if ($result) {
                                            while ($rows = mysqli_fetch_assoc($data)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $rows['pname']; ?></td>
                                                    <td><?php echo $rows['category']; ?></td>
                                                    <td><?php echo $rows['pimage']; ?></td>
                                                    <td><?php echo $rows['price']; ?></td>
                                                    <td><?php echo $rows['status']; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateproduct">Edit</a>
                                                        <a class="btn btn-primary btn-sm" onclick="return confirm('are you sure you want to delete?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
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