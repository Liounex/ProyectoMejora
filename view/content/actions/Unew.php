<?php
//include
require 'C:/xampp/htdocs/proyectomejora/Controllers/ProcedureControllers.php';

//llama a la clase
$user = new ProcedureControllers();
//$id_codigo = strtoupper('NU'.uniqid() . bin2hex(6));

//id de usuario
//$id_codigo = str_pad(mt_rand(0, 999999), 8, '0', STR_PAD_LEFT);

//nuevo usuario
$user->newprocedure($_POST['dni'],$_POST['nombre'], $_POST['correo'], $_POST['celular'],$_POST['idtipo']);

// nuevo tramite y genera el pago con la fecha de ahora
$default = 1;
$pago_id = strtoupper(uniqid() . bin2hex(8));
date_default_timezone_set('America/Lima');
$date = date('Y-m-d H:i:s');
$user->code($pago_id, $_POST['dni'], 0, $_POST['tprocedure'], $default);
$user->cash($pago_id, $_POST['dni'], 1, $_POST['tprocedure'], $date);

