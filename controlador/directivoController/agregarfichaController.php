<script  src="../../assets/js/jquery-3.2.1.js"></script>
    <script  src="../../assets/js/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
var requerido="LLENE ESTE CAMPO";
jQuery.validator.addMethod("letras", function(value, element) {
return this.optional( element ) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test( value );
}, 'Solo se permiten letras.');
$("#ffff").validate({
rules:{
nombre:{
    required:true,
    letras:true
},
apellido:{
    required:true,
    letras:true
}
},
messages:{
nombre:{
required:requerido
},
messages:{
    apellido:{
    required:requerido
    }
}

}


});
});
</script>
<style type="text/css">
.error{
display: block;
}
</style>
            <center><br>
                <h3><strong>TABLA DE FICHAS</strong></h3>
                <em>(tabla para agregar fichas y  ver fichas)</em></acronym><br><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#fichass">Agregar Ficha</button>
                <br><br>
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
                include_once'../../modelo/Conexion.php';
                include_once'../../controlador/class.ficha.php';
                $sql = Ficha::imprimirficha("WHERE ficha.nombre LIKE '%".$buscar."%' or programa.nombre LIKE '%".$buscar."%'");
                echo '<div class="table-responsive table-hover">';
                echo '<table class="table">';
                echo  '<thead class="bg-danger">';
                echo '<tr>';
                echo '<th scope="col">Numero De ficha</th>';
                echo '<th scope="col">Programa de la ficha</th>';
                echo '<th scope="col">Estado</th>';
                echo '<th scope="col">Habilitar</th>';
                echo '<th scope="col">Deshabilitar</th>';
                echo '</tr>';
                echo '</thead>';
                while ($reg= Mysqli_fetch_array($sql)) {
                echo "<tr class='success'>";
                $reg['id_ficha'];
                echo "<td>";
                echo $reg['nombre'];
                echo "</td>";
                echo "<td>";
                echo $reg['programa'];
                echo "</td>";
                echo "<td>";
                echo $reg['estadoo'];
                echo "</td>";
                echo "<td><a href='../../controlador/prueba.php?codigo=$reg[id_ficha]&fichahabilitar=2'><button type='button' class='btn btn-warning'>Habilitar</button></a></td>";
                echo "<td><a href='../../controlador/prueba.php?codigo=$reg[id_ficha]&fichadeshabilitar=2'><button type='button' class='btn btn-danger'>Deshabilitar</button></a></td>";
                }

                echo "</table>";


                    ?>
                    <!-- Modal -->
<div class="modal fade" id="fichass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Fichas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form method="POST" action="../../controlador/ejecutaficha.php" id="ffff" name="ffff">
                    Agregar ficha:
                    <input type="number" name="ficha" id="ficha" style="width:50%; height:8%" class="form-control"
                        placeholder="Ficha" required><br>
                        Seleccione programa:
                        <select name="programa" id="programa" style="width:50%; height:8%" class="form-control">
                        <option>Seleccione ...</option>
                        <?php
            //CONEXION BASE DE DATOS//
        require_once "../../modelo/conexion.php";
        require_once '../../controlador/class.programa.php';
        $mysqli = new Conexion();
        $sql = Programa::imprimirprograma("WHERE estado.id_estado=1");
        while ($reg=$sql->fetch_array())
        {
        echo "<option value=\"".$reg['id_programa']."\">".$reg['nombre']."</option>";
        }
        ?>
                        </select><br>
                    <input type="submit" name="" value="Enviar" class="btn btn-lg btn-primary btn-block btn-sm" style="width:15%">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>