<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/styles.css">
 <title>Stocks Taking</title>
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
     <a href="stocktaking.php" class="nav_link active"><i class='bx bx-bell nav_icon'></i> <span class="nav_name">Stocks Taking</span> </a>
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
    <h1><b>CV-GFOXX Stocks Taking <i class='bx bx-receipt'></i></b></h1>
    <?php $date = new DateTime("now", new DateTimeZone('Asia/Manila')); ?>
    <p>Today is <?php echo $date->format('l jS \of F Y'); ?></p>
   </div>
   <div class="col-md clock">
    <span id="LiveTime" class="badge bg-warning text-dark" style="font-size: 20px;"></span>
   </div>
  </div>

  <!-- table stocks taking -->
  <div class="mt-5">
   <div class="row">
    <div class="col-lg-7">
     <h4 class="mt-1 mb-1">Stocks Taking Table</h4>
    </div>
    <div class="col-lg-5" style="display: inline-flex;">
     <input type="text" class="form-control" id="searchSales" onkeyup="search(0)" placeholder="Search product...">
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
       <th scope="col">Price</th>
       <th scope="col">Qty. left</th>
       <th scope="col">Supplier</th>
       <th scope="col">Pick Order</th>
       <th scope="col">Add Stock</th>
      </tr>
     </thead>
     <tbody>
      <?php
      require('config.php');
      $query = "SELECT * FROM products WHERE quantity <=20 ";
      $result = mysqli_query($db_link, $query);
      while ($row = mysqli_fetch_array($result)) {
      ?>

       <tr>
        <td><a href="#" class="pop"><img src="uploads/<?= $row['img_url'] ?>" alt=""></a></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td>Php <?php echo $row['retail']; ?></td>
        <td><?php echo $row['quantity']; ?> pcs.</td>
        <td><?php echo $row['supplier']; ?></td>
        <td><button type="button" data-bs-toggle="modal" data-bs-target="#salesModal<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Request Order</button></td>
        <td><button type="button" data-bs-toggle="modal" data-bs-target="#confirm<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Confirm Order</button></td>
   
       </tr>

         <!-- confirmation modal -->
        <div class="modal fade" id="confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation of order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h3>You are now confirming the order you requested in your supplier</h3> <br>
            <h3>The product is: <?php echo $row['name']; ?></h3>
            </div>
            <div class="modal-footer">
                <form action="functions.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <button type="submit" class="btn btn-success" name="orderConfirm">Confirm Order</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
        </div>

       <!--Form Modal -->
       <div class="modal fade" id="salesModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Confirm Order Form</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <form action="sendemail_supplier.php" method="POST">
            <div class="row">
             <div class="col-md-12">
              <p><b>Date:</b> <?php echo $date->format('Y/m/d'); ?></p>
              <input type="hidden" name="curDate" value="<?php echo $date->format('Y/m/d'); ?>">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
             </div>
             <div class="col-md-12">
              <p><b>Category:</b> <?php echo $row['category']; ?></p>
              <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
             </div>
             <div class="col-md-12">
              <p><b>Product Name:</b> <?php echo $row['name']; ?></p>
              <input type="hidden" name="pName" id="Name" value="<?php echo $row['name']; ?>">
             </div>
             <div class="col-md-12">
              <p><b>Retail:</b> Php <?php echo $row['retail']; ?></p>
              <input type="hidden" name="retail" value="<?php echo $row['retail']; ?>">
             </div>
             <div class="col-md-12">
              <input type="hidden" name="stocks" value="<?php echo $row['quantity']; ?>">
             </div>
             <div class="input-group">
              <div class="input-group-text">Qty. to be ordered</div>
              <input type="number" min="1" name="qtytobeordered" value="" class="form-control" id="qtytobeordered" required>
             </div>
             <p class="mt-3"><b>Attention:</b> Once you confirm the order the product will be automatically ordered to its supplier with the quantity that you specify above.</p>
             <div class="col-md-12 mt-4 mb-2" style="text-align: right;">
              <button name="submitSupplierForm" id="request" class="btn btn-primary">Send Request</button>
              <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
             </div>
            </div>
           </form>
          </div>
         </div>
        </div>
       </div>
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