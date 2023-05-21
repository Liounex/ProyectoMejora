<?php
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/PayControllers.php');
$pago = new PayControllers();
$actualizar = $pago->actualizar($_POST['id_pago'], 1, $_POST['fecha']);