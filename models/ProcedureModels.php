<?php 

class ProcedureModels
{
    private $PRO;

    public function __construct()
    {
        require 'C:/xampp/htdocs/proyectomejora/config/Database.php';
        $con = new Conexion();
        $this->PRO = $con->conectar();
    }

    public function newprocedure($dni, $nombre, $correo, $celular, $idtipo)
    {
        try {
            $stament = $this->PRO->prepare('INSERT INTO usuario (dni_user, nombres, correo, telefono, tipo_usuario_id)
                                            VALUES(:dni_user, :nombres, :correo, :telefono, :tipo_usuario_id)');
            $stament->bindParam(':dni_user', $dni);
            $stament->bindParam(':nombres', $nombre);
            $stament->bindParam(':correo', $correo);
            $stament->bindParam('telefono', $celular);
            $stament->bindParam(':tipo_usuario_id', $idtipo);
            return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } 
        catch (PDOException $e) {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
		}
    }

    public function code($codigo, $dni, $tipo_tramite_id, $default)
    {
        try {
            $stament = $this->PRO->prepare('INSERT INTO tramite (pago_id, dni_user, tipo_tramite_id, estado_id)
                                            VALUE(:pago, :usuario_id, :tipo_tramite_id, :estado_id)');
            $stament->bindParam(':pago', $codigo);
            $stament->bindParam(':usuario_id', $dni);
            $stament->bindParam(':tipo_tramite_id', $tipo_tramite_id);
            $stament->bindParam(':estado_id', $default);
            return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } 
        catch (PDOException $e) {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
		}
    }

    public function cash($codigo, $dni, $tipo_tramite_id, $fecha_now)
    {
        try {
            $pago = $this->PRO->prepare('INSERT INTO pago (pago_id, dni_user, tipo_tramite_id, fecha_presentacion)
                                        VALUES (:pago_id, :usuario_id, :tipo_tramite_id, :fecha_presentacion)');
            $pago->bindParam(':pago_id', $codigo);
            $pago->bindParam(':usuario_id', $dni);
            $pago->bindParam(':tipo_tramite_id', $tipo_tramite_id);
            $pago->bindParam(':fecha_presentacion', $fecha_now);
            return ($pago->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } 
        catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

}