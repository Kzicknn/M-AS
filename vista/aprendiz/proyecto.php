<!-------CABECERA------>
<?php
session_start();
include_once'cabecera.aprendiz.php';
?>
    <!---------------CONTENEDORES---------------->
<?php
include_once'contenedor.user.php';
?>
<!-------CONTENEDOR PRINCIPAL------->
<?php
include_once'../../controlador/aprendizController/proyectoController.php';
?>
    <!--------------FIN CONTENEDORES---------------->
<?php
include_once'fin.php';
?>