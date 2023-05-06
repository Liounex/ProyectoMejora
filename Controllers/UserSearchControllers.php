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
            "dni" => $row["dni_user"],
            "nombre" => $row["nombres"],
            "correo" => $row["correo"],
            "telefono" => $row["telefono"],
        );
        return $data;
    }
}
