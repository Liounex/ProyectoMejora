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
        $statement = $this->model->mostrar($id);
        return $statement;
    }

    public function actualizar($id, $estado, $fecha)
    {
        $statement = $this->model->actualizar($id, $estado, $fecha);
        return $statement;
    }

    public function costo($id)
    {
        $statement = $this->model->costo($id);

        if ($statement !== false) {
            return $statement['costo'];
        } else {
            return 0; // Valor predeterminado si no se encontraron resultados
        }
    }
}
