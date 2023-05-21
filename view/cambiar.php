<?php

//include
require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../Controllers/ProcedureControllers.php');

//llama a la clase
$user = new ProcedureControllers();

// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
// echo $_FILES['name'];

// Get the JSON data from the request body
// $requestBody = file_get_contents('php://input');

// Decode the JSON data into a PHP array
// $data = json_decode($requestBody, true);
// $dataFiles = $data['array1'];
// $dataInfo = $data['array2'];

// var_dump($_FILES);
// var_dump($dataInfo);
// var_dump($dataFiles);


// echo $_POST['variable2'];

$arrayResults = array();
if (!isset($_FILES["fileVoucher"]["name"])) {
  // echo "Variable 'b' is set.";
  $basenameImg = $_FILES["fileDni"]["name"];
  $nameImage = $_FILES["fileDni"]["tmp_name"];
  // $nameFile = $_FILES["fileVoucher"]["tmp_name"];
  $rutaImage = "./uploads/$basenameImg"; 
  // $rutaFile = "./uploads/$basenameFile"; 
  // echo $rutaImage."<br>";
  // echo json_decode($rutaFile);
  // move_uploaded_file($nameFile, $rutaFile);
  // array_push($arrayResults, 2, $rutaImage);
  move_uploaded_file($nameImage, $rutaImage);
  $user->updateDoc($rutaImage, $_POST['variable2']);
  echo $rutaImage;
//   echo $_POST['variable2'];
  // echo json_encode($arrayResults);
} 
else {
  // $nameImage = $_FILES["fileDni"]["tmp_name"];
  $basenameFile = $_FILES["fileVoucher"]["name"];
  $nameFile = $_FILES["fileVoucher"]["tmp_name"];
  // $rutaImage = "../uploads/$basenameImg"; 
  $rutaFile = "./uploads/$basenameFile"; 
  // echo $rutaImage."<br>";
  // echo json_decode($rutaFile);
  move_uploaded_file($nameFile, $rutaFile);
  $user->updateImagenPago($rutaFile, $_POST['variable2']);
  // array_push($arrayResults, 1, $rutaFile);
  // echo json_encode($arrayResults);
  echo $rutaFile;
//   echo $_POST['variable2'];
}



