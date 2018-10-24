<?php
//CODIGO PARA ERROR QUE SALE EN LA CONEXION//PERO AL QUITARLA NO SERVIRIA NADA//
ini_set('display_errors','off');
ini_set('display_startup_errors','off');
error_reporting(0);

include_once '../modelo/conexion.php';

class Usuario{
	public $id_usuario;
	public $documento;
	public $id_tipoDocumento;
	public $nombre;
	public $apellido;
	public $correo;
	public $telefono;
	public $contrasena;
	public $passadmin;
	public $passsuper;
	public $id_sede;
	public $id_programa;
	public $id_ficha;
	public $id_tipoUsuario;
	public $id_rol;
	public $id_estado;
	public $db;

	public function __construct($documento, $id_tipoDocumento, $nombre, $apellido, $correo,$telefono, $contrasena,$passadmin,$passsuper, $id_sede, $id_programa, $id_ficha, $id_tipoUsuario, $id_rol, $id_estado){
		$this->id_usuario;
		$this->documento = $documento;
		$this->id_tipoDocumento = $id_tipoDocumento;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->correo = $correo;
		$this->telefono = $telefono;
		$this->contrasena = $contrasena;
		$this->passadmin = $passadmin;
		$this->passsuper = $passsuper;
		$this->id_sede = $id_sede;
		$this->id_programa = $id_programa;
		$this->id_ficha = $id_ficha;
		$this->id_tipoUsuario = $id_tipoUsuario;
		$this->id_rol = $id_rol;
		$this->id_estado = $id_estado;
		$this->db =new Conexion();
	}//FIN CONSTRUCTOR//
	public function insertarusuario(){
		$db = new Conexion();
		$valido = $this->validardoc($this->documento);
		if ($valido) {
			echo '<script language="javascript">alert("Este documento ya esta registrado, porfavor intente con otro");location.href="../vista/registro_aprendiz.php"</script>';
		} else {
			$sql_insertarusuario = "INSERT INTO usuario
			(documento,id_tipoDocumento,nombre,apellido,correo,telefono,contrasena,passadmin,passsuper,id_sede,id_programa,id_ficha,id_tipoUsuario,
			id_rol,id_estado)
			VALUES ('$this->documento','$this->id_tipoDocumento','$this->nombre','$this->apellido','$this->correo','$this->telefono','$this->contrasena','$this->passadmin','$this->passsuper','$this->id_sede','$this->id_programa','$this->id_ficha','$this->id_tipoUsuario','$this->id_rol','$this->id_estado')";
			$this->db->query($sql_insertarusuario);
			if($this->db->errno){
				die('<script language="javascript">alert("ERROR, NO SE HA PODIDO REGISTRAR")location.href="../vista/registro_aprendiz.php;" </script>');
			}else{
				echo '<script language="javascript">alert("SE HA REGISTRADO CORRECTAMENTE, ENTRASTE A UN PROCESO DE SELECCION, EN UNOS DIAS TE CONFIRMARAN Y PODRAS ACCEDER A EL SISTEMA");';
				echo 'location.href ="../index.html"</script>';
			}
		}
}//FIN METODO insertarusuario//

public function insertarsupervisor(){
	$db = new Conexion();
	$valido = $this->validardoc($this->documento);
	if ($valido) {
		echo '<script language="javascript">alert("Este documento ya esta registrado, porfavor intente con otro");location.href="../vista/directivo/agregarsupp.php"</script>';
	} else {
		$sql_insertarsup = "INSERT INTO usuario
		(documento,id_tipoDocumento,nombre,apellido,correo,telefono,contrasena,passadmin,passsuper,id_sede,id_programa,id_ficha,id_tipoUsuario,
		id_rol,id_estado)
		VALUES ('$this->documento','$this->id_tipoDocumento','$this->nombre','$this->apellido','$this->correo','$this->telefono','$this->contrasena','$this->passadmin','$this->passsuper','$this->id_sede','$this->id_programa','$this->id_ficha','$this->id_tipoUsuario','$this->id_rol','$this->id_estado')";
		$this->db->query($sql_insertarsup);
		if($this->db->errno){
			die('<script language="javascript">alert("ERROR, NO SE HA PODIDO REGISTRAR EL SUPERVISOR")location.href="../vista/directivo/agregarsup.php;" </script>');
		}else{
			echo '<script language="javascript">alert("SE HA REGISTRADO CORRECTAMENTE UN NUEVO SUPERVISOR");';
			echo 'location.href ="../vista/directivo/agregarsup.php"</script>';
		}
	}
	}

static function imprimirusuario($WHERE){
	$db = new Conexion();
	$sql = "SELECT usuario.id_usuario,usuario.documento, tipoDocumento.nombre as tipodedocumento, usuario.nombre, usuario.apellido, usuario.correo,usuario.telefono, sede.nombre as sede, programa.nombre as nombreprograma, ficha.nombre as ficha, tipoUsuario.nombre as programa, rol.nombre as rol, estado.nombre as estado 
			FROM usuario
		INNER JOIN tipoDocumento on usuario.id_tipoDocumento=tipoDocumento.id_tipoDocumento
		INNER JOIN sede on usuario.id_sede=sede.id_sede
		INNER JOIN programa on usuario.id_programa=programa.id_programa
		INNER JOIN ficha on usuario.id_ficha=ficha.id_ficha
		INNER JOIN tipoUsuario on usuario.id_tipoUsuario=tipoUsuario.id_tipoUsuario
		INNER JOIN rol on usuario.id_rol=rol.id_rol
		INNER JOIN estado on usuario.id_estado=estado.id_estado
		$WHERE;";
	$datos=$db->query($sql);
	return $datos;
}//FIN METODO imprimirusuario//

static function cambiarEstados($estado, $codigo){
	$db= new Conexion();
	$mensaje="ESTE APRENDIZ ESTA INACTIVO";
	if($estado==1){
		$mensaje="ESTE APRENDIZ QUEDO ACTIVO";
	}
    $sql="UPDATE usuario SET id_estado='$estado' WHERE id_usuario=$codigo";
    $db->query($sql);
	echo ' <script language="javascript">alert("'.$mensaje.'");</script> ';
	echo "<script>location.href='../vista/directivo/Aprendicess.php'</script>";
}//FIn metodo cambiarEstados
static  function validardoc($documento){
	$db = new Conexion();
	$chek = "SELECT * FROM usuario WHERE documento='$documento'";
	$output_sql = $db->query($chek);
	if ($output_sql->num_rows >= 1){
		$valido=true;
	}
	return $valido;
}//FIN METODO VALIDARDOC//

}//FIN CLASE USUARIO//
?>