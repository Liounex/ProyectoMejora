<?php
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/UserControllers.php');
$obj = new UserControllers();
$obj->observation($_GET['id'], 3, $_POST['obser']);