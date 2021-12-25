<?php
session_start();
include "config.php";

if (isset($_POST['submitSupplierForm'])) {
    $id = $_POST['id'];
    $product = $_POST['pName'];
    $stock = $_POST['stocks'];
    $quants = $_POST['qtytobeordered'];

    $checking = "SELECT * FROM requested WHERE products='$product'";
    $prompt = $db_link->query($checking);
    $row = mysqli_num_rows($prompt);
    if($row == 0){
        $db_link->query("INSERT INTO requested (products, quantity) VALUES('$product', '$quants')") or die($db_link->error);
        include 'mailersupplier.php';
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                title: 'Your request successfully sent to the supplier.',
                text: "Please wait for the email for confirmation.",
                icon: 'success',
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
    }else{?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                title: 'Your request has already been sent. Please make sure to confirm your order.',
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
?>


