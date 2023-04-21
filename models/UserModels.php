<?php
class UserModels
{
	private $PDO;
	public function __construct()
	{
		require 'C:/xampp/htdocs/proyectomejora/config/Database.php';
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
		} catch (PDOException $e) 
		{
			echo "Error al conectar a lsa base de datos: " . $e->getMessage();
		}
	}
    public function show($code) {
        $sql = "SELECT t1.tramite_id, t1.pago_id, t1.dni_user, t1.voucher, t1.estado_id, t1.id_detalle, t1.tipo_tramite_id, 
        t2.nombre, t2.descripcion, t2.costo, t2.id_requisito, 
        t3.descripcion
        FROM tramite t1
        JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id 
        JOIN estado t3 ON t1.estado_id = t3.estado_id WHERE t1.dni_user = :code";
        //$sql = "SELECT * FROM tramite WHERE dni_user = :code";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':code' , $code);
        $query->execute();
        return $query->fetchAll();
		$this->PDO = null;
    }
}