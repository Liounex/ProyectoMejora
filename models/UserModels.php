<?php

require_once __DIR__ . '/../config/config.php';
require_once(APP_ROOT . '/../config/Database.php');
class UserModels
{
	private $PDO;
	public function __construct()
	{
		$con = new Conexion();
		$this->PDO = $con->conectar();
	}
	public function login($username, $password)
	{
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

	public function show($code)
	{
		try {
			$sql = "SELECT t1.pago_cod, t1.dni_user, t1.estado_id, t1.tramite_id,
			t2.nombre, t2.descripciont, t2.costo,
			t3.descripcion,
			t4.idioma, t4.nivel, t4.year,
			t5.total
			FROM tramite t1
			JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id
			JOIN estado t3 ON t1.estado_id = t3.estado_id
			JOIN detalle_tramite t4 ON t1.id_detalle = t4.id_detalle
			JOIN pago t5 ON  t1.pago_cod = t5.pago_cod
			WHERE t1.dni_user = :code";
			$query = $this->PDO->prepare($sql);
			$query->bindParam(':code', $code);
			$query->execute();
			return $query->fetchAll();
			$this->PDO = null;
		} catch (PDOException $e) {
			echo "Error al conectar a lsa base de datos: " . $e->getMessage();
		}
	}


	public function showadmin()
	{
		//			t4.nombres, t4.ap_paterno, t4.ap_materno,			t5.id_detalle, t5.idioma, t5.nivel, t5.year, t5.fechainit
		try {
			$sql = "SELECT t1.tramite_id, t1.pago_cod, t1.dni_user,
			t2.nombre, t2.descripciont,
			t3.descripcion,
			t4.idioma, t4.nivel, t4.year, t4.fechainit,
			t5.total, t5.status, t5.cantidad,
			t6.nombres, t6.ap_paterno, t6.ap_materno
			FROM tramite t1 JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id
			JOIN estado t3 ON t1.estado_id = t3.estado_id
			JOIN detalle_tramite t4 ON t1.id_detalle = t4.id_detalle
			JOIN pago t5 ON t1.pago_cod = t5.pago_cod
			JOIN usuario t6 ON t1.dni_user = t6.dni_user";
			$query = $this->PDO->prepare($sql);
			$query->execute();
			return $query->fetchAll();
			$this->PDO = null;
		} catch (PDOException $e) {
			echo "Error al conectar a lsa base de datos: " . $e->getMessage();
		}
	}

	public function showdocs($data)
	{
		try {
			$sql = "SELECT t1.tramite_id, t1.pago_cod, t1.dni_user,
			t2.nombre, t2.descripciont,
			t3.descripcion,
			t4.idioma, t4.nivel, t4.year, t4.fechainit,
			t5.total, t5.status, t5.cantidad,
			t6.nombres, t6.ap_paterno, t6.ap_materno
			FROM tramite t1 JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id
			JOIN estado t3 ON t1.estado_id = t3.estado_id
			JOIN detalle_tramite t4 ON t1.id_detalle = t4.id_detalle
			JOIN pago t5 ON t1.pago_cod = t5.pago_cod
			JOIN usuario t6 ON t1.dni_user = t6.dni_user WHERE t2.nombre = :data";
			$query = $this->PDO->prepare($sql);
			$query->bindParam(':data', $data);
			$query->execute();
			return $query->fetchAll();
			$this->PDO = null;
		} catch (PDOException $e) {
			echo 'Error al conectar a la base de datos', $e->getMessage();
		}
	}

	public function accept($code, $status)
	{
		try {
			$statement = $this->PDO->prepare('UPDATE tramite SET estado_id = :statusid WHERE tramite_id = :code');
			$statement->bindParam(':code', $code);
			$statement->bindParam(':statusid', $status);
			//$this->PDO->lastInsertId()
			return ($statement->execute()) ? true : false;
			$this->PDO = null;
		} catch (PDOException $e) {
			echo 'Error al conectar a la base de datos', $e->getMessage();
		}
	}

	public function decline($code, $status)
	{
		try {
			$statement = $this->PDO->prepare('UPDATE tramite SET estado_id = :statusid WHERE tramite_id = :code');
			$statement->bindParam(':code', $code);
			$statement->bindParam(':statusid', $status);
			//$this->PDO->lastInsertId()
			return ($statement->execute()) ? true : false;
			$this->PDO = null;
		} catch (PDOException $e) {
			echo 'Error al conectar a la base de datos', $e->getMessage();
		}
	}
	public function updateObservations($id, $obs, $status)
	{
		try {
			$statement = $this->PDO->prepare('SELECT t2.obs1, t2.obs2, t2.obs3
				FROM tramite t1
				JOIN observacion t2 ON t1.id_detalle = t2.id_detalle
				WHERE t1.tramite_id = :id');
			$statement->bindParam(':id', $id);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			$columns = ['obs1', 'obs2', 'obs3'];
			$columnToUpdate = null;
			foreach ($columns as $column) {
				if (empty($result[$column])) {
					$columnToUpdate = $column;
					break;
				}
			}
			if ($columnToUpdate !== null) {
				$statement = $this->PDO->prepare("UPDATE observacion
				JOIN tramite ON observacion.id_detalle = tramite.id_detalle
				SET observacion.$columnToUpdate = :obs
				WHERE tramite.tramite_id = :id");
				$statement->bindParam(':obs', $obs);
				$statement->bindParam(':id', $id);
				$statement->execute();
			}
			$statement = $this->PDO->prepare('UPDATE tramite SET estado_id = :status WHERE tramite_id = :id');
			$statement->bindParam(':status', $status);
			$statement->bindParam(':id', $id);
			$statement->execute();

			return true;
		} catch (PDOException $e) {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
			return false;
		}
	}
	public function description($code)
	{
		try {
			$sql = "SELECT t1.pago_cod, t1.dni_user, t1.estado_id, t1.tramite_id, t1.copia,
			t2.nombre, t2.descripciont, t2.costo,
			t3.descripcion,
			t4.idioma, t4.nivel, t4.year,
			t5.total, t5.status,
            t6.nombres, t6.ap_paterno, t6.ap_materno,
            t7.obs1, t7.obs2, t7.obs3
			FROM tramite t1
			JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id
			JOIN estado t3 ON t1.estado_id = t3.estado_id
			JOIN detalle_tramite t4 ON t1.id_detalle = t4.id_detalle
			JOIN pago t5 ON  t1.pago_cod = t5.pago_cod
            JOIN usuario t6 ON t1.dni_user = t6.dni_user
            JOIN observacion t7 ON t1.id_detalle = t7.id_detalle
			WHERE t1.tramite_id = :code";
			$query = $this->PDO->prepare($sql);
			$query->bindParam(':code', $code);
			$query->execute();
			return $query->fetchAll();
			$this->PDO = null;
		} catch (PDOException $e) {
			echo "Error al conectar a lsa base de datos: " . $e->getMessage();
		}
	}

	public function updateregister($dni, $nombres, $ap, $am, $correo, $telefono, $idioma, $voucher, $copia)
	{
		try {
			$this->PDO->beginTransaction();

			$sql = "UPDATE usuario
			JOIN tramite ON usuario.dni_user = tramite.dni_user
			JOIN detalle_tramite ON tramite.id_detalle = detalle_tramite.id_detalle
			JOIN pago ON usuario.dni_user = pago.dni_user
			SET usuario.dni_user = :dni, usuario.nombres = :nombres, usuario.ap_paterno = :ap, usuario.ap_materno = :am, usuario.correo = :correo, usuario.telefono = :telefono,
			tramite.dni_user = :dni, tramite.voucher = :voucher, tramite.copia = :copia,
			detalle_tramite.idioma = :idioma
			WHERE usuario.dni_user = :dni_user";

			$query = $this->PDO->prepare($sql);
			$query->bindParam(':dni', $dni);
			$query->bindParam(':nombres', $nombres);
			$query->bindParam(':ap', $ap);
			$query->bindParam(':am', $am);
			$query->bindParam(':correo', $correo);
			$query->bindParam(':telefono', $telefono);
			$query->bindParam(':idioma', $idioma);
			$query->bindParam(':voucher', $voucher);
			$query->bindParam(':copia', $copia);
			$query->bindParam(':dni_user', $dni);
			$this->PDO->commit();
			$this->PDO = null;
			return ($query->execute()) ? true : false;
		} catch (PDOException $e) {
			if ($this->PDO instanceof PDO) {
				$this->PDO->rollback();
			}
			throw $e;
		}
	}
}
