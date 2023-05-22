<?php
//include
include_once __DIR__ . '/../layout/headlogin.php';
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/UserControllers.php';

//llama a la clase
$update = new UserControllers();


$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap_paterno'];
$am = $_POST['ap_materno'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$idioma = $_POST['idioma'];
$filedni = $_POST['fileDni'];
$fileVoucher = $_POST['fileVoucher'];

$update->actualizarDatos($dni, $nombre, $ap, $am, $correo, $telefono, $idioma, $filedni, $fileVoucher);


/* echo $dni . '<br>';
echo $nombre . '<br>';
echo $ap . '<br>';
echo $am . '<br>';
echo $correo . '<br>';
echo $telefono . '<br>';
echo $idioma . '<br>';
echo $filedni . '<br>';
echo $fileVoucher . '<br>'; */
