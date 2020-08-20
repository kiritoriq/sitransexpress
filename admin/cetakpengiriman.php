<?php
    include "../config/config.php";
    $query = mysqli_query($con, "SELECT a.*, b.namaprov AS provpengirim, c.namakota AS kotapengirim, d.namaprov AS provpenerima, e.namakota AS kotapenerima FROM ((((tr_pengiriman a JOIN provinces b ON a.provpengirim = b.id) JOIN regencies c ON a.kotapengirim = c.id) JOIN provinces d ON a.provpenerima = d.id) JOIN regencies e ON a.kotapenerima = e.id)");
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Pengiriman</title>
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
  <style type="text/css">
    body {
      font-family: "Times New Roman", Times, Serif;
    }
    table tr td,
    table tr th {
      font-size: 10pt;
    }

  </style>
<body onload="window.print();" style="max-width: 100%">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice" style="margin: 10px 15px">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h3>
          <i class="fa fa-globe"></i> Trans Express Logistic
          <small class="pull-right">Tanggal: <?php echo date('d-m-Y'); ?></small>
        </h3><br>
        <h1 class="page-header text-center">LAPORAN PENGIRIMAN BARANG</h1>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>No. Resi</th>
              <th>Tanggal Pengiriman</th>
              <th>Tujuan</th>
              <th>Nama Pengirim</th>
              <th>Alamat Pengirim</th>
              <th>Kota</th>
              <th>Kode Pos</th>
              <th>Provinsi</th>
              <th>Status Pengiriman</th>
            </tr>
          </thead>
          <tbody>
              <?php 
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                  if($data['sts_kirim'] == 1){
                    $status = "Sedang Dalam Proses";
                  } else {
                    $status = "Paket Sudah Diterima";
                  }
                  echo "<tr>
                          <td>".$no++.".</td>
                          <td>".$data['noresi']."</td>
                          <td>".$data['tgl_kirim']."</td>
                          <td>".$data['tujuan']."</td>
                          <td>".$data['namapengirim']."</td>
                          <td>".$data['alamatpengirim']."</td>
                          <td>".$data['kotapengirim']."</td>
                          <td>".$data['kodepospengirim']."</td>
                          <td>".$data['provpengirim']."</td>
                          <td>".$status."</td>
                        </tr>"; 
                } 
              ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
