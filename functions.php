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
    // $ta = $_POST['ta'];
    // $profit = $_POST['profit'];
    // $tendered = $_POST['tendered'];
    // $change = $_POST['change'];
    // newQty deduction for pick order
    // $newQty = $curQty - $qty;

    $check = "SELECT * FROM customers WHERE fullname='$customers'";
    $read = $db_link->query($check);
    $row = mysqli_num_rows($read);
    $getData = mysqli_fetch_array($read);


    $getName = $getData['fullname'];
    $username = $getData['username'];
    $getContact = $getData['contact'];
    $getAddress = $getData['address'];

    
    // $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$curDate', '$customers', '$category', '$pName', '$retail', '$qty', '$ta', '$profit', '$tendered', '$change')") or die($db_link->error);
    $db_link->query("INSERT INTO orders (fullname, address, products, quantity, mop, note, status, trackno) VALUES('$getName', '$address', '$pName', '$qty', 'Pick Order Form', '', 'NEW', '')") or die($db_link->error);
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
    // $ta = $_POST['ta'];
    // $profit = $_POST['profit'];
    // $tendered = $_POST['tendered'];
    // $change = $_POST['change'];
    // newQty deduction for pick order
    // $newQty = $curQty - $qty;

    $check = "SELECT * FROM customers WHERE fullname='$customers'";
    $read = $db_link->query($check);
    $row = mysqli_num_rows($read);
    $getData = mysqli_fetch_array($read);


    $getName = $getData['fullname'];
    $username = $getData['username'];
    $getContact = $getData['contact'];
    $getAddress = $getData['address'];

    
    // $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$curDate', '$customers', '$category', '$pName', '$retail', '$qty', '$ta', '$profit', '$tendered', '$change')") or die($db_link->error);
    $db_link->query("INSERT INTO orders (fullname, address, products, quantity, mop, note, status, trackno) VALUES('$getName', '$address', '$pName', '$qty', 'Pick Order Form', '', 'NEW', '')") or die($db_link->error);
    header("Location: sales1.php");
   }


