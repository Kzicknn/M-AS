<!------------CABECERA------------>
<?php
session_start();
include_once'cabeceraDirecrivo.php';
?>
    <!---------------CONTENEDORES---------------->
    <?php
include_once'contenedorDirectivo.php';
?>
<!-----------CONTENEDOR PRINCIPAL---------->
<?php
include_once'../../controlador/directivoController/veraprendizhorasadminController.php';
?>
    <!--------------FIN CONTENEDORES---------------->
    <?php
include_once'finDirectivo.php';
?>
