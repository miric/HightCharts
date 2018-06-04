<?php
include_once ('../CapaPersistencia/Query.php');
include_once ('../Entidades/Tienda.php');
class ControladoraTienda {
	public $conexion;
	public $listaTiendas;
	public function __construct() {
		;
	}

	
	public function GetListaTiendas() {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetListaTiendas ();
		// Se trabaja con la tabla dada por la query y se pasa a una lista
		for($i = 0; $i < count ( $respuesta ); $i ++) {
			$id_tienda = $respuesta [$i] [0];
			$nom_tienda = $respuesta [$i] [1];	
			$tienda = new Tienda ( $id_tienda, $nom_tienda );
			$listaTiendas [$i] = $tienda;
		}
		return $listaTiendas;
	}
		

	
	
}

?>