<?php
class Conexion {
	private $cadenaConexion;
	private $user;
	private $password;
	private $objetoConexion;
	public function __construct() {
		$this->cadenaConexion = 'mysql:host=localhost;dbname=activa';
		$this->user = "root";
		$this->password = "fernando";
	}
	public function conectar() {
		try {
			$this->objetoConexion = new PDO ( $this->cadenaConexion, $this->user, $this->password );
			$this->objetoConexion->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $ex ) {
			echo "problemas para conectar con la base de datos";
		}
	}
	public function desconectar() {
		$this->objetoConexion = null;
	}
	public function ejecutarSinRetorno($strComando) {
			$ejecutar = $this->objetoConexion->prepare( $strComando );
			$ejecutar->execute();
			return $ejecutar;
	}
	public function ejecutarConRetorno($strComando) {
			$ejecutar = $this->objetoConexion->prepare( $strComando );
			$ejecutar->execute();
			$rows = $ejecutar->fetchAll();
			return $rows;
	}
}
?>