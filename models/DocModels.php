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

}
