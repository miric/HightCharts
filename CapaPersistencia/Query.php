<?php
include_once ('../CapaPersistencia/Conexion.php');
class Query {
	public $bdConexion;
	public function __construct() {
		$this->bdConexion = new Conexion ();
	}
	/*
	 * Descripcion:
	 * Metodo para validar usuario
	 * Autor:
	 * Fernando Aguirre
	 */
	Public function ValidarUsuario($username, $password) {
		try {
			$this->bdConexion->conectar ();
			$strComando = "SELECT COUNT(*) FROM usuarios WHERE usuario ='" . $username . "' AND clave ='" . $password . "'";
			$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
			$this->bdConexion->desconectar ();
			return $resp;	
		} catch ( PDOException $e ) {
			throw $e;
		}
}
	Public function GetListaPreguntas() {
		try {
			$this->bdConexion->conectar ();
			$strComando = "SELECT * FROM preguntas";
			$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
			return $resp;
		} catch ( PDOException $e ) {
			throw $e;
		}
	
	}
	Public function GetListaTiendas() {
		try {
			$this->bdConexion->conectar ();
			$strComando = "SELECT * FROM tiendas";
			$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
			return $resp;
		} catch ( PDOException $e ) {
			throw $e;
		}
	
	}
	
		Public function GetTienda($id_pregunta) {
		try {
			$this->bdConexion->conectar ();
			$strComando = "SELECT nom_tienda FROM tiendas where id_tienda=" . $id_pregunta . "";
			$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
			return $resp;
		} catch ( PDOException $e ) {
			throw $e;
		}
	
	}
	
	Public function GetSatisfaccion($id_pregunta) {	
				try {
					$this->bdConexion->conectar ();
					$strComando = "SELECT COUNT(*) FROM datos WHERE " . $id_pregunta . "=6 OR " . $id_pregunta . "=7";
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}
	Public function GetSatisfaccionTienda($id_pregunta,$id_tienda) {	
				try {
					$this->bdConexion->conectar ();
					$strComando = "SELECT COUNT(*) FROM datos WHERE id_tienda= " . $id_tienda . " AND ( ".$id_pregunta."=6 OR ".$id_pregunta."=7)" ;
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}	
	Public function GetInsatisfaccion($id_pregunta) {	
				try {
					$this->bdConexion->conectar ();
					$strComando = "SELECT COUNT(*) FROM datos WHERE " . $id_pregunta . " BETWEEN 1 AND 4";
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}
	Public function GetInsatisfaccionTienda($id_pregunta,$id_tienda) {	
				try {
					$this->bdConexion->conectar ();
					$strComando = "SELECT COUNT(*) FROM datos WHERE (" . $id_pregunta . " BETWEEN 1 AND 4) AND id_tienda= " . $id_tienda . "";
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}
	Public function GetNeta($id_pregunta) {	
				try {
					$this->bdConexion->conectar ();
					$strComando = "SELECT COUNT(*) FROM datos WHERE " . $id_pregunta . " BETWEEN 1 AND 4";
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}
	Public function GetNetaTienda($id_pregunta,$id_tienda) {	
				try {
					$this->bdConexion->conectar ();
						$strComando = "SELECT COUNT(*) FROM datos WHERE " . $id_pregunta . " BETWEEN 1 AND 4 AND id_tienda= " . $id_tienda . "";
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}			
	

	Public function GetCantidadDatos() {	
			try {
				$this->bdConexion->conectar ();
				$strComando = "SELECT COUNT(*) FROM datos";
				$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
				return $resp;
			} catch ( PDOException $e ) {
				throw $e;
			}
		
		}
		
		Public function GetBase($id_pregunta) {	
				try {
					$this->bdConexion->conectar ();
					$strComando = "SELECT COUNT(*) FROM datos WHERE " . $id_pregunta . " BETWEEN 1 AND 7";
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}
		Public function GetBaseTienda($id_pregunta,$id_tienda) {	
				try {
					$this->bdConexion->conectar ();
					$strComando = "SELECT COUNT(*) FROM datos WHERE id_tienda= " . $id_tienda . " AND " . $id_pregunta . " BETWEEN 1 AND 7 ";
					$resp = $this->bdConexion->ejecutarConRetorno ( $strComando );
					return $resp;
				} catch ( PDOException $e ) {
					throw $e;
				}
			
			}
 			

}
?>