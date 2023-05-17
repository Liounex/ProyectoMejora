<?php
//include
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/ProcedureControllers.php');

//llama a la clase
$user = new ProcedureControllers();
$num = rand(10000000, 99999999);
// Convertir el número a una cadena de texto
$str = strval($num);
// Si la cadena es menor de 8 dígitos, añadir ceros al principio hasta completar 8 dígitos
if (strlen($str) < 8) {
  $str = str_pad($str, 8, "0", STR_PAD_LEFT);
}
//$id_codigo = strtoupper('NU'.uniqid() . bin2hex(6));
//id de usuario
//$id_codigo = str_pad(mt_rand(0, 999999), 8, '0', STR_PAD_LEFT);

// verificar si es nuevo usuario
$userID = $user->getUserId($_POST['dni']);

if (empty($userID)) {
  // agregar nuevo usuario
  $user->newprocedure($_POST['dni'],$_POST['nombre'], $_POST['ap_paterno'],$_POST['ap_materno'], $_POST['correo'], $_POST['celular'],$_POST['idtipo']);

  // $last_id = $conn->lastInsertId();
  $userID = $user->getUserId($_POST['dni']);

}


// nuevo tramite y genera el pago con la fecha de ahora
$default = 1;
$pago_id = strtoupper(uniqid() . bin2hex(8));
date_default_timezone_set('America/Lima');
$date = date('Y-m-d H:i:s');
// $user->code($pago_id, $_POST['dni'], 0, $_POST['tprocedure'], $default, $str);

// determinar monto
$montoTotal = '';
$cantidadDocs = $_POST['cantidad'];
$tipoTramite = $_POST['tprocedure'];

if ( $tipoTramite == 1) {
  $montoTotal = 20 * $cantidadDocs;
}
else if ( $tipoTramite == 2) {
  $montoTotal = 15 * $cantidadDocs;
}
else if ( $tipoTramite == 3) {
  $montoTotal = 150;
}
else if ( $tipoTramite == 4) {
  $montoTotal = 45;
}

$user->cash($pago_id, $userID["usuario_id"], $_POST['tprocedure'], $cantidadDocs, $montoTotal);

echo $pago_id."</br>";
echo $userID["usuario_id"]."</br>";
echo $_POST['tprocedure']."</br>";
echo $cantidadDocs."</br>";
echo $montoTotal."</br>";

// //detalle de tramite
// $user->detail($str, 'en proceso', 'en proceso', '', $date);
