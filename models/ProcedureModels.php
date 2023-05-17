<?php

require_once __DIR__ . '/../config/config.php';
require_once (APP_ROOT . '/../config/Database.php');
class ProcedureModels
{
    private $PRO;

    public function __construct()
    {
        $con = new Conexion();
        $this->PRO = $con->conectar();
    }

    // existe
    public function getUserId($number) {
        try {
            $stmt = $this->PRO->prepare("SELECT u.usuario_id FROM usuario u WHERE u.dni = '$number'");
            $stmt->execute();

            $results = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $results;
        }
        catch (PDOException $e) {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
		}
    }

    // Nuevo Usuario
    public function newprocedure($dni, $nombre, $ap_paterno, $ap_materno , $correo, $celular, $idtipo)
    {
        try {
            $stament = $this->PRO->prepare('INSERT INTO usuario (dni, nombres, ap_paterno, ap_materno, correo, telefono, tipo_usuario_id) VALUES(:dni_user, :nombres, :ap_paterno, :ap_materno, :correo, :telefono, :tipo_usuario_id)');
            $stament->bindParam(':dni_user', $dni);
            $stament->bindParam(':nombres', $nombre);
            $stament->bindParam(':ap_paterno', $ap_paterno);
            $stament->bindParam(':ap_materno', $ap_materno);
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

    //Codigo de Pago e inicio de un tramite
    public function code($tramite_id, $pago_id, $imagen, $idioma, $fecha)
    {
        try {
            // $stament = $this->PRO->prepare('INSERT INTO tramite (pago_id, dni_user, voucher, tipo_tramite_id, estado_id, id_detalle)
            //                                 VALUE(:pago, :usuario_id, :voucher, :tipo_tramite_id, :estado_id, :id_detalle)');
            // $stament->bindParam(':pago', $codigo);
            // $stament->bindParam(':usuario_id', $dni);
            // $stament->bindParam(':voucher', $voucher);
            // $stament->bindParam(':tipo_tramite_id', $tipo_tramite_id);
            // $stament->bindParam(':estado_id', $default);
            // $stament->bindParam(':id_detalle', $codet);
            // return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            // $this->PRO = null;
            $stament = $this->PRO->prepare('INSERT INTO tramite (tramite_id, pago_id, voucher, idioma, fecha_presentacion)
            VALUE(:tramite_id, :pago_id, :voucher, :idioma, :fecha_presentacion)');
            $stament->bindParam(':tramite_id', $tramite_id);
            $stament->bindParam(':pago_id', $pago_id);
            $stament->bindParam(':voucher', $imagen);
            $stament->bindParam(':idioma', $idioma);
            $stament->bindParam(':fecha_presentacion', $fecha);
            return ($stament->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        }
        catch (PDOException $e) {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
		}
    }

    //Datos para la tabla pago
    public function cash($codigo, $dni, $tipo_tramite_id, $cantidad, $total)
    {
        try {
            $pago = $this->PRO->prepare('INSERT INTO pago (pago_id, usuario_id, tipo_tramite_id, cantidad, total)
                                        VALUES (:pago_id, :usuario_id, :tipo_tramite_id, :cantidad, :total);');
            $pago->bindParam(':pago_id', $codigo);
            $pago->bindParam(':usuario_id', $dni);
            $pago->bindParam(':tipo_tramite_id', $tipo_tramite_id);
            $pago->bindParam(':cantidad', $cantidad);
            $pago->bindParam(':total', $total);
            return ($pago->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;
        }
        catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    public function detail($tramite_id, $nivel, $anio) {
        try {
            // $statement = $this->PRO->prepare('INSERT INTO detalle_tramite (id_detalle, idioma, nivel, year, fechainit)
            //                                         VALUES (:id_tramite, :idioma, :nivel, :year, :f_init)');
            // $statement->bindParam(':id_tramite' , $id_tramite);
            // $statement->bindParam(':idioma', $idioma);
            // $statement->bindParam(':nivel', $nivel);
            // $statement->bindParam(':year', $año);
            // $statement->bindParam(':f_init', $f_init);
            // return ($statement->execute()) ? $this->PRO->lastInsertId() : false;
            // $this->PRO = null;

            $statement = $this->PRO->prepare('INSERT INTO detalle_tramite (tramite_id, nivel, anio)
            VALUES (:tramite_id, :nivel, :anio )');
            $statement->bindParam(':tramite_id', $tramite_id);
            $statement->bindParam(':nivel', $nivel);
            $statement->bindParam(':anio', $anio);
            return ($statement->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;


        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }


    }

    public function detailExamenOne($tramite_id, $nivel ) {
        try {

            $statement = $this->PRO->prepare('INSERT INTO detalle_tramite (tramite_id, nivel)
            VALUES (:tramite_id, :nivel)');
            $statement->bindParam(':tramite_id', $tramite_id);
            $statement->bindParam(':nivel', $nivel);
            return ($statement->execute()) ? $this->PRO->lastInsertId() : false;
            $this->PRO = null;


        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }


    }

    // public function detailExamenTwo($tramite_id, $nivel) {
    //     try {

    //         $statement = $this->PRO->prepare('INSERT INTO detalle_tramite (tramite_id, nivel)
    //         VALUES (:tramite_id, :nivel)');
    //         $statement->bindParam(':tramite_id', $tramite_id);
    //         $statement->bindParam(':nivel', $nivel);
    //         return ($statement->execute()) ? $this->PRO->lastInsertId() : false;
    //         $this->PRO = null;


    //     } catch (PDOException $e) {
    //         echo "Error al conectar a la base de datos: " . $e->getMessage();
    //     }


    // }

}