<!-------CABECERA------>
<?php
session_start();
include_once'cabecera.aprendiz.php';
?>
    <!---------------CONTENEDORES---------------->
<?php
include_once'contenedor.user.php';
?>
<!----------CONTROLADOR PRINCIPAL--------->
<?php
include_once'../../controlador/aprendizController/novedadController.php';
?>
    <!--------------FIN CONTENEDORES---------------->
<?php
include_once'fin.php';
?>