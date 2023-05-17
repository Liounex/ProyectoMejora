<?php



require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/ProcedureControllers.php');

//llama a la clase
$user = new ProcedureControllers();
$_POST['dni'] = '74202893';

$userID = $user->getUserId($_POST['dni']);
var_dump($userID);
echo ($userID["usuario_id"]);




