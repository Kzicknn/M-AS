<?php
include_once 'class.usuario.php';
$documento = $_POST['documento'];
$id_tipoDocumento = $_POST['id_tipoDocumento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];
$id_sede = $_POST['id_sede'];
$id_programa = $_POST['id_programa'];
$id_ficha = $_POST['id_ficha'];
$id_tipoUsuario = $_POST['id_tipoUsuario'];
$id_rol = 1;
$id_estado = 5;
$Usuario = new Usuario($documento, $id_tipoDocumento, $nombre, $apellido, $correo,$telefono, $contrasena,$passadmin,$passsuper, $id_sede, $id_programa, $id_ficha, $id_tipoUsuario, $id_rol, $id_estado);
$Usuario->insertarusuario();
?>