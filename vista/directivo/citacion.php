<!------------CABECERA------------>
<?php
session_start();
include_once'cabeceraDirecrivo.php';
?>
    <!---------------CONTENEDORES---------------->
    <?php
include_once'contenedorDirectivo.php';
?>
<?php
include_once'../../controlador/directivoController/citacionController.php';
?>
    <!--------------FIN CONTENEDORES---------------->
    <?php
include_once'finDirectivo.php';
?>