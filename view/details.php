<style>
  
</style>

<?php

include_once __DIR__ . '/layout/headmenu.php';
// include_once __DIR__ . '/layout/nav.php';
require_once(APP_ROOT . '/../Controllers/UserControllers.php');


$user = new UserControllers();

// $baseURL = "$_SERVER[REQUEST_URI]";
// echo $baseURL."<br>";
$arrayURI = $_POST['codtramite'];
// echo $arrayURI[1];

// consulta al detalle del tramite
$tramiteDetail = $user->showDetail($arrayURI);

// var_dump($tramiteDetail);
?>



<div class="detailContainer">
  <div class="infoContainer">
    <div class="inputContainer">
      <span>TRAMITE ID: <?=$tramiteDetail['tramite_id']?></span>
    </div>
    <div class="inputContainer">
      <span>TIPO TRAMITE: <?=$tramiteDetail['nombre']?></span>
    </div>
    <div class="inputContainer">
      <span>IDIOMA: <?=$tramiteDetail['idioma']?></span>
    </div>
    <div class="inputContainer">
      <span>OBSERVACIONES: <?=$tramiteDetail['observacion']?></span>
    </div>
  </div>

  <div class="docsContainer">
    <img class="imagenPago" src="<?=$tramiteDetail['voucher'] ?>" alt="">
    <object data="<?=$tramiteDetail['copia']?>" type="application/pdf"  height="450">
      <p>
        You don't have a PDF plugin, but you can
        <a href="mypdf.pdf">download the PDF file. </a>
      </p>
    </object>
    
  </div>


</div>














