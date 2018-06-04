<?php
class Pregunta {
	var $id_pregunta;
	var $nom_pregunta;


	function __construct($id_pregunta,$nom_pregunta) {
		$this->id_pregunta = $id_pregunta;
		$this->nom_pregunta = $nom_pregunta;
	}
}
?>