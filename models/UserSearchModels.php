<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../config/Database.php');

class UserSearchModels
{

    private $PDO;
    public function __construct()
    {
        $con = new Conexion();
        $this->PDO = $con->conectar();
    }

    public function search($code)
    {
        try {
            $sql = "SELECT t1.tramite_id, t1.pago_id,
            t2.dni_user, t2.nombres, t2.ap_paterno, t2.ap_materno, t2.correo, t2.telefono, t2.tipo_usuario_id,
            t3.tipo_tramite_id ,t3.descripciont
            FROM tramite t1
            JOIN usuario t2 ON t1.dni_user = t2.dni_user
            JOIN tipo_tramite t3 ON t3.tipo_tramite_id = t1.tipo_tramite_id
            WHERE t1.pago_id = :code";
            $query = $this->PDO->prepare($sql);
            $query->bindParam(':code', $code);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}
