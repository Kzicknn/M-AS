<?php
    session_start();
    if(@!$_SESSION['id_usuario']){
        header("Location:../../controlador/desconectar.php");
    }elseif($_SESSION['id_rol']==2){
        header("Location:../../controlador/desconectar.php");
    }elseif($_SESSION['id_rol']==3){
        header("Location:../../controlador/desconectar.php");
    }
?>