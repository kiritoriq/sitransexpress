<?php

	// data utama
	$nama = $_POST['nama'];
	$noktp = $_POST['noktp'];
	$alamat = $_POST['alamat'];
	$notelp = $_POST['notelp'];
	$username = $_POST['username'];
	$role_id = $_POST['roleid'];
	$pas1 = md5($_POST['password1']);
	$pas2 = md5($_POST['password2']);
	$create = date('Y-m-d H:i:s');

	$q = new Query();
	$sql = "INSERT INTO user VALUES('','".$nama."','".$noktp."','".$alamat."','".$notelp."','".$username."','".$pas1."','".$role_id."','avatar.png','".$create."','".$create."')";
	$insert = $q->query($sql);
	if($insert){
		echo "<script>
				bootbox.alert('Berhasil Disimpan!', function(){
					window.location.href = 'index.php?page=daftaruser';
				})
						
			</script>";		
			// header('Location: http://localhost:81/Projects/sipenba/admin/index.php?page=daftarpengiriman');
	} else {
		return "Error!";
	}
?>