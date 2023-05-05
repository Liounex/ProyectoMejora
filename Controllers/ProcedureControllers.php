<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../models/ProcedureModels.php');
class ProcedureControllers
{
    private $model;

    public function __construct()
    {
        $this->model = new ProcedureModels();
    }

    public function newprocedure($dni, $nombre, $correo, $celular, $idtipo)
    {
        $stament = $this->model->newprocedure($dni, $nombre, $correo, $celular, $idtipo);
        return ($stament != false) ? true : false;
    }

    public function cash($codigo, $dni, $tipo_tramite_id, $cantidad, $fecha_now)
    {
        $stament = $this->model->cash($codigo, $dni, $tipo_tramite_id, $cantidad, $fecha_now);
        return ($stament != false) ? true : false;
    }


    public function code($codigo, $dni, $voucher, $tipo_tramite_id, $default, $codet)
    {
        $stament = $this->model->code($codigo, $dni, $voucher, $tipo_tramite_id, $default, $codet);
        if ($stament) {
            include_once APP_ROOT . '/../view/modal.php';
        }
    }

    public function detail($id_tramite, $idioma, $nivel, $año, $f_init)
    {

        $stament = $this->model->detail($id_tramite, strtoupper($idioma), strtoupper($nivel), $año, $f_init);
        return ($stament != false) ? true : false;
    }
}
