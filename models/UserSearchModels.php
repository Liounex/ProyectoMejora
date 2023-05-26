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
            $sql = "SELECT p.pago_cod, p.cantidad,
            tt.tipo_tramite_id, tt.nombre,
            u.dni_user, u.nombres, u.ap_paterno, u.ap_materno, u.correo, u.telefono,
            dt.idioma
                 FROM pago p
                 INNER JOIN usuario u ON u.dni_user = p.dni_user
                 INNER JOIN tipo_tramite tt ON p.tipo_tramite_id = tt.tipo_tramite_id
                 INNER JOIN detalle_tramite dt
                 INNER JOIN tramite t ON t.id_detalle = dt.id_detalle
                 WHERE p.pago_cod =:code;";
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
