<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/styles.css">
 <title>Customers</title>
</head>

<body id="body-pd" class="bg-light">
 <header class="header" id="header">
  <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
 </header>
 <div class="l-navbar" id="nav-bar">
  <nav class="nav">
   <div>
    <a href="dashboard.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">CV-GFOXX</span> </a>
    <div class="nav_list">
     <a href="dashboard.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
     <a href="sales.php" class="nav_link"> <i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
     <a href="products.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
     <a href="suppliers.php" class="nav_link"> <i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
     <a href="customers.php" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers / Users</span> </a>
     <a href="salesReport.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Sales Report</span> </a>
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
    <h1><b>CV-GFOXX Customers & Users <i class='bx bx-user'></i></b></h1>
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
     <h4 class="mt-1 mb-1">Customer Information Table</h4>
    </div>
    <div class="col-lg-5" style="display: inline-flex;">
     <input type="text" class="form-control" id="searchCustomer" onkeyup="search(3)" placeholder="Search product...">
     <span class="input-group-text bg-primary text-white"><i class='bx bx-search-alt-2 nav_logo-icon'></i></span>
    </div>
   </div>

   <div class="tableData overflow-auto">
    <table class="table mt-4 table-hover" id="myTable">
     <thead class="table-dark">
      <tr>
       <th scope="col">Name</th>
       <th scope="col">FB Name</th>
       <th scope="col">Concern</th>
       <th scope="col">Question</th>
       <th scope="col">Mobile #</th>
       <th scope="col">Other Mobile #</th>
       <th scope="col">Address</th>
       <th scope="col">Note</th>
       <th scope="col">Action</th>
      </tr>
     </thead>
     <tbody>
      <?php
      require('config.php');
      $query = "SELECT * FROM customers";
      $result = mysqli_query($db_link, $query);
      while ($row = mysqli_fetch_array($result)) {
      ?>
       <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['fbname']; ?></td>
        <td><?php echo $row['concern']; ?></td>
        <td><?php echo $row['question']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['extraphone']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['note']; ?></td>
        <td><a type="button" class="btn btn-sm btn-danger" href="functions.php?deleteCustomer=<?php echo $row["id"] ?>">Delete</a></td>
       </tr>
      <?php }; ?>
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
   <!-- <button type="button" class="btn btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Customer <i class='bx bx-user nav_icon' style="transform: translateY(3px);"></i></button> -->
   <button type="button" class="btn btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#adduserModal">Add Users <i class='bx bx-plus nav_icon' style="transform: translateY(3px);"></i></button>
   <button type="button" class="btn btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#viewuserModal">View Users <i class='bx bx-user nav_icon' style="transform: translateY(3px);"></i></button>
  </div>
 </div>

 <!-- Modal
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add Customer Form</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <form action="functions.php" method="POST">
      <div class="row">
       <div class="col-md-12 mt-2">
        <label for="customerName" class="form-label">Name</label>
        <input type="text" class="form-control" id="cName" name="customerName" placeholder="..." required>
       </div>
       <div class="col-md-12 mt-2">
        <label for="customerContact" class="form-label">Contact</label>
        <input type="text" class="form-control" id="cC" name="customerContact" placeholder="..." required>
       </div>
       <div class="col-md-12 mt-2">
        <label for="customerAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="cAddress" name="customerAddress" placeholder="..." required>
       </div>
       <div class="col-md-12 mt-2">
        <label for="customerNote" class="form-label">Note</label>
        <textarea class="form-control" id="cNote" placeholder="Leave a Note here" name="customerNote" style="height: 100px" required></textarea>
       </div>
       <div class="col-md-12 mt-4 mb-2" style="text-align: right;">
        <button class="btn btn-primary" type="submit" name="addCustomer">Add Customer</button>
        <button class="btn btn-secondary" onclick="clearCustomerForm()">Clear</button>
       </div>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div> -->



 <!--Modal Add User-->
 <div class="modal fade" id="adduserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="functions.php" method="POST">
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput" class="form-label">Username</label>
              <input type="text" id="user" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput2" class="form-label">Access</label>
              <select name="access" id="" class="form-select">
                <option value="Admin">Admin</option>
                <option value="Salesperson">Salesperson</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput3" class="form-label">Password</label>
              <input type="password" id="pass1" name="password1" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput4" class="form-label">Re-Type Password</label>
              <input type="password" id="pass2" name="password2" class="form-control" placeholder="Retype Password" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn btn-warning mt-2" style="width: 100%;" name="addUser">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!--Modal View User-->
 <div class="modal fade" id="viewuserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="tableData overflow-auto">
                <table class="table mt-4 table-hover" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Access</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require('config.php');
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($db_link, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['access']; ?></td>
                    </tr>
            <?php }; ?>
            </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="js/app.js"></script>
</body>

</html>