// PRODUCT PAGE
function generateRandomString($length = 7)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// add form
if (isset($_POST['addProduct']) && isset($_FILES['my_image'])) {
    $code = generateRandomString();
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
        $db_link->query("INSERT INTO products (category, name, quantity, purchase, retail, supplier, img_url, code) VALUES('$productCategory', '$productName', '$productQty', '$productPurchaseAmount', '$productRetail', '$productSupplier', '$new_img_name', '$code')") or die($db_link->error);
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
if (isset($_POST['addCustomer'])) {
 $customerName = $_POST['customerName'];
 $customerContact = $_POST['customerContact'];
 $customerAddress = $_POST['customerAddress'];
 $db_link->query("INSERT INTO customers (fullname, username, email, contact, address) VALUES('$customerName ', 'N/A','N/A', '$customerContact', '$customerAddress')") or die($db_link->error);
 header("Location: customers.php");
}

// delete
if (isset($_GET['deleteCustomer'])) {
 $id = $_GET['deleteCustomer'];
 $db_link->query("DELETE FROM customers WHERE id=$id") or die($db_link->error);
 header("Location: customers.php");
}


// Stocktaking Confirmation of Orders
if (isset($_POST['orderConfirm'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $checking = "SELECT * FROM requested WHERE products='$name'";
    $prompt = $db_link->query($checking);
    $row = mysqli_num_rows($prompt);
    $display = mysqli_fetch_array($prompt);

    $check = "SELECT * FROM products WHERE name='$name'";
    $promp = $db_link->query($check);
    $displays = mysqli_fetch_array($promp);
    $getQuants = $displays['quantity'];
    if ($row != 0){
        $ids = $display['id'];
        $quants = $display['quantity'];
        $totals = $getQuants + $quants;
        $db_link->query("UPDATE products SET quantity='$totals' WHERE id=$id") or die($db_link->error);
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
    $curQuants = $_POST['quan'];
    $products = $_POST['prods'];
    $getOrderno = $_POST['order'];
    $getMop = $_POST['mode'];

    $checking = "SELECT * FROM products WHERE name='$products'";
    $prompt = $db_link->query($checking);
    $row = mysqli_num_rows($prompt);
    $getData = mysqli_fetch_array($prompt);
    
    $proQuants  = $getData['quantity'];
    $productName = $getData['name'];

    $totsQuants = $proQuants + $curQuants;

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
    }else if ($gets == "RETURNED"){
        if ($getMop == 'Pick Order Form'){
            $db_link->query("DELETE FROM sales WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totsQuants' WHERE name='$products'") or die($db_link->error);
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
        }else{
            $check = "SELECT * FROM myorders WHERE product='$products' AND quantity='$curQuants' AND orderno='$getOrderno'";
            $pmpt = $db_link->query($check);
            $getpmpt = mysqli_fetch_array($pmpt);
        
            $getIdMyorder = $getpmpt['id'];

            $db_link->query("DELETE FROM sales WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE myorders SET status='$gets' WHERE id=$getIdMyorder") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totsQuants' WHERE name='$products'") or die($db_link->error);
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
    else{
        if ($getMop == 'Pick Order Form'){
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
        }else{
            $check = "SELECT * FROM myorders WHERE product='$products' AND quantity='$curQuants' AND orderno='$getOrderno'";
            $pmpt = $db_link->query($check);
            $getpmpt = mysqli_fetch_array($pmpt);
        
            $getIdMyorder = $getpmpt['id'];

            $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE myorders SET status='$gets' WHERE id=$getIdMyorder") or die($db_link->error);
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


}


// Orders Update Salesperson
if (isset($_POST['updtStatSP'])) {
    $id = $_POST['id'];
    $gets = $_POST['stats'];
    $curQuants = $_POST['quan'];
    $products = $_POST['prods'];
    $getOrderno = $_POST['order'];
    $getMop = $_POST['mode'];

    $checking = "SELECT * FROM products WHERE name='$products'";
    $prompt = $db_link->query($checking);
    $row = mysqli_num_rows($prompt);
    $getData = mysqli_fetch_array($prompt);
    
    $proQuants  = $getData['quantity'];
    $productName = $getData['name'];

    $totsQuants = $proQuants + $curQuants;

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
    }else if ($gets == "RETURNED"){
        if ($getMop == 'Pick Order Form'){
            $db_link->query("DELETE FROM sales WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totsQuants' WHERE name='$products'") or die($db_link->error);
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
        }else{
            $check = "SELECT * FROM myorders WHERE product='$products' AND quantity='$curQuants' AND orderno='$getOrderno'";
            $pmpt = $db_link->query($check);
            $getpmpt = mysqli_fetch_array($pmpt);
        
            $getIdMyorder = $getpmpt['id'];

            $db_link->query("DELETE FROM sales WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE myorders SET status='$gets' WHERE id=$getIdMyorder") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totsQuants' WHERE name='$products'") or die($db_link->error);
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
    else{
        if ($getMop == 'Pick Order Form'){
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
        }else{
            $check = "SELECT * FROM myorders WHERE product='$products' AND quantity='$curQuants' AND orderno='$getOrderno'";
            $pmpt = $db_link->query($check);
            $getpmpt = mysqli_fetch_array($pmpt);
        
            $getIdMyorder = $getpmpt['id'];

            $db_link->query("UPDATE orders SET status='$gets' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE myorders SET status='$gets' WHERE id=$getIdMyorder") or die($db_link->error);
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
    $quantsNow = $_POST['quan'];
    $trackingno = $_POST['trackno'];
    $dateNow = $_POST['curDate'];
    $customers = $_POST['customer'];
    $getOrderno = $_POST['order'];
    $getMop = $_POST['mode'];

    $checking1 = "SELECT * FROM products WHERE name='$products'";
    $prompt1 = $db_link->query($checking1);
    $row1 = mysqli_num_rows($prompt1);
    $getData1 = mysqli_fetch_array($prompt1);

    $getIds = $getData1['id'];
    $currentQuants = $getData1['quantity'];
    $retails = $getData1['retail'];
    $categories = $getData1['category'];
    $productName = $getData1['name'];
 
    $totalQuants = $currentQuants - $quantsNow;

    $getProfit = $quantsNow * $retails;

    if ($status == "SHIPPED"){
        if ($getMop == 'Pick Order Form'){
            $db_link->query("UPDATE orders SET trackno='$trackingno' WHERE id=$id") or die($db_link->error);
            $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$dateNow', '$customers', '$categories', '$productName', '$retails', '$quantsNow', '$getProfit', '$getProfit', '0', '0')") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totalQuants' WHERE name='$productName'") or die($db_link->error);

            // update the data qty regards to date(month) in salesreport
            $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
            $month = $date->format('F');
            $month = strtolower($month);
            $r = $db_link->query("SELECT * FROM salesreport WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $currentval = $row[$month];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport SET $month='$totals' WHERE id=$getIds") or die($db_link->error);

            // update the quantity regards by day
            $day = $date->format('l');
            $r = $db_link->query("SELECT * FROM salesreport2 WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $convertDay = strtolower($day);
            $currentval = $row[$convertDay];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport2 SET $day='$totals' WHERE id=$getIds") or die($db_link->error);

            $r1 = $db_link->query("SELECT * FROM dayspass WHERE id=1");
            $row1 = mysqli_fetch_array($r1);
            $week = $row1['week'];
            $item = $db_link->query("SELECT * FROM salesreport1 WHERE id=$getIds");
            $itemrow = mysqli_fetch_array($item);
            $whatweek = 'week' . $week;
            $val = $itemrow[$whatweek];
            $totals = (int)$val + (int)$quantsNow;
            $db_link->query("UPDATE salesreport1 SET $whatweek='$totals' WHERE id=$getIds") or die($db_link->error);
            
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
        }else{
            $check = "SELECT * FROM myorders WHERE product='$products' AND quantity='$quantsNow' AND orderno='$getOrderno'";
            $pmpt = $db_link->query($check);
            $getpmpt = mysqli_fetch_array($pmpt);
        
            $getIdMyorder = $getpmpt['id'];

            $db_link->query("UPDATE orders SET trackno='$trackingno' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE myorders SET trackno='$trackingno' WHERE id=$getIdMyorder") or die($db_link->error);
            $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$dateNow', '$customers', '$categories', '$productName', '$retails', '$quantsNow', '$getProfit', '$getProfit', '0', '0')") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totalQuants' WHERE name='$productName'") or die($db_link->error);
    
            // update the data qty regards to date(month) in salesreport
            $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
            $month = $date->format('F');
            $month = strtolower($month);
            $r = $db_link->query("SELECT * FROM salesreport WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $currentval = $row[$month];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport SET $month='$totals' WHERE id=$getIds") or die($db_link->error);
    
            // update the quantity regards by day
            $day = $date->format('l');
            $r = $db_link->query("SELECT * FROM salesreport2 WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $convertDay = strtolower($day);
            $currentval = $row[$convertDay];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport2 SET $day='$totals' WHERE id=$getIds") or die($db_link->error);
    
            $r1 = $db_link->query("SELECT * FROM dayspass WHERE id=1");
            $row1 = mysqli_fetch_array($r1);
            $week = $row1['week'];
            $item = $db_link->query("SELECT * FROM salesreport1 WHERE id=$getIds");
            $itemrow = mysqli_fetch_array($item);
            $whatweek = 'week' . $week;
            $val = $itemrow[$whatweek];
            $totals = (int)$val + (int)$quantsNow;
            $db_link->query("UPDATE salesreport1 SET $whatweek='$totals' WHERE id=$getIds") or die($db_link->error);
            
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
        }
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



//ADD TRACKING NUMBER SALESPERSON
if (isset($_POST['addTracknoSP'])) {
    $id = $_POST['id'];
    $status = $_POST['stats'];
    $products = $_POST['prods'];
    $quantsNow = $_POST['quan'];
    $trackingno = $_POST['trackno'];
    $dateNow = $_POST['curDate'];
    $customers = $_POST['customer'];
    $getOrderno = $_POST['order'];
    $getMop = $_POST['mode'];

    $checking1 = "SELECT * FROM products WHERE name='$products'";
    $prompt1 = $db_link->query($checking1);
    $row1 = mysqli_num_rows($prompt1);
    $getData1 = mysqli_fetch_array($prompt1);

    $getIds = $getData1['id'];
    $currentQuants = $getData1['quantity'];
    $retails = $getData1['retail'];
    $categories = $getData1['category'];
    $productName = $getData1['name'];
 
    $totalQuants = $currentQuants - $quantsNow;

    $getProfit = $quantsNow * $retails;

    if ($status == "SHIPPED"){
        if ($getMop == 'Pick Order Form'){
            $db_link->query("UPDATE orders SET trackno='$trackingno' WHERE id=$id") or die($db_link->error);
            $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$dateNow', '$customers', '$categories', '$productName', '$retails', '$quantsNow', '$getProfit', '$getProfit', '0', '0')") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totalQuants' WHERE name='$productName'") or die($db_link->error);

            // update the data qty regards to date(month) in salesreport
            $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
            $month = $date->format('F');
            $month = strtolower($month);
            $r = $db_link->query("SELECT * FROM salesreport WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $currentval = $row[$month];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport SET $month='$totals' WHERE id=$getIds") or die($db_link->error);

            // update the quantity regards by day
            $day = $date->format('l');
            $r = $db_link->query("SELECT * FROM salesreport2 WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $convertDay = strtolower($day);
            $currentval = $row[$convertDay];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport2 SET $day='$totals' WHERE id=$getIds") or die($db_link->error);

            $r1 = $db_link->query("SELECT * FROM dayspass WHERE id=1");
            $row1 = mysqli_fetch_array($r1);
            $week = $row1['week'];
            $item = $db_link->query("SELECT * FROM salesreport1 WHERE id=$getIds");
            $itemrow = mysqli_fetch_array($item);
            $whatweek = 'week' . $week;
            $val = $itemrow[$whatweek];
            $totals = (int)$val + (int)$quantsNow;
            $db_link->query("UPDATE salesreport1 SET $whatweek='$totals' WHERE id=$getIds") or die($db_link->error);
            
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
                        window.location.href = "orders1.php";
                        }else{
                            window.location.href = "orders1.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }else{
            $check = "SELECT * FROM myorders WHERE product='$products' AND quantity='$quantsNow' AND orderno='$getOrderno'";
            $pmpt = $db_link->query($check);
            $getpmpt = mysqli_fetch_array($pmpt);
        
            $getIdMyorder = $getpmpt['id'];

            $db_link->query("UPDATE orders SET trackno='$trackingno' WHERE id=$id") or die($db_link->error);
            $db_link->query("UPDATE myorders SET trackno='$trackingno' WHERE id=$getIdMyorder") or die($db_link->error);
            $db_link->query("INSERT INTO sales (dates, customers, category, name, amnt, quantity, total, profit, tendered, changed) VALUES('$dateNow', '$customers', '$categories', '$productName', '$retails', '$quantsNow', '$getProfit', '$getProfit', '0', '0')") or die($db_link->error);
            $db_link->query("UPDATE products SET quantity='$totalQuants' WHERE name='$productName'") or die($db_link->error);
    
            // update the data qty regards to date(month) in salesreport
            $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
            $month = $date->format('F');
            $month = strtolower($month);
            $r = $db_link->query("SELECT * FROM salesreport WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $currentval = $row[$month];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport SET $month='$totals' WHERE id=$getIds") or die($db_link->error);
    
            // update the quantity regards by day
            $day = $date->format('l');
            $r = $db_link->query("SELECT * FROM salesreport2 WHERE id=$getIds");
            $row = mysqli_fetch_array($r);
            $convertDay = strtolower($day);
            $currentval = $row[$convertDay];
            $totals = (int)$currentval + (int)$quantsNow;
            $db_link->query("UPDATE salesreport2 SET $day='$totals' WHERE id=$getIds") or die($db_link->error);
    
            $r1 = $db_link->query("SELECT * FROM dayspass WHERE id=1");
            $row1 = mysqli_fetch_array($r1);
            $week = $row1['week'];
            $item = $db_link->query("SELECT * FROM salesreport1 WHERE id=$getIds");
            $itemrow = mysqli_fetch_array($item);
            $whatweek = 'week' . $week;
            $val = $itemrow[$whatweek];
            $totals = (int)$val + (int)$quantsNow;
            $db_link->query("UPDATE salesreport1 SET $whatweek='$totals' WHERE id=$getIds") or die($db_link->error);
            
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
                        window.location.href = "orders1.php";
                        }else{
                            window.location.href = "orders1.php";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
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


//REGISTER CUSTOMER
if (isset($_POST['register'])) {
    $first = $_POST['fname'];
    $middle = $_POST['mname'];
    $last = $_POST['lname'];
    $userr = $_POST['username'];
    $email = $_POST['emails'];
    $contacts = $_POST['contact'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $setOTP = rand(0000,9999);

    $checking = "SELECT * FROM user_acc WHERE password='$pass1' OR username='$userr' OR firstname='$first'";
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
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }else if ($row == 0){
        $db_link->query("INSERT INTO user_acc (firstname, middlename, lastname, username, email, contact, password, otp) VALUES('$first', '$middle', '$last', '$userr', '$email', '$contacts', '$pass1', '$setOTP')") or die($db_link->error);
        include 'otp_email.php';
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'success',
                title: 'Successfully Registered',
                text: 'Please login your credentials now. We sent an OTP for your account verification',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "otp.php";
                    }else{
                        window.location.href = "otp.php";
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
                    window.location.href = "index.php";
                    }else{
                        window.location.href = "index.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}

//OTP VERIFICATION
if (isset($_POST['otplogin'])) {
    $checkOTP = $_POST['otp'];

    $login="SELECT * FROM user_acc WHERE otp='$checkOTP'";
    $prompt = $db_link->query($login);
    $row = mysqli_num_rows($prompt);
    $getData = mysqli_fetch_array($prompt);

    $getName = $getData['username'];
    if ($row == 1){
        $_SESSION['name'] = $getName;
        header('location:product_catalogue.php');
    }else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'OTP is incorrect! Kindly Check your email for your OTP code.',
                text: 'Something went wrong!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "otp.php";
                    }else{
                        window.location.href = "otp.php";
                    }
                })
                
            })
    
        </script>
        <?php
    }
}


//CHECKOUT
if (isset($_POST['checkOrder']) && isset($_FILES['payment'])) {
    $date = $_POST['dates'];
    $firstname = $_POST['first'];
    $middlename = $_POST['middle'];
    $lastname = $_POST['last'];
    $emails = $_POST['email'];
    $contacts = $_POST['contact'];
    $totals = $_POST['total'];
    $address = $_POST['address'];
    $mop = $_POST['mop'];
    $orderNo = rand(000,999);

    $getItems = $_SESSION["cart_item"];
    $username = $_SESSION['name'];

    if ($mop == 'CASH ON DELIVERY'){
        $check = "SELECT * FROM customers WHERE username='$username'";
        $read = $db_link->query($check);
        $row = mysqli_num_rows($read);
        $getData = mysqli_fetch_array($read);

        if ($row == 1){
            // echo('Meron na nyan sa db');
        }else{
            $db_link->query("INSERT INTO customers (fullname, username, email, contact, address) VALUES('$firstname' ' ' '$middlename' ' ' '$lastname', '$username','$emails', '$contacts', ' $address')") or die($db_link->error);
        }

        foreach ($getItems as $item) {
            $getName = $item['name'];
            $getQuants = $item['quantity'];
    
            $login="SELECT * FROM products WHERE name='$getName'";
            $prompt = $db_link->query($login);
            $getData = mysqli_fetch_array($prompt);
        
            $productName = $getData['name'];
            $quantsProduct = $getData['quantity'];
    
            $getTotal = $quantsProduct - $getQuants;
    
            $_SESSION['firstname'] = $firstname;
            $_SESSION['middlename'] = $middlename;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $emails;
            $_SESSION['contact'] = $contacts;
            $_SESSION['mop'] = $mop;
            $_SESSION['total'] = $totals;

            $db_link->query("INSERT INTO myorders (firstname, middlename, lastname, username, email, contact, product, quantity, address, mop, total, dates, status, trackno, orderno) VALUES('$firstname', '$middlename', '$lastname', '$username', '$emails', '$contacts', '$getName', '$getQuants', '$address', '$mop', '$totals', '$date', 'NEW', '', '$orderNo')") or die($db_link->error);
            $db_link->query("INSERT INTO orders (fullname, address, products, quantity, mop, note, status, trackno, ordersno) VALUES('$firstname' ' ' '$middlename' ' ' '$lastname', '$address', '$getName', '$getQuants', '$mop', '', 'NEW', '', '$orderNo')") or die($db_link->error);
            include 'customer_email.php';
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Successfully Placed Your Order',
                    text: 'We sent an email for your confirmation of order. ',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "success.php?action=empty";
                        }else{
                            window.location.href = "success.php?action=empty";
                        }
                    })
                    
                })
        
            </script>
            <?php
        }
    }
    else{
        $check = "SELECT * FROM customers WHERE username='$username'";
        $read = $db_link->query($check);
        $row = mysqli_num_rows($read);
        $getData = mysqli_fetch_array($read);

        if ($row == 1){
            // echo('Meron na nyan sa db');
        }else{
            $db_link->query("INSERT INTO customers (fullname, username, email, contact, address) VALUES('$firstname' ' ' '$middlename' ' ' '$lastname', '$username','$emails', '$contacts', ' $address')") or die($db_link->error);
        }

        // $ig = $_POST['payment'];
        // img validation
        $img_name = $_FILES['payment']['name'];
        $img_size = $_FILES['payment']['size'];
        $tmp_name = $_FILES['payment']['tmp_name'];
        $error = $_FILES['payment']['error'];
    
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");
        echo "<script>console.log('aaa');</script>";
        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'screenshots/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
                foreach ($getItems as $item) {
                    $getName = $item['name'];
                    $getQuants = $item['quantity'];
            
                    $login="SELECT * FROM products WHERE name='$getName'";
                    $prompt = $db_link->query($login);
                    $getData = mysqli_fetch_array($prompt);
                
                    $productName = $getData['name'];
                    $quantsProduct = $getData['quantity'];
            
                    $getTotal = $quantsProduct - $getQuants;
            
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['middlename'] = $middlename;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['email'] = $emails;
                    $_SESSION['contact'] = $contacts;
                    $_SESSION['mop'] = $mop;
                    $_SESSION['total'] = $totals;
        
                    $db_link->query("INSERT INTO myorders (firstname, middlename, lastname, username, email, contact, product, quantity, address, mop, total, dates, status, trackno, orderno) VALUES('$firstname', '$middlename', '$lastname', '$username', '$emails', '$contacts', '$getName', '$getQuants', '$address', '$mop', '$totals', '$date', 'NEW', '', '$orderNo')") or die($db_link->error);
                    $db_link->query("INSERT INTO orders (fullname, address, products, quantity, mop, note, status, trackno, ordersno) VALUES('$firstname' ' ' '$middlename' ' ' '$lastname', '$address', '$getName', '$getQuants', '$mop $new_img_name', '', 'NEW', '', '$orderNo')") or die($db_link->error);
                    include 'customer_email.php';
                    ?>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function(){
                            Swal.fire({
                            icon: 'success',
                            title: 'Successfully Placed Your Order',
                            text: 'We sent an email for your confirmation of order. ',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "success.php?action=empty";
                                }else{
                                    window.location.href = "success.php?action=empty";
                                }
                            })
                            
                        })
                
                    </script>
                    <?php
                }
            
        }
    }
    

}