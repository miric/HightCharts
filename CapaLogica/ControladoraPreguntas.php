<?php
include_once ('../CapaPersistencia/Query.php');
include_once ('../Entidades/Pregunta.php');
include_once ('../Entidades/Tienda.php');
class ControladoraPregunta {
	public $conexion;
	public $listaPreguntas;
	public function __construct() {
		;
	}
	public function GetListaPreguntas() {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetListaPreguntas ();
		// Se trabaja con la tabla dada por la query y se pasa a una lista
		for($i = 0; $i < count ( $respuesta ); $i ++) {
			$id_pregunta = $respuesta [$i] [0];
			$nom_pregunta = $respuesta [$i] [1];	
			$pregunta = new Pregunta ( $id_pregunta, $nom_pregunta );
			$listaPreguntas [$i] = $pregunta;
		}
		return $listaPreguntas;
	}		
		public function GetSatisfaccion($id_pregunta) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetSatisfaccion ($id_pregunta);
		return $respuesta;
	}
		public function GetSatisfaccionTienda($id_pregunta,$id_tienda) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetSatisfaccionTienda ($id_pregunta,$id_tienda);
		return $respuesta;
	}
		public function GetInsatisfaccion($id_pregunta) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetInsatisfaccion ($id_pregunta);
		return $respuesta;
	}
		public function GetInsatisfaccionTienda($id_pregunta,$id_tienda) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetInsatisfaccionTienda ($id_pregunta,$id_tienda);
		return $respuesta;
	}
		public function GetNeta($id_pregunta) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetNeta ($id_pregunta);
		return $respuesta;
	}
		public function GetNetaTienda($id_pregunta,$id_tienda) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetNetaTienda ($id_pregunta,$id_tienda);
		return $respuesta;
	}
		public function GetBase($id_pregunta) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetBase ($id_pregunta);
		return $respuesta;
	}	
	
		public function GetBaseTienda($id_pregunta,$id_tienda) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetBaseTienda ($id_pregunta,$id_tienda);
		return $respuesta;
	}
		public function GetTienda($id_tienda) {
		$this->conexion = new Query ();
		$respuesta = $this->conexion->GetTienda ($id_tienda);
		return $respuesta;
	}
	
	
}

?>