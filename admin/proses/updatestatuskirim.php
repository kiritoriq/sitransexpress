<?php
	ini_set('display_errors', 1);
	include "../config/config.php";

	// data utama
	$noresi = $_POST['noresi'];
	$sts_kirim = $_POST['sts_kirim'];
	$updated_at = date('Y-m-d H:i:s');
	// $create = date('Y-m-d H:i:s');

	$update = "UPDATE tr_pengiriman SET sts_kirim = '".$sts_kirim."', updated_at = '".$updated_at."'  WHERE noresi = '".$noresi."'";
	if(mysqli_query($con, $update)){
		echo "<script>
				bootbox.alert('Berhasil diedit!', function(){
						window.location.href = 'index.php?page=konfirmasikirim';
					})
			</script>";		
			// header('Location: http://localhost:81/Projects/sipenba/admin/index.php?page=daftarpengiriman');
	} else {
		echo "<script>alert('Error, ".mysqli_error($con)."');</script>";
		// echo "Error!";
	}
?>