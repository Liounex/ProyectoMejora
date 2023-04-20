<?php
class Conexion {

	public function conectar() {
		require_once('config.php');
		try {
			$PDO = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $PDO;
		} catch (PDOException $e){
			echo "Error: " . $e->getMessage();
		}
	}
}