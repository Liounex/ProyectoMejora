<?php
require 'C:/xampp/htdocs/proyectomejora/Controllers/UserControllers.php';
$obj = new UserControllers();
$obj->observation($_GET['id'], 3, $_POST['obser']);