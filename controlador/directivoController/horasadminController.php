<center><br>
                <h3><strong>TABLA VER HORAS DE APRENDICES</strong></h3>
                <em>(ver las horas que ha desarrollado el aprendiz y reiniciarlas)</em>
                <form name="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="cdr" >
                <p><input name="T1"  type="text" style="width:30%; height:5%" class="form-control" size="20"></p>
                <input  name="buscar" type="submit" id="buscar" value="buscar" class="btn btn-lg btn-primary btn-block btn-sm" style="width: 100px"/>
                </form><br>
                <?php
                //CODIGO PARA ERROR QUE SALE EN LA CONEXION//PERO AL QUITARLA NO SERVIRIA NADA//
                ini_set('display_errors','off');
                ini_set('display_startup_errors','off');
                error_reporting(0);

                $buscar = $_POST['T1'];
        require("../../modelo/conexion.php");
        include '../../controlador/class.horas.php';
        $query=Horas::imprimirHoras("WHERE horas.documento LIKE '%".$buscar."%' and horas.tok=0 GROUP BY horas.documento DESC");
        echo '<div class="table-responsive table-hover">';
        echo '<table class="table">';
        echo  '<thead class="bg-danger">';
        echo '<tr>';
        echo '<th scope="col">Documento</th>';
        echo '<th scope="col">Supervisor a cargo</th>';
        echo '<th scope="col">Mirar</th>';
        echo '</tr>';
        echo '</thead>';
        while($arreglo=mysqli_fetch_array($query)){
                echo "<tr class='success'>";
        $arreglo[0];
        echo "<td style='width:50%'>$arreglo[1]</td>";
        echo "<td style='width:100%'>$arreglo[5]</td>";
        echo "<td><a href='veraprendizhorasadmin.php?codigoo=$arreglo[1]'><button type='button' class='btn btn-dark'>Mirar</button></a></td>";
        //echo "<td>$arreglo[3]</td>";
        //echo "<td>$arreglo[4]</td>";
        //echo "<td>$arreglo[5]</td>";
        //echo "<td>$arreglo[6]</td>";
        //echo "<td><a href='inicio_supervisor.php?codigo=$arreglo[0]&codigoborrar=2'><span class='glyphicon glyphicon-remove-circle'></a></td>";
        //echo "<td><a href='inicio_supervisor.php?codigo=$arreglo[0]&codigohabilitar=2'><span class='glyphicon glyphicon-ok-circle'></a></td>";
        echo "</tr>";
        }
        echo "</table>";
?>
</div>
