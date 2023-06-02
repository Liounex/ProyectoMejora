<?php
//include
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/ProcedureControllers.php';
require_once APP_ROOT . '/../Controllers/PayControllers.php';

//llama a la clase
$user = new ProcedureControllers();
$costo = new PayControllers();



$num = rand(10000000, 99999999);
// Convertir el número a una cadena de texto
$str = strval($num);
// Si la cadena es menor de 8 dígitos, añadir ceros al principio hasta completar 8 dígitos
if (strlen($str) < 8) {
  $str = str_pad($str, 8, "0", STR_PAD_LEFT);
}

$tramite = $_POST['tprocedure'];
$cantidad = $_POST['cantidad'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap_paterno'];
$am = $_POST['ap_materno'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$tipo = $_POST['idtipo'];

$strdefault = '';
$default = 1;
$pago_id = strtoupper(uniqid() . bin2hex(8));
date_default_timezone_set('America/Lima');
$date = date('Y-m-d H:i:s');


$costoValor = $costo->costo($tramite); // Obtener el valor de costo
$total = $cantidad * $costoValor;


//nuevo usuario
// Verificar si el usuario ya existe en la base de datos
if (!$user->userExists($dni)) {
  // El usuario no existe, guardar nuevo usuario
  $user->newprocedure($dni, $nombre, $ap, $am, $correo, $celular, $tipo);
}
/* $user->newprocedure($dni, $nombre, $ap, $am, $correo, $celular, $tipo); */
// nuevo tramite y genera el pago con la fecha de ahora
//$user->cash($pago_id, $dni, $tramite, $cantidad, $date);
$user->cash($pago_id, $dni, $tramite, $cantidad, $total, $date);
$user->code($pago_id, $dni, 0, $tramite, $default, $str);

//detalle de tramite
$user->detail($str, 'en proceso', 'en proceso', '', $date);
$user->obsevations($str, $strdefault, $strdefault, $strdefault);
