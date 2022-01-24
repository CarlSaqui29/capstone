<?php
session_start();
require_once("config.php");
$db_handle = new DBController();

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST["quantity"])) {
        $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
        $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["retail"], 'image' => $productByCode[0]["img_url"]));

        if (!empty($_SESSION["cart_item"])) {
          if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
              if ($productByCode[0]["code"] == $k) {
                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
            }
          } else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
          }
        } else {
          $_SESSION["cart_item"] = $itemArray;
        }
      }
      break;
    case "remove":
      if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
          if ($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);
          if (empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
        }
      }
      break;
    case "empty":
      unset($_SESSION["cart_item"]);
      break;
  }
}
?>
<HTML>

<HEAD>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <TITLE>CV-GFOXX Products</TITLE>
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
        <a href="" class="btn btn-primary" style="transform: translateY(8px);">My Orders</a> 
        <a href="index.php" class="btn btn-warning" style="transform: translateY(8px);">Logout <i class='bx bx-log-out'></i></a>
        <!-- <a href="" style="color:#ffc107; font-size: 25px;  text-decoration: none;" class="">Logout <i class='bx bx-log-out'></i></a> -->
      </form>
    </div>
  </nav>

    <br>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-5">Welcome, <?php echo $_SESSION['name']; ?>  <i class="fas fa-user"></i></h3>
        </div>
      </div>

      
  <div id="shopping-cart" class="container">
    <div class="txt-heading">Shopping Cart</div> <br>
    <?php
    if (isset($_SESSION["cart_item"])) {
      $total_quantity = 0;
      $total_price = 0;
    ?>
      <div class="catalogue-table overflow-auto">
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
          <tbody>
            <tr>
              <th style="text-align:left;">Name</th>
              <th style="text-align:left;">Code</th>
              <th style="text-align:right;" width="5%">Quantity</th>
              <th style="text-align:right;" width="10%">Unit Price</th>
              <th style="text-align:right;" width="10%">Price</th>
              <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item) {
              $item_price = $item["quantity"] * $item["price"];
            ?>
              <tr>
                <td><?php echo $item["name"]; ?></td>
                <td><?php echo $item["code"]; ?></td>
                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                <td style="text-align:right;"><?php echo "P " . $item["price"]; ?></td>
                <td style="text-align:right;"><?php echo "P " . number_format($item_price, 2); ?></td>
                <td style="text-align:center;"><a style="color: red; font-size: 25px;" href="product_catalogue.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><i class='bx bxs-trash'></i></a></td>
              </tr>
            <?php
              $total_quantity += $item["quantity"];
              $total_price += ($item["price"] * $item["quantity"]);
            ?>
            <?php
              $getSessionName = $_SESSION['name'];
              $checking = "SELECT * FROM user_acc WHERE username='$getSessionName'";
              $prompt = $db_link->query($checking);
              $row = mysqli_num_rows($prompt);
              $getData = mysqli_fetch_array($prompt);

              $getFname = $getData['firstname'];
              $getMname = $getData['middlename'];
              $getLname = $getData['lastname'];
              $getEmail = $getData['email'];
              $getContact = $getData['contact'];
            }
            ?>
            <form action="checkout.php" method="POST">
              <input type="hidden" name="fname" value="<?php echo $getFname?>">
              <input type="hidden" name="mname" value="<?php echo $getMname?>">
              <input type="hidden" name="lname" value="<?php echo $getLname?>">
              <input type="hidden" name="emails" value="<?php echo $getEmail?>">
              <input type="hidden" name="contacts" value="<?php echo $getContact?>">
              <input type="hidden" name="totals" value="<?php echo $total_price?>">
              <a id="btnEmpty" class="btn btn-danger mb-3" href="product_catalogue.php?action=empty">Empty Cart</a>
              <button type="submit" class="btn btn-warning mb-3 mx-2" name="checkout">Checkout</button>
            </form>
            <tr>
              <td colspan="2" align="right">Total:</td>
              <td align="right"><?php echo $total_quantity; ?></td>
              <td align="right" colspan="2"><strong><?php echo "P " . number_format($total_price, 2); ?></strong></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    <?php
    } else {
    ?>
      <div class="no-records">Your Cart is Empty</div>
    <?php
    }
    ?>
  </div>
    <br> <br>
  <div id="product-grid" class="container">
    <div class="txt-heading">Products</div>
    <div style="display: inline-flex;">


      <?php
      $product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
      if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
      ?>

          <div class="card " style="width: 18rem; margin: 10px;">
            <form method="post" action="product_catalogue.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
              <img src="uploads/<?php echo $product_array[$key]["img_url"]; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $product_array[$key]["name"]; ?></h5>
                <p class="card-text"><?php echo "PHP " . $product_array[$key]["retail"]; ?></p>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Quantity</span>
                  <input type="number" value="1" name="quantity" min="1" class="form-control" aria-describedby="basic-addon1">
                </div>
                <input type="submit" value="Add to Cart" class="btn btn-primary w-100" />
              </div>
            </form>
          </div>

      <?php
        }
      }
      ?>
    </div>
  </div>
</BODY>

</HTML>