<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>Products</title>
</head>

<body id="body-pd" class="bg-light">
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="dashboard.php" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">CV-GFOXX</span> </a>
        <div class="nav_list">
          <a href="dashboard.php" class="nav_link "><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
          <a href="sales.php" class="nav_link"><i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
          <a href="products.php" class="nav_link active"><i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
          <a href="suppliers.php" class="nav_link"><i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
          <a href="customers.php" class="nav_link"><i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers / Users</span> </a>
          <a href="salesReport.php" class="nav_link"><i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Sales Report</span> </a>
          <a href="stocktaking.php" class="nav_link"><i class='bx bx-bell nav_icon'></i> <span class="nav_name">Stocks Taking</span> </a>
          <a href="orders.php" class="nav_link"><i class='bx bxs-package nav_icon'></i> <span class="nav_name">Orders</span> </a>
        </div>
      </div>
      <a href="login.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
  </div>

  <!--Container Main start-->
  <div class="height-100">
    <div class="row">
      <div class="col-md">
        <h1><b>CV-GFOXX Products <i class='bx bx-box'></i></b></h1>
        <?php $date = new DateTime("now", new DateTimeZone('Asia/Manila')); ?>
        <p>Today is <?php echo $date->format('l jS \of F Y'); ?></p>
      </div>
      <div class="col-md clock">
        <span id="LiveTime" class="badge bg-warning text-dark" style="font-size: 20px;"></span>
      </div>
    </div>

    <!-- table sales -->
    <div class="mt-5">
      <div class="row">
        <div class="col-lg-7">
          <h4 class="mt-1 mb-1">Sales Products</h4>
        </div>
        <div class="col-lg-5" style="display: inline-flex;">
          <input type="text" class="form-control" id="searchSalesProducts" onkeyup="search(1)" placeholder="Search product...">
          <span class="input-group-text bg-primary text-white"><i class='bx bx-search-alt-2 nav_logo-icon'></i></span>
        </div>
      </div>

      <div class="tableData overflow-auto">
        <table class="table mt-4 table-hover" id="myTable">
          <thead class="table-dark">
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Category</th>
              <th scope="col">Name</th>
              <th scope="col">Qty. left</th>
              <th scope="col">Purchase</th>
              <th scope="col">Retail</th>
              <th scope="col">Supplier</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require('config.php');
            $query = "SELECT * FROM products";
            $result = mysqli_query($db_link, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>

              <?php
              if ($row['quantity'] <= 20) {
                $getname = $row['name'];
                $prompt = 'the system detect ' . " " . "'" . $row['name'] . "'" . " " . "meet the critical stock level";
                $quant = $row['quantity'];
                $_SESSION['name'] = $prompt;
                $_SESSION['quants'] = $quant;
                $computation = 100 - (int)$quant;
                $_SESSION['compute'] = $computation;
                $results = (int)$computation + (int)$quant;
                $_SESSION['result'] = $results;

                include 'sendemail.php';

              ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                  $(document).ready(function() {
                    Swal.fire({
                      icon: 'warning',
                      title: 'The system detect that one of the product meet the critical stock.',
                      text: 'Check your email to see the details',
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Okay'
                    })
                  })
                </script>
              <?php

                echo "<br>";
              } else {
                // echo ('No detection');
              }
              ?>

              <tr>
                <td><a href="#" class="pop"><img src="uploads/<?= $row['img_url'] ?>" alt=""></a></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['quantity']; ?> pcs.</td>
                <td>Php <?php echo $row['purchase']; ?></td>
                <td>Php <?php echo $row['retail']; ?></td>
                <td><?php echo $row['supplier']; ?></td>
                <td>FAST MOVING</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</button>
                  <a type="button" href="functions.php?delete=<?php echo $row["id"] ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>

              <!--edit Form Modal -->
              <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="functions.php" method="POST">
                        <div class="row">
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <div class="input-group">
                            <div class="input-group-text">Category</div>
                            <select name="category" class="form-select">
                              <option selected><?php echo $row['category']; ?></option>
                              <?php
                              $queryy = "SELECT * FROM products";
                              $resultt = mysqli_query($db_link, $queryy);
                              while ($roww = mysqli_fetch_array($resultt)) {
                                if ($roww['category'] != $row['category']) { ?>
                                  <option><?php echo $roww['category']; ?></option>
                              <?php
                                };
                              }; ?>
                            </select>
                          </div>
                          <div class="input-group mt-2">
                            <div class="input-group-text">Name</div>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                          </div>
                          <div class="input-group mt-2">
                            <div class="input-group-text">Quantity</div>
                            <input type="number" min="0" name="qty" class="form-control" value="<?php echo $row['quantity']; ?>">
                          </div>
                          <div class="input-group mt-2">
                            <div class="input-group-text">Purchase Amount</div>
                            <input type="number" min="0" name="pa" class="form-control" value="<?php echo $row['purchase']; ?>">
                          </div>
                          <div class="input-group mt-2">
                            <div class="input-group-text">Retail</div>
                            <input type="number" min="0" name="retail" class="form-control" value="<?php echo $row['retail']; ?>">
                          </div>
                          <div class="input-group mt-2">
                            <div class="input-group-text">Supplier</div>
                            <select name="suppliers" class="form-select">
                              <option selected><?php echo $row['supplier']; ?></option>
                              <?php
                              $queryPro = "SELECT * FROM supplier";
                              $resultPro = mysqli_query($db_link, $queryPro);
                              while ($rowPro = mysqli_fetch_array($resultPro)) {
                                if ($rowPro['suppliername'] != $row['supplier']) { ?>
                                  <option><?php echo $rowPro['suppliername']; ?></option>
                              <?php
                                };
                              }; ?>
                            </select>
                          </div>
                          <div class="col-md-12 mt-4 mb-2" style="text-align: right;">
                            <button type="submit" name="updateFormProducts" class="btn btn-success">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="no-result-div mt-4 text-center" id="no-search">
        <div class="div">
          <img src="images/search.svg" alt="">
          <h4 class="mt-3">Search not found...</h4>
          <p>Search for names, prices, category, supplier and etc.</p>
        </div>
      </div>
      <button type="button" class="btn btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product <i class='bx bx-plus nav_icon' style="transform: translateY(3px);"></i></button>
    </div>
  </div>
  </div>


  <!--add product Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="functions.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <label for="productCategory" class="form-label">Category</label>
                <select name="productCategory" class="form-select">
                  <option selected>Health and Wellness</option>
                  <option>Beauty and Cosmetics</option>
                  <option>Weight Management</option>
                </select>
              </div>
              <div class="col-md-12 mt-2">
                <label for="img" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="pImg" name="my_image" required>
              </div>
              <div class="col-md-12 mt-2">
                <label for="productName" class="form-label">Name</label>
                <input type="text" class="form-control" id="pName" name="productName" placeholder="...">
              </div>
              <div class="col-md-12 mt-2">
                <label for="productQty" class="form-label">Quantity</label>
                <input type="number" min="20" class="form-control" id="pQty" name="productQty" placeholder="20">
              </div>
              <div class="col-md-12 mt-2">
                <label for="productPurchaseAmount" class="form-label">Purchase Amount</label>
                <input type="number" min="0" class="form-control" id="pPa" name="productPurchaseAmount" placeholder="0">
              </div>
              <div class="col-md-12 mt-2">
                <label for="productRetail" class="form-label">Retail</label>
                <input type="number" min="0" class="form-control" id="pRetail" name="productRetail" placeholder="0">
              </div>
              <div class="col-md-12 mt-2">
              <select name="productSupplier" class="form-select">
                  <?php
                  $queryPro = "SELECT * FROM supplier";
                  $resultPro = mysqli_query($db_link, $queryPro);
                  while ($rowPro = mysqli_fetch_array($resultPro)) {
                    if ($rowPro['suppliername'] != $row['supplier']) { ?>
                      <option><?php echo $rowPro['suppliername']; ?></option>
                  <?php
                    };
                  }; ?>
                </select>
              </div>
              <div class="col-md-12 mt-4 mb-2" style="text-align: right;">
                <button type="submit" name="addProduct" value="Upload" class="btn btn-primary">Add Product</button>
                <button class="btn btn-secondary" onclick="clearProductsForm()">Clear</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- image modal -->
  <div class="modal fade" id="imagemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="" class="imagepreview" style="width: 100%;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>