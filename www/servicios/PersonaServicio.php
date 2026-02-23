<?php

require_once __DIR__ . '/../modelos/UsuarioRepositorio.php';
require_once __DIR__ . '/../modelos/PersonaRepositorio.php';
require_once __DIR__ . '/../clases/Database.php';

class PersonaServicio {

	private $usuarioRepositorio;
	private $personaRepositorio;
	private $conexion;

	public function __construct() {
		$db = new Conexion();
		$this->conexion = $db->getConexion();

		$this->usuarioRepositorio = new UsuarioRepositorio($this->conexion);
		$this->personaRepositorio = new PersonaRepositorio($this->conexion);

	}

	public function obtener() {
		return $this->personaRepositorio->listar();
	}

	public function buscar($codigo) {
		return $this->personaRepositorio->porCodigo($codigo);
	}

	//Este método utiliza transacciones
	public function guardar($persona) {
		try {

			$this->conexion->beginTransaction();

			$usuarioTmp = $persona->getUsuario();
			$usuario = $this->usuarioRepositorio->guardar($usuarioTmp);
			$persona->setUsuario($usuario);

			$this->personaRepositorio->guardar($persona);

			$this->conexion->commit();

			return true;
		}catch(PDOException $e) {
			$this->conexion->rollBack();
			echo "Falló la transaccion" . $e->getMessage();
		}
	}

	//Este método utiliza transacciones
	public function modificar($persona) {

		try {

			$this->conexion->beginTransaction();

			$usuario = $persona->getUsuario();

			$this->usuarioRepositorio->modificar($usuario);
			$this->personaRepositorio->modificar($persona);

			$this->conexion->commit();

			return true;
		}catch(PDOException $e) {
			$this->conexion->rollBack();
			echo "Fallo la transaccion: " . $e->getMessage();
		}
	}

	//Este método utiliza transacciones
	public function eliminar($code_per, $code_user) {

		try {
			$this->conexion->beginTransaction();

			$this->personaRepositorio->eliminar($code_per);
			$this->usuarioRepositorio->eliminar($code_user);

			$this->conexion->commit();

			return true;
		}catch(PDOException $e) {
			$this->conexion->rollBack();
			echo "Fallo la transaccion: " . $e->getMessage();
		}
	}
}