<?php

class ProcedureControllers 
{
    private $model;

    public function __construct()
    {
        require 'C:/xampp/htdocs/proyectomejora/models/ProcedureModels.php';
        $this->model = new ProcedureModels();
    }

    public function newprocedure($usuario_id, $dni, $nombre, $correo, $celular, $idtipo)
    {
        $stament = $this->model->newprocedure($usuario_id, $dni, $nombre, $correo, $celular, $idtipo);
        return ($stament != false) ? true: false;

    }
    public function code($codigo, $usuario_id) 
    {
        $stament = $this->model->code($codigo, $usuario_id);
        if ($stament){
            include '../../pages/modal.php';
        }
    }


}