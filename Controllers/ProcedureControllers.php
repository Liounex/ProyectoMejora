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

    public function newprocedure($dni, $nombre, $ap_paterno, $ap_materno, $correo, $celular, $idtipo)
    {
        $stament = $this->model->newprocedure($dni, $nombre,  $ap_paterno, $ap_materno, $correo, $celular, $idtipo);
        return ($stament != false) ? true : false;
    }

    public function cash($codigo, $dni, $tipo_tramite_id, $cantidad, $total)
    {
        $stament = $this->model->cash($codigo, $dni, $tipo_tramite_id, $cantidad, $total);
        // return ($stament != false) ? true : false;

        if ($stament) {
            include_once APP_ROOT . '/../view/modal.php';
        }
    }


    public function code($tramite_id, $pago_id, $imagen, $idioma, $fecha)
    {
        $stament = $this->model->code($tramite_id, $pago_id, $imagen, $idioma, $fecha);
        // if ($stament) {
        //     include_once APP_ROOT . '/../view/modal.php';
        // }
    }

    public function detail($tramite_id, $nivel, $anio)
    {
        // $stament = $this->model->detail($id_tramite, strtoupper($idioma), strtoupper($nivel), $año, $f_init);
        // return ($stament != false) ? true : false;

        $stament = $this->model->detail($tramite_id, $nivel, $anio);
        // return $stament;
    }

    // 
    public function detailExamenOne($tramite_id, $nivel)
    {
        // $stament = $this->model->detail($id_tramite, strtoupper($idioma), strtoupper($nivel), $año, $f_init);
        // return ($stament != false) ? true : false;

        $stament = $this->model->detailExamenOne($tramite_id, $nivel);
        // return $stament;
    }
    // public function detailExamenTwo($tramite_id)
    // {
    //     // $stament = $this->model->detail($id_tramite, strtoupper($idioma), strtoupper($nivel), $año, $f_init);
    //     // return ($stament != false) ? true : false;

    //     $stament = $this->model->detailExamenTwo($tramite_id);
    //     // return $stament;
    // }

    public function getUserId($number) {
      $stament = $this->model->getUserId($number);
      return $stament; 
    }

    public function updateImagenPago($number, $codigo) {
      $stament = $this->model->updateImagenPago($number, $codigo);
      return $stament; 
    }

    public function updateDoc($number, $codigo) {
      $stament = $this->model->updateDoc($number, $codigo);
      return $stament; 
    }


}
