<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>Capstone</title>
  <style>
    body {
      background-image: url(images/loginBG.png);
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>

</head>

<body>
  <div class="logIn">
    <div class="card pt-3 pb-0">
      <div class="card-body">
        <h1 class="card-title">Login</h1>
        <form action="loginprocess.php" method="POST">
          <div class="mb-3 mt-3">
            <label for="formGroupExampleInput" class="form-label">Username</label>
            <input type="text" id="user" name="username" class="form-control" placeholder="Enter Username" required>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password</label>
            <input type="password" id="pass" name="password" class="form-control" placeholder="Enter Password" required>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn btn-warning mt-2" style="width: 100%;" name="signin">Sign in</button>
            <br><br>
            <a type="button" data-bs-toggle="modal" data-bs-target="#forgotPassword" style="color: #4169E1;">Forgot password?</a>
          </div>
        </form>
        <div class="mt-3">
            <p>Don't have an account yet?</p>
            <button type="button" class="btn btn btn-warning"  data-bs-toggle="modal" data-bs-target="#adduserModal" style="width: 100%;">Register</button>
          <br>
        </div>
        <div class="footer mt-5">
          <p>GFOX International | Charles Venture</p>
        </div>
      </div>
    </div>
  </div>
  

  <!--Modal Add Customer User-->
 <div class="modal fade" id="adduserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="functions.php" method="POST">
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput1" class="form-label">Firstname</label>
              <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter Firstname" required>
            </div>
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput2" class="form-label">Middlename</label>
              <input type="text" id="mname" name="mname" class="form-control" placeholder="Enter Middlename" required>
            </div>
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput3" class="form-label">Lastname</label>
              <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Lastname" required>
            </div>
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput4" class="form-label">Username</label>
              <input type="text" id="user" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput5" class="form-label">Email</label>
              <input type="email" id="email" name="emails" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput6" class="form-label">Contact</label>
              <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter Contact" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput7" class="form-label">Password</label>
              <input type="password" id="pass1" name="password1" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput8" class="form-label">Re-Type Password</label>
              <input type="password" id="pass2" name="password2" class="form-control" placeholder="Retype Password" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn btn-warning mt-2" style="width: 100%;" name="register">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

  <!--Modal Forgot Password-->
 <div class="modal fade" id="forgotPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="functions.php" method="POST">
            <div class="mb-3 mt-3">
              <label for="formGroupExampleInput1" class="form-label">Email</label>
              <input type="email" id="email" name="emails" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn btn-warning mt-2" style="width: 100%;" name="forgot">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>