<?php
session_start();
include "config.php";

// SALES PAGE
// transaction form
if (isset($_POST['submitSaleForm'])) {
    $id = $_POST['id'];
    $curQty = $_POST['curQty'];
    $curDate = $_POST['curDate'];
    $customers = $_POST['customers'];
    $category = $_POST['category'];
    $pName = $_POST['pName'];
    $retail = $_POST['retail'];
    $qty = $_POST['qty'];
    $ta = $_POST['ta'];
    $profit = $_POST['profit'];
    $tendered = $_POST['tendered'];
    $change = $_POST['change'];
    // newQty deduction for pick order
    $newQty = $curQty - $qty;
    $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$curDate', '$customers', '$category', '$pName', '$retail', '$qty', '$ta', '$profit', '$tendered', '$change')") or die($db_link->error);

    // update the data qty regards to date(month) in salesreport
    $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $month = $date->format('F');
    $month = strtolower($month);
    $r = $db_link->query("SELECT * FROM salesreport WHERE id=$id");
    $row = mysqli_fetch_array($r);
    $currentval = $row[$month];
    $totals = (int)$currentval + (int)$qty;
    $db_link->query("UPDATE salesreport SET $month='$totals' WHERE id=$id") or die($db_link->error);

    // update the quantity regards by day
    $day = $date->format('l');
    $r = $db_link->query("SELECT * FROM salesreport2 WHERE id=$id");
    $row = mysqli_fetch_array($r);
    $currentval = $row[$day];
    $totals = (int)$currentval + (int)$qty;
    $db_link->query("UPDATE salesreport2 SET $day='$totals' WHERE id=$id") or die($db_link->error);

    $r1 = $db_link->query("SELECT * FROM dayspass WHERE id=1");
    $row1 = mysqli_fetch_array($r1);
    $week = $row1['week'];
    $item = $db_link->query("SELECT * FROM salesreport1 WHERE id=$id");
    $itemrow = mysqli_fetch_array($item);
    $whatweek = 'week' . $week;
    $val = $itemrow[$whatweek];
    $totals = (int)$val + (int)$qty;
    $db_link->query("UPDATE salesreport1 SET $whatweek='$totals' WHERE id=$id") or die($db_link->error);


    #update products table
    $db_link->query("UPDATE products SET quantity='$newQty' WHERE id=$id") or die($db_link->error);
    header("Location: sales.php");
}

// SALESPERSON PAGE
// transaction form
if (isset($_POST['submitSalespersonForm'])) {
    $id = $_POST['id'];
    $curQty = $_POST['curQty'];
    $curDate = $_POST['curDate'];
    $customers = $_POST['customers'];
    $category = $_POST['category'];
    $pName = $_POST['pName'];
    $retail = $_POST['retail'];
    $qty = $_POST['qty'];
    $ta = $_POST['ta'];
    $profit = $_POST['profit'];
    $tendered = $_POST['tendered'];
    $change = $_POST['change'];
    // newQty deduction for pick order
    $newQty = $curQty - $qty;
    $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$curDate', '$customers', '$category', '$pName', '$retail', '$qty', '$ta', '$profit', '$tendered', '$change')") or die($db_link->error);
    
    // update the data qty regards to date(month) in salesreport
    $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $month = $date->format('F');
    $month = strtolower($month);
    $r = $db_link->query("SELECT * FROM salesreport WHERE id=$id");
    $row = mysqli_fetch_array($r);
    $currentval = $row[$month];
    $totals = (int)$currentval + (int)$qty;
    $db_link->query("UPDATE salesreport SET $month='$totals' WHERE id=$id") or die($db_link->error);

    // update the quantity regards by day
    $day = $date->format('l');
    $r = $db_link->query("SELECT * FROM salesreport2 WHERE id=$id");
    $row = mysqli_fetch_array($r);
    $currentval = $row[$day];
    $totals = (int)$currentval + (int)$qty;
    $db_link->query("UPDATE salesreport2 SET $day='$totals' WHERE id=$id") or die($db_link->error);

    $r1 = $db_link->query("SELECT * FROM dayspass WHERE id=1");
    $row1 = mysqli_fetch_array($r1);
    $week = $row1['week'];
    $item = $db_link->query("SELECT * FROM salesreport1 WHERE id=$id");
    $itemrow = mysqli_fetch_array($item);
    $whatweek = 'week' . $week;
    $val = $itemrow[$whatweek];
    $totals = (int)$val + (int)$qty;
    $db_link->query("UPDATE salesreport1 SET $whatweek='$totals' WHERE id=$id") or die($db_link->error);

    #update products table
    $db_link->query("UPDATE products SET quantity='$newQty' WHERE id=$id") or die($db_link->error);
    header("Location: sales1.php");
   }


