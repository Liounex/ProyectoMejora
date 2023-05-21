<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../models/PayModels.php');

class PayControllers
{
    private $model;

    public function __construct()
    {
        $this->model = new PayModels();
    }

    public function mostrar($id)
    {
        $stament = $this->model->mostrar($id);
        return $stament;
    }

    public function actualizar($id, $estado, $fecha)
    {
        $stament = $this->model->actualizar($id, $estado, $fecha);
        return $stament;
    }
}
