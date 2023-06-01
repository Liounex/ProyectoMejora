<?php

require_once __DIR__ . '/../config/config.php';
require_once APP_ROOT . '/../config/Database.php';

class DocModels
{

    private $PDO;
    public function __construct()
    {
        $con = new Conexion();
        $this->PDO = $con->conectar();
    }

    public function obtenerDatosDoc($cod)
    {
        $sql = "SELECT voucher, copia FROM tramite WHERE pago_cod = :cod";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':cod', $cod);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updatedoc($cod, $pdf, $vaucher, $updatePDF, $updateVaucher)
    {
        $sql = "UPDATE tramite SET ";
        $values = array();

        if ($updatePDF) {
            $sql .= "copia = :pdf";
            $values[':pdf'] = $pdf;
        }

        if ($updateVaucher) {
            if ($updatePDF) {
                $sql .= ", ";
            }
            $sql .= "voucher = :voucher";
            $values[':voucher'] = $vaucher;
        }

        $sql .= " WHERE pago_cod = :cod";
        $values[':cod'] = $cod;

        $query = $this->PDO->prepare($sql);
        $query->execute($values);
        return $query->rowCount() > 0;
    }

    public function verdoc($cod)
    {
        try {
            $sql = "SELECT t.tramite_id, t.pago_cod, t.dni_user,
			tt.nombre, tt.descripciont,
			e.descripcion,
			dt.idioma, dt.nivel, dt.year, dt.fechainit,
			p.total, p.status, p.cantidad,
			u.nombres, u.ap_paterno, u.ap_materno
            FROM tramite t
            JOIN tipo_tramite tt ON t.tipo_tramite_id = tt.tipo_tramite_id
            JOIN estado e ON t.estado_id = e.estado_id
            JOIN detalle_tramite dt ON t.id_detalle = dt.id_detalle
            JOIN observacion o ON dt.id_detalle = o.id_detalle
            JOIN usuario u ON t.dni_user = u.dni_user
            JOIN pago p ON t.pago_cod = p.pago_cod
            WHERE t.estado_id = :cod";
            $query = $this->PDO->prepare($sql);
            $query->bindParam(':cod', $cod);
            $query->execute();
            return $query->fetchAll();
            $this->PDO = null;
        } catch (PDOException $e) {
            echo "Error al conectar a lsa base de datos: " . $e->getMessage();
        }
    }
}
