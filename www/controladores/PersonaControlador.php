<?php 

require_once __DIR__ . '/../servicios/PersonaServicio.php';

class PersonaControlador {

	private $personaServicio;
	private $persona;

	public function __construct($persona) {
		$this->personaServicio = new PersonaServicio();
		$this->persona = $persona;
	}

	public function validar($accion, $codigo, $codigo_user) {
		switch ($accion) {
			case 'listar':
				echo json_encode($this->personaServicio->obtener());
				break;
			case 'buscar':
				echo json_encode($this->personaServicio->buscar($codigo));
				break;
			case 'guardar':
				echo json_encode($this->personaServicio->guardar($this->persona));
				break;
			case 'modificar':
				echo json_encode($this->personaServicio->modificar($this->persona));
				break;
			case 'eliminar':
				echo json_encode($this->personaServicio->eliminar($codigo, $codigo_user));
				break;	
			default:
				echo json_encode(['error' => 'Operación no valida']);
				break;
		}
	}
}