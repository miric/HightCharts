<?php
class Datos {
	var $id;
	var $id_tienda;
	var $P1;
	var $P2;
	var $P3;
	var $P4;


	function __construct($id,$id_tienda,$P1,$P2,$P3,$P4) {
		$this->id = $id;
		$this->id_tienda = $id_tienda;
		$this->P1 = $P1;
		$this->P2 = $P2;
		$this->P3 = $P3;
		$this->P4 = $P4;
	}
}
?>