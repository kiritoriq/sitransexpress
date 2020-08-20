<?php
	
	include "../../config/config.php";

	$kdplg = $_GET['kdplg'];
	$query = mysqli_query($con, "SELECT * FROM master_pelanggan WHERE kdplg='".$kdplg."'");
	$cek = mysqli_num_rows($query);
	if($cek > 0){
		$statuscode = 200;
		$message = "Data Berhasil ditemukan";
		while($data = mysqli_fetch_array($query)){
			$item[] = array(
				"kd_plg" => $data['kdplg'],
				"nama" => $data['nama'],
				"alamat" => $data['alamat'],
				"id_provinsi" => $data['prov'],
				"id_kota" => $data['kota'],
				"kodepos" => $data['kodepos'],
				"notelp" => $data['notelp']
			);
		}
	} else {
		$statuscode = 500;
		$message = "Data Pelanggan tidak ditemukan atau Belum Terdaftar";
		$item = array();
	}

	$json = array(
		'status' => $statuscode,
		'message' => $message,
		'data' => $item
	);

	echo json_encode($json);
	