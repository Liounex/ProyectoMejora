<?php

class ProcedureControllers 
{
    private $model;

    public function __construct()
    {
        require 'C:/xampp/htdocs/proyectomejora/models/ProcedureModels.php';
        $this->model = new ProcedureModels();
    }

    public function newprocedure($dni, $nombre, $correo, $celular, $idtipo)
    {
        $stament = $this->model->newprocedure($dni, $nombre, $correo, $celular, $idtipo);
        return ($stament != false) ? true: false;

    }
    public function code($codigo) 
    {
        $stament = $this->model->code($codigo);
        if ($stament){
            include '../../pages/modal.php';
        }
    }


}