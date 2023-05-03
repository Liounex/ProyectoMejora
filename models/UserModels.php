<?php
class UserModels
{
	private $PDO;
	public function __construct() {
		require 'C:/xampp/htdocs/proyectomejora/config/Database.php';
		$con = new Conexion();
		$this->PDO = $con->conectar();
	}
	public function login($username, $password)	{
		try {
			$statement = $this->PDO->prepare("SELECT * FROM usuario WHERE correo = :username AND password = :password");
			$statement->bindParam(':username', $username);
			$statement->bindParam(':password', $password);
			$statement->execute();
			$result = $statement->rowCount();
			if ($result > 0) {
				$user = $statement->fetch(PDO::FETCH_ASSOC);
				session_start();
				$_SESSION['dni_user'] = $user['dni_user'];
				$_SESSION['nombres'] = $user['nombres'];
				$_SESSION['ap_paterno'] = $user['ap_paterno'];
				$_SESSION['ap_materno'] = $user['ap_materno'];
				$_SESSION['correo'] = $user['correo'];
				$_SESSION['telefono'] = $user['telefono'];
				$_SESSION['tipo_usuario_id'] = $user['tipo_usuario_id'];
				return true;
			} else {
				return false;
			}
			$this->PDO = null;
		} catch (PDOException $e) {
			echo "Error al conectar a lsa base de datos: " . $e->getMessage();
		}
	}

    public function show($code) {
		try {
			$sql = "SELECT t1.pago_id, t1.dni_user, t1.estado_id,
			t2.nombre, t2.descripciont, t2.costo,
			t3.descripcion,
			t4.idioma, t4.nivel, t4.year, t4.fechainit,
			t5.total
			FROM tramite t1
			JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id 
			JOIN estado t3 ON t1.estado_id = t3.estado_id
			JOIN detalle_tramite t4 ON t1.id_detalle = t4.id_detalle
			JOIN pago t5 ON  t1.pago_id = t5.pago_id
			WHERE t1.dni_user = :code";
			$query = $this->PDO->prepare($sql);
			$query->bindParam(':code' , $code);
			$query->execute();
			return $query->fetchAll();
			$this->PDO = null;
		} catch (PDOException $e) {
			echo "Error al conectar a lsa base de datos: " . $e->getMessage();
		}
    }


	public function showadmin() {
		//			t4.nombres, t4.ap_paterno, t4.ap_materno,			t5.id_detalle, t5.idioma, t5.nivel, t5.year, t5.fechainit
		try {
			$sql = "SELECT t1.tramite_id, t1.pago_id, t1.dni_user,
			t2.nombre, t2.descripciont,
			t3.descripcion,
			t4.idioma, t4.nivel, t4.year, t4.fechainit,
			t5.total,
			t6.nombres, t6.ap_paterno, t6.ap_materno
			FROM tramite t1 JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id
			JOIN estado t3 ON t1.estado_id = t3.estado_id
			JOIN detalle_tramite t4 ON t1.id_detalle = t4.id_detalle
			JOIN pago t5 ON t1.pago_id = t5.pago_id
			JOIN usuario t6 ON t1.dni_user = t6.dni_user";
			$query = $this->PDO->prepare($sql);
			$query->execute();
			return $query->fetchAll();
			$this->PDO = null;
		} catch (PDOException $e) {
		echo "Error al conectar a lsa base de datos: " . $e->getMessage();
		}
	}

    public function showdocs($data) {
        try {
            $sql = "SELECT t1.tramite_id, t1.pago_id, t1.dni_user,
			t2.nombre, t2.descripciont,
			t3.descripcion,
			t4.idioma, t4.nivel, t4.year, t4.fechainit,
			t5.total,
			t6.nombres, t6.ap_paterno, t6.ap_materno
			FROM tramite t1 JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id
			JOIN estado t3 ON t1.estado_id = t3.estado_id
			JOIN detalle_tramite t4 ON t1.id_detalle = t4.id_detalle
			JOIN pago t5 ON t1.pago_id = t5.pago_id
			JOIN usuario t6 ON t1.dni_user = t6.dni_user WHERE t2.nombre = :data";
            $query = $this->PDO->prepare($sql);
            $query->bindParam(':data', $data);
            $query->execute();
            return $query->fetchAll();
            $this->PDO = null;
        } catch (PDOException $e) {
            echo 'Error al conectar a la base de datos' , $e->getMessage();
        }
    }

	public function accept($code, $status) {
		try {
			$statement = $this->PDO->prepare('UPDATE tramite SET estado_id = :statusid WHERE tramite_id = :code');
			$statement->bindParam(':code', $code);
			$statement->bindParam(':statusid', $status);
			//$this->PDO->lastInsertId() 
			return ($statement->execute()) ? true : false;
			$this->PDO = null;
		} catch (PDOException $e) {
			echo 'Error al conectar a la base de datos' , $e->getMessage();
		}
	}

	public function decline($code, $status) {
		try {
			$statement = $this->PDO->prepare('UPDATE tramite SET estado_id = :statusid WHERE tramite_id = :code');
			$statement->bindParam(':code', $code);
			$statement->bindParam(':statusid', $status);
			//$this->PDO->lastInsertId() 
			return ($statement->execute()) ? true : false;
			$this->PDO = null;
		} catch (PDOException $e) {
			echo 'Error al conectar a la base de datos' , $e->getMessage();
		}
	}
}