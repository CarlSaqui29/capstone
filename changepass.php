<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <title>Change Password</title>
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
        <h1 class="card-title">Change Password</h1>
        <form action="functions.php" method="POST">
          <div class="mb-3 mt-3">
            <label for="formGroupExampleInput" class="form-label">Enter your new password</label>
            <input type="password" name="pass1" class="form-control" required>
          </div>
          <div class="mb-3 mt-3">
            <label for="formGroupExampleInput" class="form-label">Retype your password</label>
            <input type="password" name="pass2" class="form-control" required>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn btn-warning mt-2" style="width: 100%;" name="change">Submit</button>
          </div>
        </form>
        <div class="footer mt-5">
          <p>GFOX International | Charles Venture</p>
        </div>
      </div>
    </div>
  </div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>