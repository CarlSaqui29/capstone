
<?php
    session_start();
    require('config.php');
    
    if (isset($_POST['signin'])) {
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $login1="SELECT * FROM users WHERE username='$username' AND password='$password' AND access='Admin'";
        $prompt1 = $db_link->query($login1);
        $row1 = mysqli_num_rows($prompt1);

        $login2="SELECT * FROM users WHERE username='$username' AND password='$password' AND access='Salesperson'";
        $prompt2 = $db_link->query($login2);
        $row2 = mysqli_num_rows($prompt2);

        $login3="SELECT * FROM user_acc WHERE username='$username' AND password='$password'";
        $prompt3 = $db_link->query($login3);
        $row3 = mysqli_num_rows($prompt3);
        $getData = mysqli_fetch_array($prompt3);

        if ($row1 == 1 ){
            header('location:dashboard.php');
        }elseif($row2 == 1){
            header('location:dashboardsales.php');
        }elseif($row3 == 1){
            $getName = $getData['username'];
            $_SESSION['name'] = $getName;
            header('location:product_catalogue.php');
        }else{?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                Swal.fire({
                icon: 'error',
                title: 'Username and/or Password is incorrect',
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
        mysqli_close($db_link);

    }

?>
