<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    html{      
      /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fefcea+0,f95339+100 */
      background: #1034a6; /* Old browsers */
      background: -moz-linear-gradient(top,  #1034a6 0%, #f95339 100%); /* FF3.6-15 */
      background: -webkit-linear-gradient(top,  #1034a6 0%,#f95339 100%); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(to bottom,  #1034a6 0%,#f95339 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1034a6', endColorstr='#f95339',GradientType=0 ); /* IE6-9 */      
    }
    body{
        padding-top: .62em;
        height: 100%;
        height: 100vh;
        background-color: transparent;        
        background-position: bottom center;
        background-repeat: repeat-x;
    }
    .login-logo{
      font-size: 23px;
      text-transform: uppercase;
      line-height: 1.1em;
      font-weight: 400;
      -webkit-animation-delay: .3s;
           -o-animation-delay: .3s;
              animation-delay: .3s;
    }
    .login-logo img{
      display: block;
      margin: 10px auto;
    }
    .login-box{
      margin: 4% auto;
    }
    .login-box-body{
      margin-bottom: 15px;
      -webkit-animation-delay: .6s;
           -o-animation-delay: .6s;
              animation-delay: .6s;
    }
    .login-box-body .form-group{
      -webkit-animation-delay: .9s;
           -o-animation-delay: .9s;
              animation-delay: .9s;
    }
    .login-box-body .form-group+.form-group{
      -webkit-animation-delay: 1.2s;
           -o-animation-delay: 1.2s;
              animation-delay: 1.2s;
    }
    .login-box-body .row{
      -webkit-animation-delay: 1.5s;
           -o-animation-delay: 1.5s;
              animation-delay: 1.5s;
    }
    .login-box p{
      -webkit-animation-delay: 1.8s;
           -o-animation-delay: 1.8s;
              animation-delay: 1.8s;
    }
    .login-box p a{
      color: inherit;
    }
  </style>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <a href="login.php">   
      <!-- <img src="{!!asset('packages/tugumuda/images/logo.png')!!}" width="auto" height="120" alt="Poltekkes Kemenkes Semarang"> -->
      <div style="color: #fefcea;">
      <b>Si</b>stem Informasi<br><b>Pen</b>giriman <b>Ba</b>rang
    </div>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login untuk masuk ke Aplikasi</p>

    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->
    <a href="register.html" class="text-center">Daftar Baru</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
