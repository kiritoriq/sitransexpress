<?php
//ini adalah file API Services (Representasi Data) untuk mengambil data dari database.
	include "../../config/config.php";
		$noresi = $_GET['noresi'];
		$query = mysqli_query($con, "SELECT a.*, b.namaprov AS namaprovpengirim, c.namakota AS namakotapengirim, d.namaprov AS namaprovpenerima, e.namakota AS namakotapenerima FROM ((((tr_pengiriman a JOIN provinces b ON a.provpengirim = b.id) JOIN regencies c ON a.kotapengirim = c.id) JOIN provinces d ON a.provpenerima = d.id) JOIN regencies e ON a.kotapenerima = e.id) WHERE noresi = '".$noresi."'");
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
					"id_kotapengirim" => $data['kotapengirim'],
					"kotapengirim" => $data['namakotapengirim'],
					"kodepospengirim" => $data['kodepospengirim'],
					"id_provpengirim" => $data['provpengirim'],
					"provpengirim" => $data['namaprovpengirim'],
					"telppengirim" => $data['telppengirim'],
					"deskripsipengirim" => $data['deskripsipengirim'],
					"isbahaya" => $data['isbahaya'],
					"ketpengirim" => $data['ketpengirim'],
					"namapenerima" => $data['namapenerima'],
					"alamatpenerima" => $data['alamatpenerima'],
					"id_kotapenerima" => $data['kotapenerima'],
					"kotapenerima" => $data['namakotapenerima'],
					"kodepospenerima" => $data['kodepospenerima'],
					"id_provpenerima" => $data['provpenerima'],
					"provpenerima" => $data['namaprovpenerima'],
					"telppenerima" => $data['telppenerima'],
					"deskripsibarang" => $data['deskripsibarang'],
					"sts_kirim" => $data['sts_kirim']
				);
			}
			$json = array(
				'status' => '200',
				'message' => 'Success, Data Ditemukan!',
				'data' => $item
			);
		} else {
			$item = array();
			$json = array(
				'status' => '500',
				'message' => 'Error, Data Tidak Ditemukan!',
				'data' => $item
			);
		}


	echo json_encode($json);