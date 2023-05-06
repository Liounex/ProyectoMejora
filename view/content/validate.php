<?php
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/UserSearchControllers.php');

$code = $_POST['codigo'];
$obj = new UserSearchControllers();
$count = $obj->search($code);
if ($count > 0) {
    $data = $obj->search($code);
    echo json_encode($data);
} else {
    echo "No se encontraron resultados.";
}

