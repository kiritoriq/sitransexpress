<?php
  session_start();
  if($_SESSION['status']!="login"){
    header("location:login/index.php");
  }
  require_once('header.php');
  require_once('proses/query.php');
  $page = (isset($_GET['page']))? $_GET['page'] : "dashboard" ;
  require_once('sidebar.php');
  echo "<div class='content-wrapper' id='utama'>";

  switch($page){

    case 'masterprovinsi':
    include "masterprov.php";
    break;

    case 'masterkota':
    include "masterkota.php";
    break;

    case 'konfirmasikirim':
    include "konfirmasipengiriman.php";
    break;

    case 'updatestatuskirim':
    include "proses/updatestatuskirim.php";
    break;

    case 'laporankeu':
    include "laporan.php";
    break;

    case 'daftaruser':
    include "daftaruser.php";
    break;

    case 'buatuser':
    include "createuser.php";
    break;

    case 'simpanuser':
    include "proses/createuser.php";
    break;

    case 'edituser':
    include "edituser.php";
    break;

    case 'updateuser':
    include "proses/updateuser.php";
    break;

    case 'daftarpengiriman':
    include "daftarpengiriman.php";
    break;

    case 'caripengiriman':
    include "daftarpengiriman.php";
    break;

    case 'inputpengiriman':
    include "inputpengiriman.php";
    break;

    case 'simpanpengiriman':
    include "proses/inputpengiriman.php";
    break;

    case 'editpengiriman':
    include "editpengiriman.php";
    break;

    case 'updatepengiriman':
    include "proses/editpengiriman.php";
    break;

    case 'dashboard' :
    default :
    include "dashboard.php";
    break;
  }
  echo "</div>";
  require_once('footer.php');
?>
