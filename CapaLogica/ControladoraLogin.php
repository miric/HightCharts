<?php
include_once ('../CapaPersistencia/Query.php');
class ControladoraLogin {
	public $conexion;
	public function __construct() {
		;
	}
	public function ValidarUsuario($username, $password) {
		$this->conexion = new Query ();
		$cifradoPassword = md5 ( $password );	
		$respuesta = $this->conexion->ValidarUsuario ( $username, $cifradoPassword );
		return $respuesta;
	}
}
?> 