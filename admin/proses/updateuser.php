<?php

	// data utama
	$id = $_POST['id'];
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
	
	$sql = "UPDATE user SET nama = '".$nama."', noktp = '".$noktp."', alamat = '".$alamat."', notelp = '".$notelp."', username = '".$username."', password = '".$pas1."', role_id = '".$role_id."', updated_at = '".$create."' WHERE id = '".$id."'";
	$update = $q->query($sql);
	if($update){
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