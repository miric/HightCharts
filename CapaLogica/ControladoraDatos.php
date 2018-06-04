<?php
include_once ('../CapaPersistencia/Query.php');
include_once ('../Entidades/Datos.php');
class ControladoraDatos {
	public $conexion;
	public $listaPreguntas;
	public function __construct() {
		;
	}
	public function GetCantidadDatos() {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetCantidadDatos ();
		return $respuesta;
	}
		

	
	
}

?>