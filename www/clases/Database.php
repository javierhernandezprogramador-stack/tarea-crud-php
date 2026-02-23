<?php 

class Conexion {
	private $conn;
	private $host;
	private $usuario;
	private $password;
	private $dbName;

	public function __construct() {
		$this->host = "mariadb10.6";
		$this->usuario = "ele1990";
		$this->password = "Root1234.$";
		$this->dbName = "db_nueva";
		$this->crearConexion();
	}

	public function crearConexion() {

		try {
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->usuario, $this->password);
		}catch(PDOException $e) {
			var_dump("Error de Conexion");
			var_dump($e->getMessage());
		}
	}

	public function getConexion() {
		return $this->conn;
	}
}