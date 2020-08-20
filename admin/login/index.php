<?php
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "Login gagal! username dan password salah!";
    }else if($_GET['pesan'] == "logout"){
      echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
      echo "Anda harus login untuk mengakses halaman admin";
    }
  }
  include "header.php";
?>

<body class="hold-transition">
<div class="login-box">
  <div class="login-logo animated fadeInDown">
    <a href="index.php">    
      <!-- <img src="{!!asset('packages/tugumuda/images/logo.png')!!}" width="auto" height="120" alt="Poltekkes Kemenkes Semarang"> -->
      <div style="color: #fefcea;">
      <b>Si</b>stem Informasi<br><b>Pen</b>giriman <b>Ba</b>rang<br><b>Trans Express Logistic</b>
    </div>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body animated zoomIn">
    <p class="login-box-msg">Login untuk masuk ke Aplikasi</p>

    <form action="../proses/login.php" method="post">
      <div class="form-group has-feedback animated zoomIn">
        <input type="text" name='username' id="username" class="form-control" required placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback animated zoomIn">
        <input type="password" name='password' class="form-control" required placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row animated zoomIn">
        <div class="col-xs-4">&nbsp;</div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
          <div class="col-xs-4">
              <button type="reset" class="btn btn-default btn-block btn-flat">Reset</button>
          </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <p style="color: #fefcea;" class="text-center animated fadeInUp">Copyrights &copy; 2020 <b>Trans Express Logistic</b> All rights Reserved</p>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.min.js"></script>
<script>
$('#username').focus();
</script>
<style>
    #rc-imageselect {transform:scale(1.06);-webkit-transform:scale(1.06);transform-origin:0 0;-webkit-transform-origin:0 0;}

    @media screen and (max-height: 575px){
        #rc-imageselect, .g-recaptcha {transform:scale(1.06);-webkit-transform:scale(1.06);transform-origin:0 0;-webkit-transform-origin:0 0;}
    }
</style>
</body>
</html>
