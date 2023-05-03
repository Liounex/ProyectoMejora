<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

class Conexion {
	public function conectar() {
		//require_once('config.php');
		try {
			$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
			$dotenv->load();
			$PDO = new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $PDO;
		} catch (PDOException $e){
			echo "Error: " . $e->getMessage();
		}
	}
}