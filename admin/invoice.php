<?php
    include "../config/config.php";
    $noresi = $_GET['noresi'];
    $data = mysqli_fetch_array(mysqli_query($con, "SELECT a.*, b.namaprov AS provpengirim, c.namakota AS kotapengirim, d.namaprov AS provpenerima, e.namakota AS kotapenerima FROM ((((tr_pengiriman a JOIN provinces b ON a.provpengirim = b.id) JOIN regencies c ON a.kotapengirim = c.id) JOIN provinces d ON a.provpenerima = d.id) JOIN regencies e ON a.kotapenerima = e.id) WHERE noresi = '".$noresi."'"))
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Invoice | <?php echo $data['noresi']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body onload="window.print();">
  <style type="text/css">
    .borderless td, .borderless th {
      border:none;
    }
  </style>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice" style="max-width: 500px">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Trans Express Logistic
          <!-- <small class="pull-right">Date: 2/10/2014</small> -->
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-md-8 invoice-col">
        <address>
          <strong>Pengirim:</strong> <?php echo strtoupper($data['namapengirim']); ?><br>
          Alamat: <?php echo strtoupper($data['alamatpengirim']); ?><br>
          <t><?php echo $data['kotapengirim'].', '.$data['provpengirim']; ?><br>
          Kode Pos: <?php echo $data['kodepospengirim']; ?><br>
          Telepon: <?php echo $data['telppengirim']; ?><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        
      </div>
      <!-- /.col -->
      <div class="col-md-4 invoice-col">
        <b>Invoice <?php echo $data['noresi']; ?></b><br>
        <br><!-- 
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567 -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
      <div class="row invoice-info">
        <div class="col-sm-8 invoice-col">
          <address>
            <strong>Penerima:</strong> <?php echo strtoupper($data['namapenerima']); ?><br>
          <?php echo strtoupper($data['alamatpenerima']); ?><br>
          <?php echo $data['kotapenerima'].', '.$data['provpenerima']; ?><br>
          <?php echo $data['kodepospenerima']; ?><br>
          Telepon: <?php echo $data['telppenerima']; ?><br>
          </address>
        </div>    
      </div>

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <div class="row invoice-info">
          <div class="col-sm-6">
            <strong>Deskripsi:</strong><br>
            <address>
              <?php echo strtoupper($data['deskripsipengirim']); ?>
            </address><br>
            <strong>Keterangan:</strong><br>
            <address>
              <?php echo strtoupper($data['ketpengirim']); ?>
            </address>
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%; border-top:1px solid #ffffff;">Tanggal:</th>
              <td style="border-top:1px solid #ffffff"><?php echo date('d-m-Y', strtotime($data['tgl_kirim'])); ?></td>
            </tr>
            <tr>
              <th style="border-top:1px solid #ffffff">Kota Asal</th>
              <td style="border-top:1px solid #ffffff"><?php echo $data['kotapengirim']; ?></td>
            </tr>
            <tr>
              <th style="border-top:1px solid #ffffff">Berat(KG):</th>
              <td style="border-top:1px solid #ffffff"><?php echo $data['berat']; ?></td>
            </tr>
            <!-- <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr> -->
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="border-top:1px solid #ffffff">Pengirim</th>
              <th style="border-top:1px solid #ffffff">&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th style="border-top:1px solid #ffffff">&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th style="border-top:1px solid #ffffff">Penerima</th>
            </tr>
            <tr><td style="border-top:1px solid #ffffff"></td></tr>
            <tr>
              <td style="border-top:1px solid #ffffff"><?php echo $data['namapengirim'] ?></td>
              <td style="border-top:1px solid #ffffff">&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td style="border-top:1px solid #ffffff">&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td style="border-top:1px solid #ffffff">.................</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
