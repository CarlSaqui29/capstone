<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>Analytics Report</title>
  <style>
    /* #myChart2 {
      display: none !important;
    } */
  </style>
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
          <a href="sales.php" class="nav_link"> <i class='bx bx-cart-alt nav_icon'></i></i> <span class="nav_name">Sales</span> </a>
          <a href="products.php" class="nav_link"> <i class='bx bx-food-menu nav_icon'></i> <span class="nav_name">Products</span> </a>
          <a href="suppliers.php" class="nav_link"> <i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Suppliers</span> </a>
          <a href="customers.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Customers / Users</span> </a>
          <a href="salesReport.php" class="nav_link active"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Sales Report</span> </a>
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
        <h1><b>Sales Report <i class='bx bx-doughnut-chart'></i></b></h1>
        <?php $date = new DateTime("now", new DateTimeZone('Asia/Manila')); ?>
        <p>Today is <?php echo $date->format('l jS \of F Y'); ?></p>
      </div>
      <div class="col-md clock">
        <span id="LiveTime" class="badge bg-warning text-dark" style="font-size: 20px;"></span>
      </div>
    </div>
    <!-- see data.php -->

    <div class="container mt-5" style="overflow-x: auto;">
      <div style="width: 100%; min-width: 800px;">
        <canvas id="myChart"></canvas>
        <canvas id="myChart1" style="display: none;"></canvas>
        <canvas id="myChart2" style="display: none;"></canvas>
      </div>
    </div>


    <div class="container text-center mt-5">
      <button class="btn btn-primary mx-1" onclick="display()">Monthly</button>
      <button class="btn btn-primary mx-1" onclick="display0()">Weekly</button>
      <button class="btn btn-primary mx-1" onclick="display1()">Daily</button>
    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    function display() {
      $("#myChart").css("display", "block");
      $("#myChart1").css("display", "none");
      $("#myChart2").css("display", "none");
    }

    function display0() {
      $("#myChart1").css("display", "block");
      $("#myChart").css("display", "none");
      $("#myChart2").css("display", "none");
    }

    function display1() {
      $("#myChart").css("display", "none");
      $("#myChart1").css("display", "none");
      $("#myChart2").css("display", "block");
    }
    $(document).ready(function() {
      $.ajax({
        url: "http://localhost/Projects/final_capstone/capstone/data.php",
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
            type: 'line',
            data: data
          });
        },
        error: function(data) {
          console.log('error getting data in salesreport table.')
        }
      });
    });
    $(document).ready(function() {
      $.ajax({
        url: "http://localhost/Projects/final_capstone/capstone/data2.php",
        type: "GET",
        success: function(datas) {
          myObject = JSON.parse(datas);
          let nameOfProduct = [];
          let mon = [];
          let tue = [];
          let wed = [];
          let thu = [];
          let fri = [];
          let sat = [];
          let sun = [];

          for (var i in myObject) {
            nameOfProduct.push(myObject[i].nameOfProduct);
            mon.push(parseInt(myObject[i].monday));
            tue.push(parseInt(myObject[i].tuesday));
            wed.push(parseInt(myObject[i].wednesday));
            thu.push(parseInt(myObject[i].thursday));
            fri.push(parseInt(myObject[i].friday));
            sat.push(parseInt(myObject[i].saturday));
            sun.push(parseInt(myObject[i].sunday));
          }
          let days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
          colors = ['rgb(255, 99, 132)', 'rgb(0, 0, 132)', 'rgb(24, 196, 157)', 'rgb(29, 24, 196)', 'rgb(196, 24, 58)', 'rgb(30, 4, 9)', 'rgb(104, 240, 27)', 'rgb(240, 224, 27)']
          dataset = [];
          for (let i = 0; i < nameOfProduct.length; i++) {
            dataset.push({
              label: nameOfProduct[i],
              backgroundColor: colors[i],
              borderColor: colors[i],
              data: [mon[i], tue[i], wed[i], thu[i], fri[i], sat[i], sun[i]]
            })
          }
          const data = {
            labels: days,
            datasets: dataset
          }
          var ctx = $("#myChart2");
          var LineGraph = new Chart(ctx, {
            type: 'line',
            data: data
          });
        },
        error: function(data) {
          console.log('error getting data in salesreport table.')
        }
      });
    });
    $(document).ready(function() {
      $.ajax({
        url: "http://localhost/Projects/final_capstone/capstone/data3.php",
        type: "GET",
        success: function(datas) {
          myObject = JSON.parse(datas);
          let nameOfProduct = [];
          let week1 = [];
          let week2 = [];
          let week3 = [];
          let week4 = [];

          for (var i in myObject) {
            nameOfProduct.push(myObject[i].nameOfProduct);
            week1.push(parseInt(myObject[i].week1));
            week2.push(parseInt(myObject[i].week2));
            week3.push(parseInt(myObject[i].week3));
            week4.push(parseInt(myObject[i].week4));
          }
          let weeks = ['Week1', 'Week2', 'Week3', 'Week4']
          colors = ['rgb(255, 99, 132)', 'rgb(0, 0, 132)', 'rgb(24, 196, 157)', 'rgb(29, 24, 196)', 'rgb(196, 24, 58)', 'rgb(30, 4, 9)', 'rgb(104, 240, 27)', 'rgb(240, 224, 27)']
          dataset = [];
          for (let i = 0; i < nameOfProduct.length; i++) {
            dataset.push({
              label: nameOfProduct[i],
              backgroundColor: colors[i],
              borderColor: colors[i],
              data: [week1[i], week2[i], week3[i], week4[i]]
            })
          }
          const data = {
            labels: weeks,
            datasets: dataset
          }
          var ctx = $("#myChart1");
          var LineGraph = new Chart(ctx, {
            type: 'line',
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