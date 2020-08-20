<?php
	include "../../config/config.php";

	$id_prov = $_GET['id_prov'];
  $harga = 0;
  $pulau = mysqli_query($con, "SELECT LEFT(id,1) as kd_pulau FROM provinces WHERE id = '".$id_prov."'");
  $data = mysqli_fetch_array($pulau);
  if($data['kd_pulau'] == 1 || $data['kd_pulau'] == 2){
    if($id_prov == 11){
      $harga = 7300;
    } else if($id_prov == 12){
      $harga = 5500;
    } else if($id_prov == 13){
      $harga = 4900;
    } else if($id_prov == 14){
      $harga = 5500;
    } else if($id_prov == 15){
      $harga = 4300;
    } else if($id_prov == 17){
      $harga = 4000;
    } else if($id_prov == 18){
      $harga = 4300;
    } else if($id_prov == 16){
      $harga = 4900;
    }
  } else if($data['kd_pulau'] == 3){
    if($id_prov == 33){
      $harga = 2000;
    } else {
      $harga = 3000;
    }
  } else if($data['kd_pulau'] == 6){
    $harga = 6000;
  } else if($data['kd_pulau'] == 7){
    $harga = 9000;
  } else if($data['kd_pulau'] == 9){
    $harga = 12000;
  } else {
    $harga = 13000;
  }

  echo $harga;
?>

