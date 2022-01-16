<!DOCTYPE html>
<html lang="en">
<?php require('config.php'); ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>CV-GFOXX</title>
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
          <a href="dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
          <a href="sales.php" class="nav_link"> <i class='bx bx-cart nav_icon'></i> <span class="nav_name">Sales</span> </a>
          <a href="products.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
          <a href="suppliers.php" class="nav_link"> <i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
          <a href="customers.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers / Users</span> </a>
          <a href="salesReport.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Sales Report</span> </a>
          <a href="stocktaking.php" class="nav_link"><i class='bx bx-bell nav_icon'></i> <span class="nav_name">Stocks Taking</span> </a>
          <a href="orders.php" class="nav_link"><i class='bx bxs-package nav_icon'></i> <span class="nav_name">Orders</span> </a>
        </div>
      </div>
      <a href="login.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
  </div>
  <!--Container Main start-->
  <div class="height-100 dashboard">
    <div class="row">
      <div class="col-md">
        <h1><b>Hello Admin! 😎</b></h1>
        <?php $date = new DateTime("now", new DateTimeZone('Asia/Manila')); ?>
        <p>Today is <?php echo $date->format('l jS \of F Y'); ?></p>
      </div>
      <div class="col-md clock">
        <span id="LiveTime" class="badge bg-warning text-dark" style="font-size: 20px;"></span>
      </div>
    </div>
    <div class="mt-4 p-2">
      <div class="row">
        <div class="col-lg-7 mb-3 " style="margin-right: 20px;">
          <div class="row intro-mark pb-5">
            <div class="col-xl mt-5 ">
              <h1>Monitor Your <br> Business Everyday</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <a href="salesReport.php">Go To Sales Report</a>
            </div>
            <div class="col-xl d-flex aligns-items-center justify-content-center mt-5">
              <img src="images/deliver.svg" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-3 profits">
          <p>Total Sales Profit</p>
          <?php
          $q = "SELECT * FROM sales";
          $r = mysqli_query($db_link, $q);
          $profits = 0;
          while ($row = mysqli_fetch_array($r)) {
            $profits += (int)$row['profit'];
          }
          ?>
          <h1>₱ <?php echo $profits ?>.00</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 box-1" style="margin-right: 20px;">
          <h2>Products Quantity Left</h2>
          <div class="box-1-inner">
            <?php

            $query = "SELECT * FROM products";
            $result = mysqli_query($db_link, $query);

            // status
            $qry1 = "SELECT COUNT(*) as Total FROM orders WHERE status = 'DELIVERED'";
            $result1 = mysqli_query($db_link, $qry1);
            $row1 = mysqli_fetch_row($result1);

            $qry2 = "SELECT COUNT(*) as Total FROM orders WHERE status = 'SHIPPED'";
            $result2 = mysqli_query($db_link, $qry2);
            $row2 = mysqli_fetch_row($result2);

            $qry3 = "SELECT COUNT(*) as Total FROM orders WHERE status = 'RETURNED'";
            $result3 = mysqli_query($db_link, $qry3);
            $row3 = mysqli_fetch_row($result3);

            while ($row = mysqli_fetch_array($result)) {
            ?>
              <h4><span class="badge bg-secondary"><?php echo $row['quantity']; ?></span><?php echo $row['name']; ?></h4>
              <p><?php echo $row['category']; ?></p>
            <?php
            } ?>
          </div>
        </div>
        <div class="col-xl-4 box-1 box-2">
          <h2>Products Status</h2>
          <div class="box-1-inner">
            <div class="card_">
              <h3><span class="badge bg-success" style="position: relative; top: 10px !important;"><?php echo $row1[0]; ?></span> Delivered</h3>
              <p>Successful product delivered</p>
            </div>
            <div class="card_">
              <h3><span class="badge bg-success" style="position: relative; top: 10px !important;"><?php echo $row2[0]; ?></span> Shipped</h3>
              <p>On the way products</p>
            </div>
            <div class="card_">
              <h3><span class="badge bg-success" style="position: relative; top: 10px !important;"><?php echo $row3[0]; ?></span> Return</h3>
              <p>Returned products</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div style="overflow-x: auto;">
            <div class="py-4 pt-5 cont-graph" style="width: 100%; min-width: 800px;">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "http://localhost/New POSsystem/capstone/data.php",
        type: "GET",
        success: function(datas) {
          myObject = JSON.parse(datas);
          let nameOfProduct = [];
          let jan = [];
          let feb = [];
          let mar = [];
          let apr = [];
          let may = [];
          let jun = [];
          let jul = [];
          let aug = [];
          let sep = [];
          let oct = [];
          let nov = [];
          let dec = [];

          for (var i in myObject) {
            nameOfProduct.push(myObject[i].nameOfProduct);
            jan.push(parseInt(myObject[i].january));
            feb.push(parseInt(myObject[i].february));
            mar.push(parseInt(myObject[i].march));
            apr.push(parseInt(myObject[i].april));
            may.push(parseInt(myObject[i].may));
            jun.push(parseInt(myObject[i].june));
            jul.push(parseInt(myObject[i].july));
            aug.push(parseInt(myObject[i].august));
            sep.push(parseInt(myObject[i].september));
            oct.push(parseInt(myObject[i].october));
            nov.push(parseInt(myObject[i].november));
            dec.push(parseInt(myObject[i].december));
          }
          let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
          colors = ['rgb(255, 99, 132)', 'rgb(0, 0, 132)', 'rgb(24, 196, 157)', 'rgb(29, 24, 196)', 'rgb(196, 24, 58)', 'rgb(30, 4, 9)', 'rgb(104, 240, 27)', 'rgb(240, 224, 27)']
          dataset = [];
          for (let i = 0; i < nameOfProduct.length; i++) {
            dataset.push({
              label: nameOfProduct[i],
              backgroundColor: colors[i],
              borderColor: colors[i],
              data: [jan[i], feb[i], mar[i], apr[i], may[i], jun[i], jul[i], aug[i], sep[i], oct[i], nov[i], dec[i]]
            })
          }
          const data = {
            labels: months,
            datasets: dataset
          }
          var ctx = $("#myChart");
          var LineGraph = new Chart(ctx, {
            type: 'bar',
            data: data
          });
        },
        error: function(data) {
          console.log('error getting data in salesreport table.')
        }
      });
    });
  </script>
</body>


</html>