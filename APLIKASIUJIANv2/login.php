<?php 
	require_once "core/init.php";

  if ($user->ckuser()) {
    echo "<script>location='index.php';</script>";
  }

  if (input::get('login')) {
    if ( token::check(input::get('token'))) {
      if ($user->cek_user(input::get('username'))){
        if ($user->loginuser(input::get('username'), input::get('password'))) {
        }else{
          echo "<script>alert('Login Gagal')</script>";
        }
      }else{
        echo "<script>alert('Username Belum Terdaftar')</script>";
      }
    }
  }



 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/logofti.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistem Ujian Online FTI UNIBBA</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- manual CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link href='assets/css/roboto.css' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<body class="header colorblue">
  <div class="container">
    <div class="row">
    <div class="col-lg-3"></div>
      <div class="col-sm-9 col-md-7 col-lg-6">
        <div class="card" style="padding: 30px; margin-top: 25%">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form method="post" class="form-signin" style="padding: 20px">
              <div class="form-label-group">
                <label for="InUsername">Username</label>
                <input type="text" name="username" id="InUsername" class="form-control" placeholder="Username" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="InPassword">Password</label>
                <input type="password" name="password" id="InPassword" class="form-control" placeholder="password" required>
              </div>
              <br>
              <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
              <input type="submit" name="login" class="btn btn-lg btn-primary btn-block text-uppercase" value="Login Sekarang">
<!--               <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Login Sekarang</button> -->
              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
 <!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>