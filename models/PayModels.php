<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../config/Database.php');

class PayModels
{

    private $PDO;
    public function __construct()
    {
        $con = new Conexion();
        $this->PDO = $con->conectar();
    }

    public function mostrar($id)
    {
        $sql = "SELECT t1.dni_user, t1.cantidad, t1.total, t1.status,
        t2.nombre, t2.descripciont, t2.costo
        FROM pago t1
        JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id WHERE pago_cod = :id";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function actualizar($id, $estado, $fecha)
    {
        $sql = "UPDATE pago SET status = :total, fecha_pago = :fecha WHERE pago_cod = :id";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':total', $estado);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query;
    }

    public function costo($id)
    {
        $sql = "SELECT costo FROM `tipo_tramite` WHERE tipo_tramite_id = :id";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
