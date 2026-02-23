<?php 

//require_once __DIR__ . '/../clases/Database.php';
require_once __DIR__ . '/../clases/Persona.php';
require_once __DIR__ . '/../clases/Usuario.php';
require_once __DIR__ . '/../util/Util.php';

class PersonaRepositorio {
	private $conexion;
	private $util;

	public function __construct($conexion) {
		//$db = new Conexion();
		//$this->conexion = $db->getConexion();
		$this->conexion = $conexion;
		$this->util = new Util();
	}

	public function listar() {
		$sql = "SELECT tp.codigo AS codigo_persona, tp.nombre, tp.apellido, tp.dui, tp.nit, tp.telefono, tp.direccion, tu.email, tp.fecha, tu.codigo AS codigo_usuario FROM tb_persona tp INNER JOIN tb_usuario tu ON tp.usuario = tu.codigo";

		$query = $this->conexion->query($sql);
		$rows = $query->fetchAll(PDO::FETCH_ASSOC);

		return $rows;
	}

	public function porCodigo($codigo) {
		$sql = "SELECT tp.codigo AS codigo_persona, tp.nombre, tp.apellido, tp.dui, tp.nit, tp.telefono, tp.direccion, tu.email, tp.fecha, tu.codigo AS codigo_usuario FROM tb_persona tp INNER JOIN tb_usuario tu ON tp.usuario = tu.codigo WHERE tp.codigo = ?";

		$query = $this->conexion->prepare($sql); 
		$query->bindValue(1, $codigo);
		$query->execute();
		$row = $query->fetch(PDO::FETCH_ASSOC);

		return $row;
	}

	public function guardar($persona) {
		
		$uuid = $this->util->generarUUID();
		$persona->setCodigo($uuid);

		$sql = "INSERT INTO tb_persona(nombre, apellido, dui, nit, telefono, direccion, fecha, usuario, codigo) VALUES(?,?,?,?,?,?,?,?,?)";
		$query = $this->conexion->prepare($sql);

		$query->bindValue(1, $persona->getNombre());
		$query->bindValue(2, $persona->getApellido());
		$query->bindValue(3, $persona->getDui());
		$query->bindValue(4, $persona->getNit());
		$query->bindValue(5, $persona->getTelefono());
		$query->bindValue(6, $persona->getDireccion());
		$query->bindValue(7, $persona->getFecha());
		$query->bindValue(8, $persona->getUsuario()->getCodigo());
		$query->bindValue(9, $persona->getCodigo());

		return $query->execute();
	}

	public function modificar($persona) {
		$sql = "UPDATE tb_persona SET nombre = ?, apellido = ?, dui = ?, nit = ?, telefono = ?, direccion = ?, fecha = ?, usuario = ? WHERE codigo = ?";
		$query = $this->conexion->prepare($sql);

		$query->bindValue(1, $persona->getNombre());
		$query->bindValue(2, $persona->getApellido());
		$query->bindValue(3, $persona->getDui());
		$query->bindValue(4, $persona->getNit());
		$query->bindValue(5, $persona->getTelefono());
		$query->bindValue(6, $persona->getDireccion());
		$query->bindValue(7, $persona->getFecha());
		$query->bindValue(8, $persona->getUsuario()->getCodigo());
		$query->bindValue(9, $persona->getCodigo());

		return $query->execute();
	}

	public function eliminar($codigo) {
		$sql = "DELETE FROM tb_persona WHERE codigo = ?";
		$query = $this->conexion->prepare($sql);
		$query->bindValue(1, $codigo);
		$query->execute();
	}
}