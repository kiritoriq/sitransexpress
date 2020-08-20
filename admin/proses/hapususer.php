<?php
	include "../../config/config.php";

	// data utama
	$id = $_POST['id'];
	$message = "";
	$delete = "DELETE FROM user WHERE id = '".$id."'";
	if(mysqli_query($con, $delete)){
		$message = "Data Berhasil Dihapus";	
		// echo "<script>
		// 		bootbox.alert('".$message."', function(){
		// 			window.location.href = 'index.php?page=daftaruser';
		// 		})
						
		// 	</script>";	
			// header('Location: http://localhost:81/Projects/sipenba/admin/index.php?page=daftarpengiriman');
	} else {
		$message = "Error!";
	}

	echo $message;