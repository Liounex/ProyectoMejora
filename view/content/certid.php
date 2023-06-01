<?php
include_once __DIR__ . '/../layout/headlogin.php';
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/UserControllers.php';
$obj = new UserControllers();
$obj->direcacept($_GET['id'], 4);

