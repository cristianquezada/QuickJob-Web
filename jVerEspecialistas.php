<?php
//Iniciar Sesión

session_start();
if (isset($_SESSION['idpro'])) {
    $idTrabajador = $_SESSION['idpro'];

}
//if (isset($_POST['idboton'])) {
//    $idTrabajador = $_POST['idboton'];
//    $_SESSION['idpro']=$idTrabajador;
//
//}
//Proceso de conexión con la base de datos
$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la base de datos");

//Validar si se está ingresando con sesión correctamente
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>HireMe</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
</head>
<body>
    <header>

    </header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Especialistas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#.php">Editar Especialistas</a></li>
          </ul>
        </li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerProyecto.php">Ver Proyectos</a></li>
            <li><a href="jTerminarProyecto.php">Terminar Proyectos</a></li>
            <li><a href="jVerHistorialProyectos.php">Historial de Proyectos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Especialistas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jCrearTrabajador.php">Crear nuevo Trabajador</a></li>
            <li><a href="jVerEspecialistas.php">Editar Trabajador</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usabilidad<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerPersonalApp.php">Personas que usan la app</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estado de Selección<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="jVerAvance.php">Avance selección</a></li>
            <li><a href="jVerAvanceRechazo.php">Avance contratados</a></li>
            <li><a href="jVerAvanceRechazado.php">% de rechazo</a></li>
            <li><a href="jVerAvanceContratados.php">Contratados vs P.Filtro</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jefe de Proyecto <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerMiCuenta.php">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br>
<br><br>
    <div>
    <div class="col-sm-8 col-sm-offset-2 myform-cont">
    <br>
        <tbody >
        <h1 align="center">Listado de Trabajadores</h1>

        <div >
        <div class="myform-bottom" >
        <br >
            <table class='table' align="center">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Fono</th><th>Cargo</th><th>Dirección</th><th>Exámen Médico</th><th>Inducción</th><th>Talla</th><th>Bloqueo</th><th>Salud</th><th>Afp</th><th align="center"><span class="glyphicon glyphicon-wrench">   </span>Acciones </th>

                </tr>
            </thead>
<?php
$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}
$consulta = "SELECT * FROM trabajador";
if ($resultado = $mysqli->query($consulta)) {
    while ($fila = $resultado->fetch_row()) {
        echo "<tr>";
        echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[6]</td><td>$fila[7]</td><td>$fila[8]</td><td>$fila[9]</td><td>$fila[12]</td><td>$fila[13]</td>";
        echo "<td>";
        echo "<a data-toggle='modal' data-target='#editUsu' data-id='" . $fila[0] . "' data-nombre='" . $fila[1] . "' data-fono='" . $fila[2] . "' data-cargo='" . $fila[3] . "' data-direccion='" . $fila[4] . "' data-medico='" . $fila[6] . "' data-induccion='" . $fila[7] . "' data-talla='" . $fila[8] . "' data-bloqueo='" . $fila[9] . "' data-salud='" . $fila[12] . "' data-afp='" . $fila[13] . "' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> ";
        echo "<td>";

        echo "</td>";
        echo "</tr>";
    }
    $resultado->close();
}
$mysqli->close();

?>
    </table>
        </div>


        <div align="center" class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Trabajador</h4>
                    </div>
                    <div class="modal-body">
                       <form action="jAtualizarEspecialista.php" method="POST">

                                    <input  id="id" name="id" type="hidden" ></input>
                                    <div class="form-group">
                                        <label for="nombre">Nombre Completo</label>
                                        <input class="form-control" id="nombre" name="nombre" type="text" required="required" ></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="fono">Fono</label>
                                        <input class="form-control" id="fono" name="fono" type="text" required="required" ></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="cargo">Cargo</label>
                                        <input class="form-control" id="cargo" name="cargo" type="text" required="required"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input class="form-control" id="direccion" name="direccion" type="text" required="required" ></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="medico">Exámen Médico</label>
                                        <input type="text" id="medico" name="medico" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="induccion">Inducción</label>
                                        <input type="text" id="induccion" name="induccion" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="talla">Talla</label>
                                        <select name="talla" id="talla" class="form-control" required="required">
                                            <option >L</option>
                                            <option >M</option>
                                            <option >XL</option>
                                            <option >XXL</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="bloqueo">Bloqueo</label>
                                        <input type="text" id="bloqueo" name="bloqueo" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="salud">Salud</label>
                                        <select name="salud" id="salud" class="form-control" required="required">
                                            <option >Consalud</option>
                                            <option >Cruz Blanca</option>
                                            <option >Fonasa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="afp">AFP</label>
                                        <select name="afp" id="afp" class="form-control" required="required">
                                            <option >Capital</option>
                                            <option >Cuprum</option>
                                            <option >Habitat</option>
                                            <option >Modelo</option>
                                            <option >Plan Vital</option>
                                            <option >Provida</option>
                                        </select>
                                    </div>

                                    <input type="submit" class="btn btn-success" value="Actualizar Trabajador">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <script>
          $('#editUsu').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var recipient0 = button.data('id')
          var recipient1 = button.data('nombre')
          var recipient2 = button.data('fono')
          var recipient3 = button.data('cargo')
          var recipient4 = button.data('direccion')
          var recipient6 = button.data('medico')
          var recipient7 = button.data('induccion')
          var recipient8 = button.data('talla')
          var recipient9 = button.data('bloqueo')
          var recipient12 = button.data('salud')
          var recipient13 = button.data('afp')
          var modal = $(this)
          modal.find('.modal-body #id').val(recipient0)
          modal.find('.modal-body #nombre').val(recipient1)
          modal.find('.modal-body #fono').val(recipient2)
          modal.find('.modal-body #cargo').val(recipient3)
          modal.find('.modal-body #direccion').val(recipient4)
          modal.find('.modal-body #medico').val(recipient6)
          modal.find('.modal-body #induccion').val(recipient7)
          modal.find('.modal-body #talla').val(recipient8)
          modal.find('.modal-body #bloqueo').val(recipient9)
          modal.find('.modal-body #salud').val(recipient12)
          modal.find('.modal-body #afp').val(recipient13)
        });

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script>
  $('.date').datepicker({
    format: 'yyyy-mm-dd',
  })
  </script>

    </br>
    </br>
</body>
</html>

