<?php
	include "../../config/config.php";

	$option = '<option value=""></option>';
   
   $prov = isset($_GET['id_prov']) ?  $_GET['id_prov'] :'';
   $kota = isset($_GET['id_kota']) ? $_GET['id_kota'] : '';
   // echo $kota."<br><br>";
   $sql = "select * from regencies where province_id='".$prov."'";
   if($res = $con->query($sql)) {
      while ($row = $res->fetch_assoc()) {
         if($kota == $row['id']){
            $selected = 'selected';
         } else {
            $selected = '';
         }
         $idkota = $row['id'];
	     // echo $row['id']."<br>";
        // $carikota = mysqli_query($con, "SELECT * FROM regencies WHERE province_id='".$prov."' AND id='".$kota."'");
        //  while($data=mysqli_fetch_array($carikota)){
        //     $idkota = $data['id'];
        //     echo $idkota;
        //  }
        // if($kota == $data['id']){
        //  $selected = true;
        // } else {
        //  $selected = false;
        // }
        $option .= "<option value='".$idkota."' ".$selected.">".$row['namakota']."</option>";
      }
   }
   echo $option;
?>