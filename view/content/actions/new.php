<?php
require 'C:/xampp/htdocs/proyectomejora/Controllers/ProcedureControllers.php';
$user = new ProcedureControllers();
$user->newprocedure($_POST['dni'],$_POST['nombre'], $_POST['correo'], $_POST['celular'],$_POST['idtipo']);
$user->code(uniqid() . rand(10,99));