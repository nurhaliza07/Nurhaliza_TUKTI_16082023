<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <style>
    .login-page {
      background-image: url("<?php echo base_url(); ?>assets/img/poliban_bg.jpg");
      background-position: center center;
      background-size: cover;
      background-attachment: fixed;

    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?php echo base_url(); ?>assets/img/logo_poliban.png">
     
         <span class="text-warning"><b>Poliban </b></a></span>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login Disini</p>

        <form action="<?php echo base_url("login"); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">

            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
            <div class="col-4">

            </div>

          </div>
        </form>
        <div class="row">
          <div class="col-12 text-center">
            <span class="badge badge-warning"><?php echo $pesan; ?></span>
          </div>
        </div>
        </div> 
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>