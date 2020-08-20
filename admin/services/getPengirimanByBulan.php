<?php

	include "../../config/config.php";
		$bulan = $_GET['bulan'];
		$query = mysqli_query($con, "SELECT a.*, a.provpenerima as idprovpenerima, a.kotapenerima as idkotapenerima, b.namaprov as provpenerima, c.namakota as kotapenerima FROM ((tr_pengiriman a JOIN provinces b ON a.provpenerima = b.id) JOIN regencies c ON a.kotapenerima = c.id) WHERE MONTH(a.tgl_kirim) = '".$bulan."' AND YEAR(a.tgl_kirim) = YEAR(NOW()) AND a.sts_kirim = 2");
		$total = 0;
		$cek = mysqli_num_rows($query);
		if($cek > 0) {
			while($data = mysqli_fetch_array($query)){
				$item[] = array(
					"id" => $data['id'],
					"noresi" => $data['noresi'],
					"tgl_kirim" => $data['tgl_kirim'],
					"jam_kirim" => $data['jam_kirim'],
					"tujuan" => $data['tujuan'],
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
					"idkotapenerima" => $data['idkotapenerima'],
					"kodepospenerima" => $data['kodepospenerima'],
					"idprovpenerima" => $data['idprovpenerima'],
					"provpenerima" => $data['provpenerima'],
					"kotapenerima" => $data['kotapenerima'],
					"telppenerima" => $data['telppenerima'],
				);
				$total += (int)$data['totbiaya'];
			}
		} else {
			$item = array();
		}

		$json = array(
			'status' => '200',
			'message' => 'Success',
			'data' => $item,
			'total' => $total
		);

	echo json_encode($json);