<?php
session_start();
require_once("config.php");
?>
<HTML>

<HEAD>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <TITLE>Checkout</TITLE>
  <link href="css/styles.css" type="text/css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 0;
      box-sizing: border-box;
      margin: 0;
    }
  </style>
</HEAD>

<BODY>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #222222 !important; color: #ffc107 !important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color:#ffc107;">CV-GFOXX</a>

      <form class="d-flex">
        <a href="myorders.php" class="btn btn-primary" style="transform: translateY(8px);">My Orders</a> 
        <a href="index.php" class="btn btn-warning" style="transform: translateY(8px);">Logout <i class='bx bx-log-out'></i></a>
        <!-- <a href="" style="color:#ffc107; font-size: 25px;  text-decoration: none;" class="">Logout <i class='bx bx-log-out'></i></a> -->
      </form>
    </div>
  </nav>

    <br>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-5">You have successfully placed your order:</h3>
        </div>
    </div>
    <br>
    <div class="container" style="background-color: #C5C5C5">  
    <br>
       <div class="container">
           <div class="row">
               <div class="col">
                    <h4>Fullname: <?php echo  $_SESSION['firstname']; ?>  <?php echo  $_SESSION['middlename']; ?> <?php echo  $_SESSION['lastname']; ?> </h4>
                    <h4>Email: <?php echo  $_SESSION['email'] ; ?></h4>
                    <h4>Contact: <?php echo  $_SESSION['contact']; ?></h4>
                    <h4>Mop: <?php echo $_SESSION['mop']; ?></h4>
                    <h4>Status: NEW</h4>
                    <h4>Total Payment: P<?php echo  $_SESSION['total']; ?></h4>
                    <br>
                    <h4>Thank You, have a nice day!</h4>
                </div>

           </div>
           <br>
       </div>
    <br>
        <div class="text-center">
            <a href="myorders.php" class="btn btn-success w-100">Check My Orders</button>
            <a href="product_catalogue.php?action=empty" type="button" class="btn btn-primary w-100">Back</a>
        </div>
        <br>
    </div>
      
</BODY>

</HTML>