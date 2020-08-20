<?php

	include "../../config/config.php";
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$query = mysqli_query($con, "SELECT a.*, b.namaprov AS provpengirim, c.namakota AS kotapengirim, d.namaprov AS provpenerima, e.namakota AS kotapenerima FROM ((((tr_pengiriman a JOIN provinces b ON a.provpengirim = b.id) JOIN regencies c ON a.kotapengirim = c.id) JOIN provinces d ON a.provpenerima = d.id) JOIN regencies e ON a.kotapenerima = e.id) WHERE a.noresi LIKE '%".$cari."%' ORDER BY created_at DESC");
			$cek = mysqli_num_rows($query);
		if($cek > 0){
			while($data = mysqli_fetch_array($query)){
					$item[] = array(
						"id" => $data['id'],
						"noresi" => $data['noresi'],
						"tgl_kirim" => $data['tgl_kirim'],
						"tujuan" => $data['tujuan'],
						"namapengirim" => $data['namapengirim'],
						"alamatpengirim" => $data['alamatpengirim'],
						"kotapengirim" => $data['kotapengirim'],
						"kodepospengirim" => $data['kodepospengirim'],
						"provpengirim" => $data['provpengirim'],
						"namapenerima" => $data['namapenerima'],
						"alamatpenerima" => $data['alamatpenerima'],
						"kotapenerima" => $data['kotapenerima'],
						"kodepospenerima" => $data['kodepospenerima'],
						"provpenerima" => $data['provpenerima'],
						"sts_kirim" => $data['sts_kirim']
					);
			}
		} else {
			$item = array();
		}
		$json = array(
			'status' => '200',
			'message' => 'Success',
			'data' => $item
		);
	} else {
		$query = mysqli_query($con, "SELECT a.*, b.namaprov AS provpengirim, c.namakota AS kotapengirim, d.namaprov AS provpenerima, e.namakota AS kotapenerima FROM ((((tr_pengiriman a JOIN provinces b ON a.provpengirim = b.id) JOIN regencies c ON a.kotapengirim = c.id) JOIN provinces d ON a.provpenerima = d.id) JOIN regencies e ON a.kotapenerima = e.id) ORDER BY created_at DESC");
		$cek = mysqli_num_rows($query);
		if($cek > 0) {
			while($data = mysqli_fetch_array($query)){
				$item[] = array(
					"id" => $data['id'],
					"noresi" => $data['noresi'],
					"tgl_kirim" => $data['tgl_kirim'],
					"tujuan" => $data['tujuan'],
					"namapengirim" => $data['namapengirim'],
					"alamatpengirim" => $data['alamatpengirim'],
					"kotapengirim" => $data['kotapengirim'],
					"kodepospengirim" => $data['kodepospengirim'],
					"provpengirim" => $data['provpengirim'],
					"namapenerima" => $data['namapenerima'],
					"alamatpenerima" => $data['alamatpenerima'],
					"kotapenerima" => $data['kotapenerima'],
					"kodepospenerima" => $data['kodepospenerima'],
					"provpenerima" => $data['provpenerima'],
					"sts_kirim" => $data['sts_kirim']
				);
			}
		} else {
			$item = array();
		}

		$json = array(
			'status' => '200',
			'message' => 'Success',
			'data' => $item
		);
	}

	echo json_encode($json);