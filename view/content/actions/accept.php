<?php
require 'C:/xampp/htdocs/proyectomejora/Controllers/UserControllers.php';
$obj = new UserControllers();
$obj->accept($_GET['id'], 2);
