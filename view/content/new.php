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
// El resultado es un identificador de 8 dígitos
//id de usuario
//$id_codigo = str_pad(mt_rand(0, 999999), 8, '0', STR_PAD_LEFT);
// nuevo tramite y genera el pago con la fecha de ahora
//$codet = str_pad(mt_rand(0, 999999), 8, '0', STR_PAD_LEFT);
$estado_default = 1;
$pago_id = strtoupper(uniqid() . bin2hex(8));
date_default_timezone_set('America/Lima');
$date = date('Y-m-d H:i:s');
$user->code($pago_id, $_POST['dni'], 0, $_POST['tprocedure'], $estado_default, $str);
$user->cash($pago_id, $_POST['dni'], 1, $_POST['tprocedure'], $date);
//detalle de tramite
$user->detail($str, $_POST['idioma'], $_POST['nivel'], $_POST['year'], $date);
