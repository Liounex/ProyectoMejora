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
			$this->PDO = null;
			return ($result > 0) ? true : false;
		} catch (PDOException $e) {
			echo "Error al conectar a la base de datos: " . $e->getMessage();
		}
	}
}