<?php
require 'C:/xampp/htdocs/proyectomejora/Controllers/ProcedureControllers.php';
$user = new ProcedureControllers();
$id_codigo = strtoupper('NU'.uniqid() . bin2hex(4));
$user->newprocedure($id_codigo, $_POST['dni'],$_POST['nombre'], $_POST['correo'], $_POST['celular'],$_POST['idtipo']);
$user->code(strtoupper(uniqid() . bin2hex(8)), $id_codigo);