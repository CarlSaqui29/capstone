<?php
session_start();
require_once("config.php");

if (isset($_POST['checkout'])) {
  $getItems = $_SESSION["cart_item"];
  $getFname = $_POST['fname'];
  $getMname = $_POST['mname'];
  $getLname = $_POST['lname'];
  $getEmail = $_POST['emails'];
  $getContact = $_POST['contacts'];
  $getTotal = $_POST['totals'];
}
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
      <a href="" class="btn btn-primary" style="transform: translateY(8px);">My Orders</a> 
        <a href="index.php" class="btn btn-warning" style="transform: translateY(8px);">Logout <i class='bx bx-log-out'></i></a>
        <!-- <a href="" style="color:#ffc107; font-size: 25px;  text-decoration: none;" class="">Logout <i class='bx bx-log-out'></i></a> -->
      </form>
    </div>
  </nav>

    <br>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-5">Order Details:</h3>
        </div>
    </div>
    <br>
    <div class="container" style="background-color: #C5C5C5">  
    <br>
       <div class="container">
           <div class="row">
               <div class="col-sm-4">
               <form action="functions.php" method="POST" enctype="multipart/form-data">
                <?php $date = new DateTime("now", new DateTimeZone('Asia/Manila')); ?>
                <input type="hidden" name="dates" value="<?php echo $date->format('Y/m/d'); ?>">
                <input type="hidden" id="fname" name="first"  value="<?php echo $getFname; ?>" >
                <input type="hidden" id="mname" name="middle"  value="<?php echo $getMname; ?>" >
                <input type="hidden" id="lname"  name="last" value="<?php echo $getLname; ?>" >
                <input type="hidden" id="emails"  name="email" value="<?php echo $getEmail; ?>" >
                <input type="hidden" id="contacts" name="contact"  value="<?php echo $getContact; ?>" >
                <input type="hidden" id="products" name="product"  value="<?php foreach ($getItems as $item) { echo $item['name']; }  ?>" >
                <input type="hidden" id="quants" name="quantity"  value="<?php foreach ($getItems as $item) { echo $item['quantity']; }  ?>" >
                <input type="hidden" id="totals" name="total"  value="<?php echo $getTotal; ?>" >
                <h4>Firstname: <?php echo $getFname; ?></h4>
                <h4>Middlename: <?php echo $getMname; ?></h4>
                <h4>Lastname: <?php echo $getLname; ?></h4>
                <br>
                <h4 for="">Kindly input your address:</h4>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
               </div>
               <div class="col-sm-4">
                <h4>Email: <?php echo  $getEmail; ?></h4>
                <h4>Contact: <?php echo  $getContact; ?></h4>
               </div>
           </div>
                <br>
                <h4>Select your mode of payment: </h4>
                  <input type="radio" name="mop" value="CASH ON DELIVERY" checked> CASH ON DELIVERY
                  <br>
                  <input type="radio" name="mop" value="GCASH (09656526461)"> GCASH (09656526461)
                  <br>
                  <input type="radio" name="mop" value="BPI (5056-614-747)"> BPI (5056-614-747)
                  <br><br>
                  <label>*Please take a screenshot for proof of payment.*</label>
                  <br>
                  <input type="file" name="payment" id="pay">
                  <br><br>
                <br>
                <h4>Product/s to be ordered: <?php foreach ($getItems as $item) { echo $item['name']; } ?></h4>
                <h4>Total Payment: P<?php echo $getTotal; ?></h4>
            </div>
          <br>
              <div class="text-center">
                  <button type="button" class="btn btn-success w-100" id="check" data-bs-toggle="modal" data-bs-target="#edit">Check out</button>
                  <a href="product_catalogue.php" type="button" class="btn btn-primary w-100">Back</a>
              </div>
              <br>
          </div>
      

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 id="fullname"></h5>
                    <h5 id="email"></h5>
                    <h5 id="contact"></h5>
                    <h5 id="add"></h5>
                    <h5 id="mop"></h5>
                    <h5 id="product"></h5>
                    <h5 id="total"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="receipt">Download Receipt</button>
                    <button type="submit" class="btn btn-primary" id="sub" name="checkOrder">Submit Order</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#check').click(function(){
          fname = $('#fname').val()
          mname = $('#mname').val()
          lname = $('#lname').val()
          emails = $('#emails').val()
          address = $('#address').val()
          products = $('#products').val()
          totals = $('#totals').val()
          contacts = $('#contacts').val()
          mop = $("input[name='mop']:checked").val();
          file1 = $('input[id=pay]').val()

          if (file1 == '' && mop != 'CASH ON DELIVERY') {
              console.log(file1);
              $('#sub').prop('disabled', true);
              $('#receipt').prop('disabled', true);
          }else if (address == ""){
            alert('Please input your address!');
            $('#sub').prop('disabled', true);
            $('#receipt').prop('disabled', true);
          } else {
              $('#sub').prop('disabled', false);
              $('#receipt').prop('disabled', false);
          }

          if (mop == "GCASH (09656526461)" && file1 == "") {
              alert('Please upload a file for proof of payment in gcash!');
              $('#sub').prop('disabled', true);
              $('#receipt').prop('disabled', true);
          } else if (mop == "BPI (5056-614-747)" && file1 == "") {
              alert('Please upload a file for proof of payment in BPI!');
              $('#sub').prop('disabled', true);
              $('#receipt').prop('disabled', true);
          }else{
              $('#pay').prop('disabled', false);
          }

          console.log(fname);
          console.log(mname);
          console.log(lname);
          console.log(emails);
          console.log(address);
          console.log(contacts);
          console.log(products);
          console.log(totals);

          document.getElementById('fullname').innerHTML = "Fullname:" + " " + fname + " " + mname + " " + lname;
          document.getElementById('email').innerHTML = "Email:" + " " + emails;
          document.getElementById('contact').innerHTML = "Contact:" + " " + contacts;
          document.getElementById('add').innerHTML = "Address:" + " " + address;
          document.getElementById('mop').innerHTML = "Mode of Payment:" + " " + mop;
          document.getElementById('product').innerHTML = "Products to be ordered:" + " " + products;
          document.getElementById('total').innerHTML = "Total Payment:" + " " + "P" + totals;
        })
        $('#receipt').click(function genPDF() {
          fname = $('#fname').val()
          mname = $('#mname').val()
          lname = $('#lname').val()
          emails = $('#emails').val()
          address = $('#address').val()
          products = $('#products').val()
          totals = $('#totals').val()
          contacts = $('#contacts').val()
          mop = $("input[name='mop']:checked").val();
          var doc = new jsPDF();
          doc.text(80, 20, "Order Details:");
          doc.text(20, 40, "FULLNAME: " + fname + " " + mname + " " + lname);
          doc.text(20, 50, "EMAIL: " + emails);
          doc.text(20, 60, "ADDRESS: " + address);
          doc.text(20, 70, "CONTACT: " + contacts);
          doc.text(20, 80, "PRODUCTS: " + products);
          doc.text(20, 90, "MODE OF PAYMENT: " + mop);
          doc.text(20, 100, "TOTAL PAYMENT: "+ "P" + totals);
          doc.save('Customer Receipt: ' + fname + '.pdf');
        })

      })
    </script>

</BODY>

</HTML>

