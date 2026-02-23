<?php

require_once __DIR__ . '/../controladores/PersonaControlador.php';
require_once __DIR__ . '/../clases/Persona.php';
require_once __DIR__ . '/../clases/Usuario.php';

$accion = base64_decode($_POST["accion"]);
$persona = null;
$codigo = (isset($_POST["codigo"])) ? base64_decode($_POST["codigo"]) : null;
$codigo_user = (isset($_POST["codigo_usuario"])) ? base64_decode($_POST["codigo_usuario"]) : null;

if ($accion == "guardar" || $accion == "modificar") {	
	$prototipo = $_POST["persona"];

	$usuario = new Usuario();
	$usuario->setCodigo($prototipo["usuario"]["codigo"]);
	$usuario->setEmail($prototipo["usuario"]["email"]);
	$usuario->setPassword($prototipo["usuario"]["password"]);

	$persona = new Persona();
	$persona->setCodigo($prototipo["codigo"]);
	$persona->setNombre($prototipo["nombre"]);
	$persona->setApellido($prototipo["apellido"]);
	$persona->setDireccion($prototipo["direccion"]);
	$persona->setFecha($prototipo["fecha"]);
	$persona->setNit($prototipo["nit"]);
	$persona->setDui($prototipo["dui"]);
	$persona->setTelefono($prototipo["telefono"]);

	$persona->setUsuario($usuario);
}

$personaControlador = new PersonaControlador($persona);
$personaControlador->validar($accion, $codigo, $codigo_user);
