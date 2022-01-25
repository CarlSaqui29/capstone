<?php
session_start();
?>
<HTML>

<HEAD>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <TITLE>My Orders</TITLE>
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
        <a href="product_catalogue.php" class="btn btn-primary" style="transform: translateY(8px);">Home</a> 
        <a href="index.php" class="btn btn-warning" style="transform: translateY(8px);">Logout <i class='bx bx-log-out'></i></a>
        <!-- <a href="" style="color:#ffc107; font-size: 25px;  text-decoration: none;" class="">Logout <i class='bx bx-log-out'></i></a> -->
      </form>
    </div>
  </nav>

    <br>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-5">Orders:</h3>
        </div>
    </div>
    <br>
    <div class="container" style="background-color: #C5C5C5">  
        <div class="tableData overflow-auto">
            <table class="table mt-4 table-hover" id="orb">
            <thead class="table-dark">
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">MOP</th>
                <th scope="col">Status</th>
                <th scopr="col">Tracking Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require('config.php');
                    $getUsername = $_SESSION['name'];
                    $query = "SELECT * FROM myorders WHERE username='$getUsername'";
                    $result = mysqli_query($db_link, $query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['dates'];?></td>
                    <td><?php echo $row['product'];?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['mop']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['trackno']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
      
</BODY>

</HTML>