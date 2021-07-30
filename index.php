<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-Pharmacy Dashboard</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/logo/favicon.png">
  <!-- Core css -->
  <link href="assets/css/app.min.css" rel="stylesheet">
    <!-- SWEET ALERT DIALOG -->
  <script src="assets/sweetalert.min.js"></script>

</head>
<body>
  <?php
    if (isset($_POST['login'])) {
      require('db.php');
      $username = $_POST['username'];
      $password = $_POST['password'];
      $sql = "SELECT * FROM tbl_admin WHERE email = '$username' AND password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      if($count == 1) {
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        header("location: home.php");
        exit();
      }else {
         ?>
      <script type="text/javascript">
        swal("OOPS!", "Wrong Email Or Password", "error")
      </script>
      <?php
      }
    }
  ?>

    <div class="app">
        <div class="container-fluid">
            <div class="d-flex full-height p-v-15 flex-column justify-content-between">
                <div class=" d-md-flex p-h-40">
                    <img src="assets/images/logo/e-logo.png" style="max-height: 70px;" alt="">
                    <h4 style="margin-left: 20px;margin-top: 26px;">E Pharmacy Dashboard</h4>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="m-t-20">Sign In</h2>
                                    <p class="m-b-30">Enter your credential to get access</p>
                                    <form action="" method="post"> 
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Username/Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" name="username" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                           
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div style="float: right;">
                                                <button class="btn btn-primary" name="login">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-6 d-none d-md-block">
                            <img class="img-fluid" src="assets/images/others/login-2.png" alt="">
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>
</html>