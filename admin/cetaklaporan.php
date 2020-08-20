<?php
    include "../config/config.php";
    $bulan = $_GET['bulan'];
    $query = mysqli_query($con, "SELECT * FROM tr_pengiriman WHERE MONTH(tgl_kirim) = '".$bulan."' AND YEAR(tgl_kirim) = YEAR(NOW()) AND sts_kirim = 2");
    $total = 0;
    function blnpjg($tanggal){
        $bulan = array (
          '01' =>   'Januari',
          '02' =>   'Februari',
          '03' =>   'Maret',
          '04' =>   'April',
          '05' =>   'Mei',
          '06' =>   'Juni',
          '07' =>   'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember'
        );

        return $bulan[$tanggal];
    }
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Keuangan</title>
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
  <section class="invoice" style="padding: 0px; margin: 0px 0px">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h3>
          <i class="fa fa-globe"></i> Trans Express Logistic
          <small class="pull-right">Tanggal: <?php echo date('d-m-Y'); ?></small>
        </h3><br>
        <h1 class="page-header text-center">LAPORAN KEUANGAN BULAN <?php echo strtoupper(blnpjg($bulan)); ?></h1>
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
              <th>Nama Pengirim</th>
              <th>Tujuan</th>
              <th>Tanggal Pengiriman</th>
              <th>Biaya</th>
            </tr>
          </thead>
          <tbody>
              <?php 
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                  echo "<tr>
                          <td>".$no++.".</td>
                          <td>".$data['noresi']."</td>
                          <td>".$data['namapengirim']."</td>
                          <td>".$data['tujuan']."</td>
                          <td>".$data['tgl_kirim']."</td>
                          <td align='right'>".$data['biaya']."</td>
                        </tr>"; 
                $total += (int)$data['biaya']; 
                } 
              ?>
              <tr style="background-color: #3e3e3e; color: white;">
                            <td colspan="5">
                              <b>Total</b>
                            </td>
                            <td align="right"> <b><?php echo $total; ?></b> </td>
                          </tr>
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
