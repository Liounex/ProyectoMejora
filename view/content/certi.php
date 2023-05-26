<?php
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/UserControllers.php');
$obj = new UserControllers();
$obj->accept($_GET['id'], 4);
