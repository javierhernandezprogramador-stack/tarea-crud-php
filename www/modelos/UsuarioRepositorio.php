<?php 

//require_once __DIR__  . '/../clases/Database.php';
require_once __DIR__ . '/../clases/Usuario.php';
require_once __DIR__ . "/../util/Util.php";

class UsuarioRepositorio {

	private $conexion;
	private $util;
	
	public function __construct($conexion) {
		$db = new Conexion();	
		//$this->conexion = $db->getConexion();
		$this->conexion = $conexion;
		$this->util = new util();
	}

	public function listar() {
		$sql = "SELECT codigo, email, password FROM tb_usuario";
		$query = $this->conexion->query($sql);
		$rows = $query->fetchAll(PDO::FETCH_ASSOC);

		return $rows;
	}

	public function guardar($usuario) {

		$uuid = $this->util->generarUUID();
		$usuario->setCodigo($uuid);

		$sql = "INSERT INTO tb_usuario(email, password, codigo) VALUES(?,?,?)";

		$query = $this->conexion->prepare($sql);

		$hashPassword = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);

		$query->bindValue(1, $usuario->getEmail());
		$query->bindValue(2, $hashPassword);
		$query->bindValue(3, $usuario->getCodigo());

		$query->execute();

		return $usuario;
	}

	public function modificar($usuario) {

		$sql = ($usuario->getPassword() != '') ? "UPDATE tb_usuario SET email = ?, password = ? WHERE codigo = ?" : "UPDATE tb_usuario SET email = ? WHERE codigo = ?";

		$query = $this->conexion->prepare($sql);

		$query->bindValue(1, $usuario->getEmail());

		if($usuario->getPassword() != '') {
			$hashPassword = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);
			$query->bindValue(2, $hashPassword);
			$query->bindValue(3, $usuario->getCodigo());
		}else {
			$query->bindValue(2, $usuario->getCodigo());
		}

		return $query->execute();
	}

	public function eliminar($codigo) {
		$sql = "DELETE FROM tb_usuario WHERE codigo = ?";
		$query = $this->conexion->prepare($sql);

		$query->bindValue(1, $codigo);
		$query->execute();
	}
}