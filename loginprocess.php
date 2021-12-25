
<?php
    session_start();
    require('config.php');
    
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $login="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result_login=mysqli_query($db_link, $login); 
    
        if ($username == "admin" && $password == "admin"){
            header('location:dashboard.php');
        }elseif($username == "salesperson" && $password == "salesperson"){
            header('location:dashboardsales.php');
        }
        else{?>
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
                    window.location.href = "login.php";
                    }else{
                        window.location.href = "login.php";
                    }
                })
                
            })
    
        </script>
        <?php
        }
        mysqli_close($db_link);

?>
