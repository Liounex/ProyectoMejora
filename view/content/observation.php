<?php
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/UserControllers.php';
$obj = new UserControllers();

$id_tramite = $_GET['id'];
$observacion = $_POST['obser'];
$estado = 3;
$obj->updateObservations($id_tramite, $observacion, $estado);