// PRODUCT PAGE
// add form
if (isset($_POST['addProduct']) && isset($_FILES['my_image'])) {
    $productCategory = $_POST['productCategory'];
    $productName = $_POST['productName'];
    $productQty = $_POST['productQty'];
    $productPurchaseAmount = $_POST['productPurchaseAmount'];
    $productRetail = $_POST['productRetail'];
    $productSupplier = $_POST['productSupplier'];
    $my_image = $_POST['my_image'];

    // img validation
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'uploads/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        $db_link->query("INSERT INTO products (category, name, quantity, purchase, retail, supplier, img_url) VALUES('$productCategory', '$productName', '$productQty', '$productPurchaseAmount', '$productRetail', '$productSupplier', '$new_img_name')") or die($db_link->error);
        // sales report
        $db_link->query("INSERT INTO salesreport (nameOfProduct) VALUES ('$productName')") or die($db_link->error);
        $db_link->query("INSERT INTO salesreport1 (nameOfProduct) VALUES ('$productName')") or die($db_link->error);
        $db_link->query("INSERT INTO salesreport2 (nameOfProduct) VALUES ('$productName')") or die($db_link->error);
        header('location: products.php');
    }
}

// edit form
if (isset($_POST['updateFormProducts'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $pa = $_POST['pa'];
    $retail = $_POST['retail'];
    $suppliers = $_POST['suppliers'];
    $db_link->query("UPDATE products SET category='$category', name='$name', quantity='$qty', purchase='$pa', retail='$retail', supplier='$suppliers' WHERE id=$id") or die($db_link->error);
    // sales report
    $db_link->query("UPDATE salesreport SET nameOfProduct='$name' WHERE id=$id") or die($db_link->error);
    $db_link->query("UPDATE salesreport1 SET nameOfProduct='$name' WHERE id=$id") or die($db_link->error);
    $db_link->query("UPDATE salesreport2 SET nameOfProduct='$name' WHERE id=$id") or die($db_link->error);
    header("Location: products.php");
}

// delete
if (isset($_GET['delete'])) {
 $id = $_GET['delete'];
 $db_link->query("DELETE FROM products WHERE id=$id") or die($db_link->error);
 header("Location: products.php");
}


// SUPPLIERS PAGE
// add supplier
if (isset($_POST['addSupplier'])) {
 $supplierName = $_POST['supplierName'];
 $supplierContactPerson = $_POST['supplierContactPerson'];
 $supplierAddress = $_POST['supplierAddress'];
 $supplierContactNo = $_POST['supplierContactNo'];
 $supplierNote = $_POST['supplierNote'];
 $db_link->query("INSERT INTO supplier (suppliername, contactperson, address, contactno, note) VALUES('$supplierName', '$supplierContactPerson', '$supplierAddress', '$supplierContactNo', '$supplierNote')") or die($db_link->error);
 header("Location: suppliers.php");
}

// edit
if (isset($_POST['updateFormSupplier'])) {
 $id = $_POST['id'];
 $supplierName = $_POST['supplierName'];
 $contactperson = $_POST['contactperson'];
 $address = $_POST['address'];
 $contactno = $_POST['contactno'];
 $note = $_POST['note'];
 $db_link->query("UPDATE supplier SET suppliername='$supplierName', contactperson='$contactperson', address='$address', contactno='$contactno', note='$note' WHERE id=$id") or die($db_link->error);
 header("Location: suppliers.php");
}

// delete
if (isset($_GET['deleteSupplier'])) {
 $id = $_GET['deleteSupplier'];
 $db_link->query("DELETE FROM supplier WHERE id=$id") or die($db_link->error);
 header("Location: suppliers.php");
}


// CUSTOMERS PAGE
// add customer
// if (isset($_POST['addCustomer'])) {
//  $customerName = $_POST['customerName'];
//  $customerContact = $_POST['customerContact'];
//  $customerAddress = $_POST['customerAddress'];
//  $customerNote = $_POST['customerNote'];
//  $db_link->query("INSERT INTO customers (name, contact, address, note) VALUES('$customerName', '$customerContact', '$customerAddress', '$customerNote')") or die($db_link->error);
//  header("Location: customers.php");
// }

// delete
if (isset($_GET['deleteCustomer'])) {
 $id = $_GET['deleteCustomer'];
 $db_link->query("DELETE FROM customers WHERE id=$id") or die($db_link->error);
 header("Location: customers.php");
}



// FORM PAGE
//add orders
if (isset($_POST['submitOrderForm'])  && isset($_FILES['payment1'])) {
    $name = $_POST['name'];
    $fbname = $_POST['fbname'];
    $concern = $_POST['concern'];
    $question = $_POST['question'];
    $number = $_POST['number'];
    $extranumber = $_POST['extranumber'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $product = $_POST['products'];
    $bottles = $_POST['bottles'];
    $receivecall = $_POST['receivecall'];
    $noteforDelivery = $_POST['noteforDelivery'];

    // $db_link->query("INSERT INTO orders (name, fbname, concern, question, phone, extraphone, address, landmark, province, city, barangay, bottles, receivecall, mop, note) VALUES('$name', '$fbname', '$concern', '$question', '$number', '$extranumber', '$address', '$landmark', '$province', '$city', '$barangay', '$bottles', '$receivecall', '$mop', '$noteforDelivery')") or die($db_link->error);

    $mop = $_POST['mop'];

    // echo "<script>console.log('bbbb');</script>";
    // $db_link->query("INSERT INTO orders (name, fbname, concern, question, phone, extraphone, address, landmark, province, city, barangay, bottles, receivecall, mop, note) VALUES('$name', '$fbname', '$concern', '$question', '$number', '$extranumber', '$address', '$landmark', '$province', '$city', '$barangay', '$bottles', '$receivecall', '$mop', '$noteforDelivery')") or die($db_link->error);
    // echo "<script>alert('Successfully Submitted your Order')</script>";
    // header("Location: form.php");

    if ($mop == 'CASH ON DELIVERY') {
        $db_link->query("INSERT INTO customers (name, fbname, concern, question, phone, extraphone, address, note) VALUES('$name','$fbname', '$concern', '$question', '$number', '$extranumber', '$address', '$noteforDelivery')") or die($db_link->error);
        $db_link->query("INSERT INTO orders (name, fbname, concern, question, phone, extraphone, address, landmark, province, city, barangay, products, bottles, receivecall, mop, note, status) VALUES('$name', '$fbname', '$concern', '$question', '$number', '$extranumber', '$address', '$landmark', '$province', '$city', '$barangay', '$product','$bottles', '$receivecall', '$mop', '$noteforDelivery', 'NEW')") or die($db_link->error);
        echo "<script>alert('Successfully Submitted your Order')</script>";
        header("Location: form.php");
    }else{
        $ig = $_POST['payment1'];
        // img validation
        $img_name = $_FILES['payment1']['name'];
        $img_size = $_FILES['payment1']['size'];
        $tmp_name = $_FILES['payment1']['tmp_name'];
        $error = $_FILES['payment1']['error'];
    
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");
        echo "<script>console.log('aaa');</script>";
        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'screenshots/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            $db_link->query("INSERT INTO customers (name, fbname, concern, question, phone, extraphone, address, note) VALUES('$name','$fbname', '$concern', '$question', '$number', '$extranumber', '$address', '$noteforDelivery')") or die($db_link->error);
            $db_link->query("INSERT INTO orders (name, fbname, concern, question, phone, extraphone, address, landmark, province, city, barangay, products, bottles, receivecall, mop, note, status) VALUES('$name', '$fbname', '$concern', '$question', '$number', '$extranumber', '$address', '$landmark', '$province', '$city', '$barangay', '$product','$bottles', '$receivecall', '$mop $new_img_name', '$noteforDelivery', 'NEW')") or die($db_link->error);
            echo "<script>alert('Successfully Submitted your Order')</script>";
            header("Location: form.php");
        }
    }
  
    
  
}


// Stocktaking Confirmation of Orders
if (isset($_POST['orderConfirm'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $checking = "SELECT * FROM requested WHERE products='$name'";
    $prompt = $db_link->query($checking);
    $row = mysqli_num_rows($prompt);
    $display = mysqli_fetch_array($prompt);
    if ($row != 0){
        $ids = $display['id'];
        $quants = $display['quantity'];
        $db_link->query("UPDATE products SET quantity='$quants' WHERE id=$id") or die($db_link->error);
        $db_link->query("DELETE FROM requested WHERE id=$ids") or die($db_link->error);
        header("Location: stocktaking.php");
    }else{?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                title: 'Please request first before confirming the order!',
                text: "Something went wrong!",
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "stocktaking.php";
                    }else{
                        window.location.href = "stocktaking.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}


// Orders Update Admin
if (isset($_POST['updtStat'])) {
    $id = $_POST['id'];
    $gets = $_POST['stats'];
    
    if ($gets == ""){
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: 'An error occured!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "orders.php";
                        }else{
                            window.location.href = "orders.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
    }else{
        $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: 'Successfully Updated',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "orders.php";
                        }else{
                            window.location.href = "orders.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
    }


}


// Orders Update Salesperson
if (isset($_POST['updtStatSP'])) {
    $id = $_POST['id'];
    $gets = $_POST['stats'];
    
    if ($gets == ""){
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: 'An error occured!',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "orders1.php";
                        }else{
                            window.location.href = "orders1.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
    }else{
        $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
        ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: 'Successfully Updated',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "orders1.php";
                        }else{
                            window.location.href = "orders1.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
    }


}

//ADD USERS

if (isset($_POST['addUser'])) {

    $userr = $_POST['username'];
    $acc = $_POST['access'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];


    
    $checking = "SELECT * FROM users WHERE password='$pass1' OR username='$userr'";
    $prompt = $db_link->query($checking);
    $row = mysqli_num_rows($prompt);

    if ($pass1 != $pass2){
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Password does not match',
                text: 'Something went wrong!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "customers.php";
                    }else{
                        window.location.href = "customers.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else if ($row == 0){
        $db_link->query("INSERT INTO users (username, password, access) VALUES('$userr', '$pass1', '$acc')") or die($db_link->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Registered',
                text: 'Please login your credentials now',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "customers.php";
                    }else{
                        window.location.href = "customers.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'Data is already in the database',
                text: 'Please login your credentials now',
                text: 'Something went wrong!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "customers.php";
                    }else{
                        window.location.href = "customers.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}


//ADD TRACKING NUMBER ADMIN
if (isset($_POST['addTrackno'])) {
    $id = $_POST['id'];
    $status = $_POST['stats'];
    $products = $_POST['prods'];
    $currentQuants = $_POST['curQty'];
    $quantsNow = $_POST['quan'];
    $trackingno = $_POST['trackno'];
    
    $totalQuants = $currentQuants - $quantsNow;
    // echo($quantsNow);
    // echo($currentQuants);
    echo($totalQuants);

    if ($status == "SHIPPED"){
        $db_link->query("UPDATE orders SET trackno='$trackingno' WHERE id=$id") or die($db_link->error);
        // $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$curDate', '$customers', '$category', '$pName', '$retail', '$qty', '$ta', '$profit', '$tendered', '$change')") or die($db_link->error);
        $db_link->query("UPDATE products SET quantity='$totalQuants' WHERE id='$id'") or die($db_link->error);
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully added the Tracking Number',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "orders.php";
                    }else{
                        window.location.href = "orders.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else{?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'warning',
                title: 'This is for shipped products only',
                text: 'Kindly check the status of the customer',
                text: 'Something went wrong!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "orders.php";
                    }else{
                        window.location.href = "orders.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}