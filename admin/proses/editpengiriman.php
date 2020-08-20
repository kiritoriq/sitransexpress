<?php
	include "../config/config.php";

	// data utama
	$id = $_POST['id'];
	$noresi = $_POST['noresi'];
	$tgl_kirim = date('Y-m-d', strtotime($_POST['tglkirim']));
	$jam_kirim = $_POST['jamkirim'];
	// $tujuan = $_POST['tujuan'];
	$berat = $_POST['beratbarang'];
	$biaya = $_POST['biayapengiriman'];
	// data pengirim
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
	$sts_kirim = $_POST['sts_kirim'];
	// $create = date('Y-m-d H:i:s');

	$update = "UPDATE tr_pengiriman SET tgl_kirim = '".$tgl_kirim."', jam_kirim = '".$jam_kirim."', berat = '".$berat."', biaya = '".$biaya."', namapengirim = '".$namapengirim."', alamatpengirim = '".$alamatpengirim."', provpengirim = '".$provpengirim."', kotapengirim = '".$kotapengirim."', kodepospengirim = '".$kodepospengirim."', telppengirim = '".$telppengirim."', deskripsipengirim = '".$deskripsipengirim."', isbahaya = '".$isbahaya."', ketpengirim = '".$ketpengirim."', namapenerima = '".$namapenerima."', alamatpenerima = '".$alamatpenerima."', provpenerima = '".$provpenerima."', kotapenerima = '".$kotapenerima."', kodepospenerima = '".$kodepospenerima."', telppenerima = '".$telppenerima."', sts_kirim = '".$sts_kirim."' WHERE id = ".$id;
	if(mysqli_query($con, $update)){
		echo "<script>
				bootbox.alert('Berhasil diedit!', function(){
						window.location.href = 'index.php?page=daftarpengiriman';
					})
			</script>";		
			// header('Location: http://localhost:81/Projects/sipenba/admin/index.php?page=daftarpengiriman');
	} else {
		return "Error!";
	}
?>