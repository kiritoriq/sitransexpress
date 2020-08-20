<?php
	session_start();
	include "../../config/config.php";

	$user = $_POST['username'];
	$password = md5($_POST['password']);

	$data = mysqli_query($con, "SELECT * FROM user WHERE username='".$user."' AND password='".$password."'");
	// $id = mysqli_fetch_array($data);
	$cek_data = mysqli_num_rows($data);

	if($cek_data > 0){
		$item = mysqli_fetch_array($data);
		$_SESSION['username'] = $item['username'];
		$_SESSION['status'] = "login";
		$_SESSION['role_id'] = $item['role_id'];
			$role = mysqli_fetch_array(mysqli_query($con, "SELECT role FROM roles WHERE id = '".$_SESSION['role_id']."'"));
			$_SESSION['role'] = $role['role'];
		$_SESSION['foto'] = $item['foto'];
		header("location:../index.php?page=dashboard");
	}
	else{
		header("location:../login/index.php?pesan=gagal");
	}
?>