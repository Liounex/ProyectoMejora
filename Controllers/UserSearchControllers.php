<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../models/UserSearchModels.php');

class UserSearchControllers
{

    private $model;

    public function __construct()
    {
        $this->model = new UserSearchModels();
    }

    public function search($code)
    {
        $row = $this->model->search($code);
        $data = array(
            "dni" => $row["dni"],
            "nombre" => $row["nombres"],
            "correo" => $row["correo"],
            "telefono" => $row["telefono"],
            "ap_paterno" => $row["ap_paterno"],
            "ap_materno" => $row["ap_materno"],
            "tipotramite" => $row["nombre"],
            "cantidad" => $row["cantidad"]

        );
        return $data;
    }
}
