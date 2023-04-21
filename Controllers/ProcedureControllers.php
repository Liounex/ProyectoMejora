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
        return ($stament != false) ? true : false;

    }

    public function cash($codigo, $dni, $tipo_tramite_id, $fecha_now)
    {
        $stament = $this->model->cash($codigo, $dni, $tipo_tramite_id, $fecha_now);
        return ($stament != false) ? true : false;
    }


    public function code($codigo, $dni, $tipo_tramite_id, $default) 
    {
        $stament = $this->model->code($codigo, $dni, $tipo_tramite_id, $default);
        if ($stament){
            include '../../pages/modal.php';
        }
    }


}