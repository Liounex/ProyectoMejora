<?php

//include
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/ProcedureControllers.php');

//llama a la clase
$user = new ProcedureControllers();


// echo $pago_id."</br>";
// echo $userID["usuario_id"]."</br>";

// echo $cantidadDocs."</br>";
// echo $montoTotal."</br>";
$cantidadD = $_POST['cantidad'];




echo "<pre>";
var_dump($_FILES);
echo "</pre>";

$basenameImg = $_FILES["fileDni"]["name"];
$basenameFile = $_FILES["fileVoucher"]["name"];
$nameImage = $_FILES["fileDni"]["tmp_name"];
$nameFile = $_FILES["fileVoucher"]["tmp_name"];
$rutaImage = "../uploads/$basenameImg"; // especificar  el nombre del archivo
$rutaFile = "../uploads/$basenameFile"; // especificar  el nombre del archivo
echo $rutaImage."<br>";
echo $rutaFile."<br>";

move_uploaded_file($nameImage, $rutaImage);
move_uploaded_file($nameFile, $rutaFile);

// CAMBIAR FECHA
date_default_timezone_set('America/Lima');
$date = date('Y-m-d H:i:s');


$pagoId = $_POST['codigo'];
$tramiteId = "tr_".$_POST['codigo'];
$idioma = $_POST['idioma'];

echo $_POST['codigo']."</br>";
echo "tr_".$_POST['codigo']."</br>";
echo $_POST['idioma']."</br>";
echo $cantidadD."</br>";
echo $date."</br>";

// insertar datos a tabla tramite
$user->code($tramiteId, $pagoId, $rutaImage, $idioma, $date);


// inserta detalle_tramite
$tipoTramite = $_POST['tprocedure'];
echo $tipoTramite;

// insertar datos a la tabla detalle_tramite
if($tipoTramite == 'Certificado de Estudios' || $tipoTramite == 'Constancia de Estudios') {

  // crear un array
  $mainArray = array();

  for ($i=1; $i <= $cantidadD; $i++) { 
    # code...
    $tempArray =array();  

    // agregar
    array_push($tempArray, $_POST["doc".$i], $_POST["doci".$i]);
    // echo $_POST["doc".$i]." ".$_POST["doci".$i]."</br>";
    // var_dump($tempArray);
    array_push($mainArray, $tempArray);
  }

  // print_r($mainArray);
  foreach ($mainArray as $key) {
    # code...
    print_r($key)."</br>";
  }

  foreach ($mainArray as $item) {
    # code...
    
    echo "<br>".$tramiteId ." ". $item[0] ." ". $item[1];
    // $user->detail($tramiteId, $item[0], $item[1]);
  }

}
else if ($tipoTramite == 'Examen de Suficiencia') {
  echo $_POST["doc1"];  

  $user->detailExamenOne($tramiteId, $_POST["doc1"]);

}
else if ($tipoTramite == 'Examen de Ubicacion') {
  echo "Nivel I-VIII";
  // $tramiteId
  $user->detailExamenOne($tramiteId, "Nivel I-VIII");

}


