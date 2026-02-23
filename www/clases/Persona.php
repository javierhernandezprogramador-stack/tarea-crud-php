<?php 

class Persona {

	private $codigo;
	private $nombre;
	private $apellido;
	private $dui;
	private $nit;
	private $direccion;
	private $telefono;
	private $fecha;
	private $usuario;

	public function _construct($codigo = null, $nombre = null, $apellido = null, $dui = null, $nit = null, $direccion = null, $telefono = null, $fecha = null, $usuario = null) {
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->dui = $dui;
		$this->nit = $nit;
		$this->direccion = $direccion;
		$this->telefono = $telefono;
		$this->fecha = $fecha;
		$this->usuario = $usuario;
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($apellido) {
		$this->apellido = $apellido;
	}

	public function getDui() {
		return $this->dui;
	}

	public function setDui($dui) {
		$this->dui = $dui;
	}

	public function getNit() {
		return $this->nit;
	}

	public function setNit($nit) {
		$this->nit = $nit;
	}

	public function getDireccion() {
		return $this->direccion;
	}

	public function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	public function getTelefono() {
		return $this->telefono;
	}

	public function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	public function getFecha() {
		return $this->fecha;
	}

	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}
}