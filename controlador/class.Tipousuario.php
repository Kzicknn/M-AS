<?php
//CODIGO PARA ERROR QUE SALE EN LA CONEXION//PERO AL QUITARLA NO SERVIRIA NADA//
ini_set('display_errors','off');
ini_set('display_startup_errors','off');
error_reporting(0);

include_once '../modelo/conexion.php';

class Tipousuario{
	public $id_tipoUsuario;
	public $nombre;
	public $id_estado;


	public function __construct(){
		$this->id_tipoUsuario;
		$this->nombre = $nombre;
		$this->id_estado = $id_estado;
	}//fin construct//





	static function imprimirtipousuario($WHERE){
		$db = new conexion();
		$sql = "SELECT id_tipoUsuario,nombre FROM tipousuario $WHERE";
		$datos = $db->query($sql);
		return $datos;
	}
}//fin clase//
?>