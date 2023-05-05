<?php
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/UserControllers.php');
$obj = new UserControllers();
$obj->decline($_GET['id'], 5);