<?php 

class Usuario {

	private $codigo;
	private $email;
	private $password;

	public function __construct($codigo = null, $email = null, $password = null) {
		$this->codigo = $codigo;
		$this->email = $email;
		$this->password = $password;
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}
}