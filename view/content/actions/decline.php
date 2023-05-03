<?php
require 'C:/xampp/htdocs/proyectomejora/Controllers/UserControllers.php';
$obj = new UserControllers();
$obj->decline($_GET['id'], 5);