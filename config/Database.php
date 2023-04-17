<?php

class Conexion {

	private $host = 'localhost';
	private $user = 'root';
	private $password = '';
	private $database = 'tesis';
	
	public function conectar() {
		try {
			$PDO = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $PDO;
		} catch (PDOException $e){
			echo "Error: " . $e->getMessage();
		}
	}
}