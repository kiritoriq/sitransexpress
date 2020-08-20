<?php

	include "../../config/config.php";
		$id = $_GET['id'];
		$query = mysqli_query($con, "SELECT * FROM tr_pengiriman WHERE id = '".$id."'");
		$cek = mysqli_num_rows($query);
		if($cek > 0) {
			while($data = mysqli_fetch_array($query)){
				$item[] = array(
					"id" => $data['id'],
					"noresi" => $data['noresi'],
					"tgl_kirim" => $data['tgl_kirim'],
					"jam_kirim" => $data['jam_kirim'],
					"tujuan" => $data['tujuan'],
					"berat" => $data['berat'],
					"biaya" => $data['biaya'],
					"totbiaya" => $data['totbiaya'],
					"namapengirim" => $data['namapengirim'],
					"alamatpengirim" => $data['alamatpengirim'],
					"kotapengirim" => $data['kotapengirim'],
					"kodepospengirim" => $data['kodepospengirim'],
					"provpengirim" => $data['provpengirim'],
					"telppengirim" => $data['telppengirim'],
					"deskripsipengirim" => $data['deskripsipengirim'],
					"isbahaya" => $data['isbahaya'],
					"ketpengirim" => $data['ketpengirim'],
					"namapenerima" => $data['namapenerima'],
					"alamatpenerima" => $data['alamatpenerima'],
					"kotapenerima" => $data['kotapenerima'],
					"kodepospenerima" => $data['kodepospenerima'],
					"provpenerima" => $data['provpenerima'],
					"telppenerima" => $data['telppenerima'],
					"deskripsibarang" => $data['deskripsibarang'],
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

	echo json_encode($json);