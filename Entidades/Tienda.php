<?php
class Tienda {
	var $id_tienda;
	var $nom_tienda;


	function __construct($id_tienda,$nom_tienda) {
		$this->id_tienda = $id_tienda;
		$this->nom_tienda = $nom_tienda;
	}
}
?>