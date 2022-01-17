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
    <a href="dashboardsales.php" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">CV-GFOXX</span> </a>
    <div class="nav_list">
     <a href="dashboardsales.php" class="nav_link "><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
     <a href="sales1.php" class="nav_link"><i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
     <a href="orders1.php" class="nav_link active"><i class='bx bxs-package nav_icon'></i> <span class="nav_name">Orders</span> </a>
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
      <br>
      <h6>*For updating the status please select a status then click the update button to update the status.*</h6>
      <h6>*Tracking Number is for shipped status only*</h6>
      <select class="btn btn-success" id="filter_" onchange="getItems(this.value)">
        <option value="" selected>All</option>
        <option value="NEW">NEW</option>
        <option value="CONFIRMED">CONFIRMED</option>
        <option value="PAID">PAID</option>
        <option value="SHIPPED">SHIPPED</option>
        <option value="DELIVERED">DELIVERED</option>
        <option value="RETURNED">RETURNED</option>
      </select>
      <div class="tableData overflow-auto">
        <table class="table mt-4 table-hover" id="orb">
          <thead class="table-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Receive Call</th>
              <th scope="col">MOP</th>
              <th scope="col">IMAGE</th>
              <th scope="col">Note</th>
              <th scope="col">Status</th>
              <th scopr="col">Tracking Number</th>
              <th scope="col">Edit Status</th>
              <th scope="col">Submit Status</th>
              <th scope="col">Add Tracking Number</th>
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
                <td><?php echo $row['products']?></td>
                <td><?php echo $row['bottles']; ?></td>
                <td><?php echo $row['receivecall']; ?></td>
                <td><?php echo $row['mop']; ?></td>
                <?php
                $str = $row['mop'];
                $getStr = explode(" ", $str)[2];
                ?>
                <td><a href="#" class="pop"><img src="screenshots/<?= $getStr ?>" alt=""></a></td>
                <td><?php echo $row['note']; ?></td>
                <form action="functions.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="quan" value="<?php echo $row['bottles']; ?>">
                  <input type="hidden" name="prods" value="<?php echo $row['products']; ?>">
                  <?php
                      $querys = "SELECT * FROM products";
                      $results = mysqli_query($db_link, $querys);
                      while ($rows = mysqli_fetch_array($results)){
                      ?>
                      <input type="hidden" name="curQty" value="<?php echo $rows['quantity'];?>">
                      <?php
                      }
                    ?>
                  <td>
                    <?php echo $row['status']; ?>
                  </td>
                  <td><?php echo $row['trackno']; ?></td>
                  <td>
                    <select class="btn btn-secondary" name="stats" id="">
                      <option value="" disabled selected><?php echo $row['status']; ?></option>
                      <option value="NEW">NEW</option>
                      <option value="CONFIRMED">CONFIRMED</option>
                      <option value="PAID">PAID</option>
                      <option value="SHIPPED">SHIPPED</option>
                      <option value="DELIVERED">DELIVERED</option>
                      <option value="RETURNED">RETURNED</option>
                    </select>
                  </td>
                  <td><button type="submit" class="btn btn-success" name="updtStatSP">Update</button></td>
                  </form>
                  <td>
                    <form action="functions.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <input type="hidden" name="curDate" value="<?php echo $date->format('Y/m/d'); ?>">
                      <input type="hidden" name="customer" value="<?php echo $row['name']; ?>">
                      <input type="hidden" name="prods" value="<?php echo $row['products']; ?>">
                      <input type="hidden" name="quan" value="<?php echo $row['bottles']; ?>">
                      <input type="hidden" name="stats" value="<?php echo $row['status']; ?>">
                      <input type="number" class="form-control" name="trackno" required>
                      <button class="btn btn-primary form-control" type="submit" name="addTracknoSP">Add</button>
                    </form>
                  </td>
              
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