<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../config/Database.php');
class ProcedureModels
{
    private $PRO;

    public function __construct()
    {
        $con = new Conexion();
        $this->PRO = $con->conectar();
    }

    // Nuevo Usuario
    public function newprocedure($dni, $nombre, $ap, $am, $correo, $celular, $idtipo)
    {
        try {
            $stament = $this->PRO->prepare('INSERT INTO usuario (dni_user, nombres, ap_paterno, ap_materno, correo, telefono, tipo_usuario_id)
                                            VALUES(:dni_user, :nombres, :ap, :am, :correo, :telefono, :tipo_usuario_id)');
            $stament->bindParam(':dni_user', $dni);
            $stament->bindParam(':nombres', $nombre);
            $stament->bindParam(':ap', $ap);
            $stament->bindParam(':am', $am);
            $stament->bindParam(':correo', $correo);
            $stament->bindParam('telefono', $celular);
            $stament->bindParam(':tipo_usuario_id', $idtipo);
            return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    //cantidad de documentos



    //Codigo de Pago e inicio de un tramite
    public function code($codigo, $dni, $voucher, $tipo_tramite_id, $default, $codet)
    {
        try {
            $stament = $this->PRO->prepare('INSERT INTO tramite (pago_cod, dni_user, voucher, tipo_tramite_id, estado_id, id_detalle)
                                            VALUE(:pago, :usuario_id, :voucher, :tipo_tramite_id, :estado_id, :id_detalle)');
            $stament->bindParam(':pago', $codigo);
            $stament->bindParam(':usuario_id', $dni);
            $stament->bindParam(':voucher', $voucher);
            $stament->bindParam(':tipo_tramite_id', $tipo_tramite_id);
            $stament->bindParam(':estado_id', $default);
            $stament->bindParam(':id_detalle', $codet);
            return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    //Datos para la tabla pago
    public function cash($codigo, $dni, $tipo_tramite_id, $cantidad, $total, $fecha_now)
    {
        try {
            $pago = $this->PRO->prepare('INSERT INTO pago (pago_cod, dni_user, tipo_tramite_id, cantidad, total, fecha_presentacion)
                                        VALUES (:pago_cod, :usuario_id, :tipo_tramite_id, :cantidad, :total, :fecha_presentacion)');
            $pago->bindParam(':pago_cod', $codigo);
            $pago->bindParam(':usuario_id', $dni);
            $pago->bindParam(':tipo_tramite_id', $tipo_tramite_id);
            $pago->bindParam(':cantidad', $cantidad);
            $pago->bindParam(':total', $total);
            $pago->bindParam(':fecha_presentacion', $fecha_now);
            return ($pago->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    public function detail($id_tramite, $idioma, $nivel, $año, $f_init)
    {
        try {
            $statement = $this->PRO->prepare('INSERT INTO detalle_tramite (id_detalle, idioma, nivel, year, fechainit)
                                                    VALUES (:id_tramite, :idioma, :nivel, :year, :f_init)');
            $statement->bindParam(':id_tramite', $id_tramite);
            $statement->bindParam(':idioma', $idioma);
            $statement->bindParam(':nivel', $nivel);
            $statement->bindParam(':year', $año);
            $statement->bindParam(':f_init', $f_init);
            return ($statement->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    public function obsevations($id, $obs1, $obs2, $obs3)
    {
        try {
            $statement = $this->PRO->prepare('INSERT INTO observacion (id_detalle, obs1, obs2, obs3)
                                                    VALUES (:id, :obs1, :obs2, :obs3)');
            $statement->bindParam(':id', $id);
            $statement->bindParam(':obs1', $obs1);
            $statement->bindParam(':obs2', $obs2);
            $statement->bindParam(':obs3', $obs3);
            return ($statement->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}
