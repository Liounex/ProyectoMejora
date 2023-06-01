<?php
//include
//include
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/ProcedureControllers.php';

// Verificar si se recibió un valor para tramiteId
if (isset($_POST['tramiteId'])) {
    $tramiteId = $_POST['tramiteId'];

    $controller = new ProcedureControllers();
    $data = $controller->showDetails($tramiteId);

    if (!empty($data)) {
        $result = $data->fetch(PDO::FETCH_ASSOC); // Obtener los datos como un array asociativo
        // Devolver los resultados como respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "El parámetro tramiteId no fue proporcionado.";
}
