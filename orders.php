<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/styles.css">
 <title>Orders</title>
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
     <a href="products.php" class="nav_link"><i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
     <a href="suppliers.php" class="nav_link"><i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
     <a href="customers.php" class="nav_link"><i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers</span> </a>
     <a href="salesReport.php" class="nav_link"><i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Sales Report</span> </a>
     <a href="stocktaking.php" class="nav_link"><i class='bx bx-bell nav_icon'></i> <span class="nav_name">Stocks Taking</span> </a>
     <a href="orders.php" class="nav_link active"><i class='bx bxs-package nav_icon'></i> <span class="nav_name">Orders</span> </a>
    </div>
   </div>
   <a href="login.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
  </nav>
 </div>

 <!--Container Main start-->
 <div class="height-100">
  <div class="row">
   <div class="col-md">
    <h1><b>CV-GFOXX Orders <i class='bx bx-box'></i></b></h1>
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
     <h4 class="mt-1 mb-1">Orders Table</h4>
    </div>
    <div class="col-lg-5" style="display: inline-flex;">
     <input type="text" class="form-control" id="searchOrders" onkeyup="searchOrders()" placeholder="Search orders...">
     <span class="input-group-text bg-primary text-white"><i class='bx bx-search-alt-2 nav_logo-icon'></i></span>
    </div>
   </div>

   <div class="tableData overflow-auto">
    <table class="table mt-4 table-hover" id="myTableOrders">
     <thead class="table-dark">
      <tr>
       <th scope="col">Name</th>
       <th scope="col">FB Name</th>
       <th scope="col">Concern</th>
       <th scope="col">Question</th>
       <th scope="col">Mobile #</th>
       <th scope="col">Other Mobile #</th>
       <th scope="col">Address</th>
       <th scope="col">Landmark</th>
       <th scope="col">Province</th>
       <th scope="col">City</th>
       <th scope="col">Barangay</th>
       <th scope="col">Bottles</th>
       <th scope="col">Receive Call</th>
       <th scope="col">MOP</th>
       <th scope="col">Note</th>
      </tr>
     </thead>
     <tbody>
     <?php
      require('config.php');
      $query = "SELECT * FROM orders";
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
       <td><?php echo $row['landmark']; ?></td>
       <td><?php echo $row['province']; ?></td>
       <td><?php echo $row['city']; ?></td>
       <td><?php echo $row['barangay']; ?></td>
       <td><?php echo $row['bottles']; ?></td>
       <td><?php echo $row['receivecall']; ?></td>
       <td><?php echo $row['mop']; ?></td>
       <td><?php echo $row['note']; ?></td>
      </tr>
      <?php
      } ?>
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
  </div>
 </div>
 </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="js/app.js"></script>
</body>

</html>