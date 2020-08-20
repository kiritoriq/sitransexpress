<?php
	include "../config/config.php";

	// data utama
	$noresi = $_POST['noresi'];
	$tgl_kirim = date('Y-m-d', strtotime($_POST['tglkirim']));
	$jam_kirim = $_POST['jamkirim'];
	// $tujuan = $_POST['tujuan'];
	$berat = $_POST['beratbarang'];
	$biaya = $_POST['biayapengiriman'];
	$totbiaya = $_POST['totalbayar'];

	$getnomax = mysqli_query($con, "SELECT max(no) as max FROM tr_pengiriman");
  	$nomax = mysqli_fetch_array($getnomax);
	$nomor = $nomax['max']+1;
	$cekkirim = $_POST['cekkirim'];
	// data pengirim
	if($cekkirim==1){
		$kdplg = $_POST['kdplg'];
	} else {
		$kdplg = $_POST['kdplg2'];
	}
	$namapengirim = $_POST['namapengirim'];
	$alamatpengirim = $_POST['alamatpengirim'];
	$provpengirim = $_POST['provpengirim'];
	$kotapengirim = $_POST['kotapengirim'];
	$kodepospengirim = $_POST['kodepospengirim'];
	$telppengirim = $_POST['telppengirim'];
	$deskripsipengirim = $_POST['deskripsipengirim'];
	$isbahaya = $_POST['isbahaya'];
	$ketpengirim = $_POST['ketpengirim'];
	// data penerima
	$namapenerima = $_POST['namapenerima'];
	$alamatpenerima = $_POST['alamatpenerima'];
	$provpenerima = $_POST['provpenerima'];
	$kotapenerima = $_POST['kotapenerima'];
	$kodepospenerima = $_POST['kodepospenerima'];
	$telppenerima = $_POST['telppenerima'];
	// $deskripsibarang = $_POST['deskripsibarang'];
	$sts_kirim = 0;
	$create = date('Y-m-d H:i:s');

	if($cekkirim == 1){
		$insert = "INSERT INTO tr_pengiriman VALUES('','".$noresi."','".$nomor."','".$tgl_kirim."','".$jam_kirim."','','".$berat."','".$biaya."','".$totbiaya."','".$kdplg."','".$namapengirim."','".$alamatpengirim."','".$provpengirim."','".$kotapengirim."','".$kodepospengirim."','".$telppengirim."','".$deskripsipengirim."','".$isbahaya."','".$ketpengirim."','".$namapenerima."','".$alamatpenerima."','".$provpenerima."','".$kotapenerima."','".$kodepospenerima."','".$telppenerima."','','".$sts_kirim."','".$create."','".$create."')";
		if(mysqli_query($con, $insert)){
			echo "<script>
							bootbox.confirm('Cetak Invoice?', function(a){
								if(a==true){
									window.open('invoice.php?noresi=".$noresi."');
									window.location.href = 'index.php?page=daftarpengiriman';
									
								} else {
									window.location.href = 'index.php?page=daftarpengiriman';
								}
								})
							
				</script>";		
				// header('Location: http://localhost:81/Projects/sipenba/admin/index.php?page=daftarpengiriman');
		} else {
			return "Error!";
		}
	} else {
		$insert = "INSERT INTO tr_pengiriman VALUES('','".$noresi."','".$nomor."','".$tgl_kirim."','".$jam_kirim."','','".$berat."','".$biaya."','".$totbiaya."','".$kdplg."','".$namapengirim."','".$alamatpengirim."','".$provpengirim."','".$kotapengirim."','".$kodepospengirim."','".$telppengirim."','".$deskripsipengirim."','".$isbahaya."','".$ketpengirim."','".$namapenerima."','".$alamatpenerima."','".$provpenerima."','".$kotapenerima."','".$kodepospenerima."','".$telppenerima."','','".$sts_kirim."','".$create."','".$create."')";
		if(mysqli_query($con, $insert)){
			$insertpelanggan = mysqli_query($con, "INSERT INTO master_pelanggan VALUES('','".$kdplg."','".$namapengirim."','".$alamatpengirim."','".$provpengirim."','".$kotapengirim."','".$kodepospengirim."','".$telppengirim."','".$create."','".$create."')");
			echo "<script>
							bootbox.confirm('Cetak Invoice?', function(a){
								if(a==true){
									window.open('invoice.php?noresi=".$noresi."');
									window.location.href = 'index.php?page=daftarpengiriman';
									
								} else {
									window.location.href = 'index.php?page=daftarpengiriman';
								}
								})
							
				</script>";		
				// header('Location: http://localhost:81/Projects/sipenba/admin/index.php?page=daftarpengiriman');
		} else {
			return "Error!";
		}
	}

?>