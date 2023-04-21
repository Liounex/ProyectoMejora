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

	public function getshow($code) {
		try {
			$statement = $this->PDO->prepare('SELECT * FROM usuario WHERE dni_user = :code');
			$statement->bindParam(':code', $code);
			$statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
			$this->PDO = null;
		} catch (PDOException $e) {
			echo "Error al conectar a la base de datos". $e->getMessage();
		}
	}
}