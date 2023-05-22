<?php

//include
require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../Controllers/ProcedureControllers.php');

//llama a la clase
$user = new ProcedureControllers();


// echo $_POST['arrprincipal'];

$requestBody = file_get_contents('php://input');

// Decode the JSON data into a PHP array
$datas = json_decode($requestBody, true);

var_dump($datas);

foreach ($datas as $data) {
  # code...

  $user->updateDetails($data[0], $data[2]);
}


