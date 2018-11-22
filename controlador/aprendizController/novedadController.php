<script  src="../../assets/js/jquery-3.2.1.js"></script>
    <script  src="../../assets/js/jquery.validate.js"></script>
    <script>
      $(document).ready(function(){
var requerido="LLENE ESTE CAMPO";
jQuery.validator.addMethod("letras", function(value, element) {
return this.optional( element ) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test( value );
}, 'Solo se permiten letras.');
$("#form5").validate({
rules:{
    descripcion:{
    required:true,
    letras:true
  }
}
  ,
messages:{
    descripcion:{
  required:requerido
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
                <!----------------AQUI VA TEXTO DE INICIO CON CALENDARIO-------------->
                <h3><strong>NOTIFICACIONES</strong></h3>
                <em>(Aca usted podra llenar este formulario por si se le presenta alguna novedad dependiendo el tipo de
                    novedad que escoja)
                </em>
                <form action="../../controlador/ejecutanovedad.php" method="POST" id="form5" name="form5"><br>
                    <b>Seleccione el tipo de novedad</b>
                    <select name="id_tipoNovedad" id="id_tipoNovedad" style="width:45%; height:8%" class="form-control"
                        required>
                        <option>seleccione...</option>
                        <?php
            //CONEXION BASE DE DATOS//
                require_once "../../modelo/conexion.php";
                require_once '../../controlador/class.Tiponovedad.php';
                    $mysqli = new Conexion();
                    $sql = Tiponovedad::imprimirnovedad("");
                        while ($reg=$sql->fetch_array())
                        {
                    echo "<option value=\"".$reg['id_tipoNovedad']."\">".$reg['nombre']."</option>";
                        }
                ?>
                    </select><br>
                    <b>Descripcion clara de la novedad</b>
                    <textarea type="text" name="descripcion" id="descripcion" style="width:45%; height:20%" class="form-control" required></textarea><br>
                    <b>Supervisor:</b>
                    <select name="supervisor" id="supervisor" style="width:45%; height:8%" class="form-control"
                        required>
                        <option>seleccione...</option>
                        <?php
                //CONEXION BASE DE DATOS//
        require_once "../../modelo/conexion.php";
        require_once '../../controlador/class.usuario.php';
        $sql = Usuario::imprimirusuario("WHERE rol.id_rol=2");
        while ($reg=mysqli_fetch_array($sql))
        {
        echo "<option value=\"".$reg['id_usuario']."\">".$reg['nombre']."</option>";
        }
        ?>
                    </select><br>
                    <button class="btn btn-lg btn-primary btn-block btn-sm" type="submit" class="botonlg" style="width:180px">Enviar</button><br>
                    <em>(Al enviar esta informacion no tiene posibilidad de editarla o cancelarla,
                        por favor diligenciar bien los datos)</em>
                </form>
                <!---FIN TEXTO--->
