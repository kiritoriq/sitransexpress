<?php
//Ini untuk config (menyambungkan) ke Database
	
	$host = "localhost";
	$username = "root";
	$pass = ""; //kalau sql nya ada password, maka dituliskan disini.
	$db = "sipenba";
	$port = 3308; //optional, tergantung port sql. kalau port sql = 3306 (default) maka tidak usah diberi port

	$con = mysqli_connect($host,$username,$pass,$db,$port) or die(mysqli_error());

	// if($con){
	// 	echo "Berhasil !";
	// } else {
	// 	echo "koneksi gagal!";
	// }