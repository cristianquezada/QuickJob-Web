<?php
session_start();
if (isset($_SESSION['id'])) {
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
</head>
<?php
//Proceso de conexión con la base de datos
    $conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
    or die("No se pudo realizar la conexion");
    mysql_select_db("hiremecl_hireme", $conex)
    or die("ERROR con la base de datos");

//Iniciar Sesión
    session_start();

//Validar si se está ingresando con sesión correctamente
    if (!$_SESSION) {
        header("location:login.php");
    }
    ?>

<body>
  <header>

  </header>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="pAdministrador.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="aVerEspecialista.php">Gestión de Especialistas</a></li>
        <li><a href="VerOrganizacion.php">Gestión de Organizaciones</a></li>
        <li><a href="aVerProyectos.php">Gestion de Proyectos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion de cuentas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aVerCuentas.php">Cuentas de representantes</a></li>
            <li><a href="#">Pronto</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div>
  <br><br>

    <h1 align="center">Listado de Especialistas</h1>

    <div >
    <div align="center" >
    <br >
      <a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu">Nuevo Especialista</a><br><br>
      <div class="myform-bottom">
      <table class='table ' align="center">
      <thead>
        <tr>
          <td>Rut</td><td>Nombre</td><td>Telefono</td><td>Cargo</td><td>Ciudad</td><td>Direccion</td><td>Fecha de nacimiento</td><td>Nacionalidad</td><td>Isapre</td><td>AFP</td><td><span class="glyphicon glyphicon-wrench"></span></td>
        </tr>
      </thead>
      <tbody>
<?php
$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");  
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit();
    }
    require("funciones.php"); 
    
    $consulta = "SELECT t.idTrabajador,t.nombreCompleto, t.fono, c.cargo,ci.nombreCiudad, t.direccion, t.fechaNacimiento, n.nombreNacionalidad, s.nombreSalud, a.nombreAfp, u.rut, u.idusuario FROM trabajador t INNER JOIN usuario u on (u.idusuario=t.fkusuario) INNER JOIN cargos c on (c.idCargo=t.fkCargo) INNER JOIN ciudad ci on (ci.idCiudad=t.fkCiudad) INNER JOIN nacionalidad n on (n.idNacionalidad=t.fkNacionalidad) INNER JOIN salud s on (s.idSalud=t.fkSalud) INNER JOIN afp a on (a.idAfp=t.fkAfp) ORDER BY t.nombreCompleto";
    if ($resultado = $mysqli->query($consulta)) {
        while ($fila = $resultado->fetch_row()) {
          $rut = (esRut($fila[10])); 
          ?>

            <form method="post" action="EliminaEspecialista.php" name="form-lista">
            <tbody>
              <tr>
              <td><?php echo $rut; ?></td>
              <td><?php echo $fila[1]; ?></td>
              <td><?php echo $fila[2]; ?></td>
              <td><?php echo $fila[3]; ?></td>
              <td><?php echo $fila[4]; ?></td>
              <td><?php echo $fila[5]; ?></td>
              <td><?php echo $fila[6]; ?></td>
              <td><?php echo $fila[7]; ?></td>
              <td><?php echo $fila[8]; ?></td>
              <td><?php echo $fila[9]; ?></td>
            <td align="left"><button type="submit" name="idboton" id="<?php echo $fila[0]; ?>" value="<?php echo $fila[0]; ?>" class="btn btn-danger">Eliminar especialista</button></td>
          </tr>
          </tbody>
          </form>
          <?php
        }
    }
   
    ?>
      </tbody>
      </table>
    </div>
    <div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Especialista</h4>
                    </div>
                    <div class="modal-body">
                       <form action="InsertarEspecialista.php" method="POST">
                          <div class="form-group">
                            <div class="form-group">
                            <label for="nombre">Rut:</label>
                            <input class="form-control" id="nombre" name="rut" type="text" placeholder="Insertar Rut" required="required"></input>
                          </div>          

              <input type="submit" class="btn btn-success" value="Ingresar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Especialista</h4>
                    </div>
                    <div class="modal-body">
                       <form action="ActualizaEspecialista.php" method="POST">

                                  <input  id="id" name="id" type="hidden" ></input>
                              <div class="form-group">
                            <div class="form-group">
                            <label for="nombre">Rut:</label>
                            <input class="form-control" id="rut" name="rut" type="text" placeholder="Insertar Nombre" required="required"></input>
                          </div>
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Insertar Nombre" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="edad">Apellido paterno:</label>
                            <input class="form-control" id="apellidop" name="apellidop" type="text" placeholder="Insertar Apellido" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="edad">Apellido materno:</label>
                            <input class="form-control" id="apellidom" name="apellidom" type="text" placeholder="Insertar Apellido Materno" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Ciudad:</label>
                            <input class="form-control" id="ciudad" name="ciudad" type="text" placeholder="Insertar Ciudad" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Sexo:</label>
                            <input class="form-control" id="sexo" name="sexo" type="text" placeholder="Insertar Sexo" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Cargo:</label>
                            <input class="form-control" id="cargo" name="cargo" type="text" placeholder="Insertar Cargo" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Habilidad:</label>
                            <input class="form-control" id="habilidad" name="habilidad" type="text" placeholder="Insertar Habilidad"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Correo:</label>
                            <input class="form-control" id="correo" name="correo" type="text" placeholder="Insertar Correo" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Telefono:</label>
                            <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Insertar Telefono" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Password:</label>
                            <input class="form-control" id="password" name="password" type="text" placeholder="Insertar password" required="required"></input>
                          </div>

                  <input type="submit" class="btn btn-success" value="Actualizar Especialista">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> -->



  </div>

  <!-- <script>
      $('#editUsu').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient0 = button.data('rut')
      var recipient1 = button.data('nombre')
      var recipient2 = button.data('apellidop')
      var recipient3 = button.data('apellidom')
      var recipient4 = button.data('ciudad')
      var recipient5 = button.data('sexo')
      var recipient6 = button.data('cargo')
      var recipient7 = button.data('habilidad')
      var recipient8 = button.data('correo')
      var recipient9 = button.data('telefono')
      var recipient10 = button.data('password')
      var modal = $(this)
      modal.find('.modal-body #rut').val(recipient0)
      modal.find('.modal-body #nombre').val(recipient1)
      modal.find('.modal-body #apellidop').val(recipient2)
      modal.find('.modal-body #apellidom').val(recipient3)
      modal.find('.modal-body #ciudad').val(recipient4)
      modal.find('.modal-body #sexo').val(recipient5)
      modal.find('.modal-body #cargo').val(recipient6)
      modal.find('.modal-body #habilidad').val(recipient7)
      modal.find('.modal-body #correo').val(recipient8)
      modal.find('.modal-body #telefono').val(recipient9)
      modal.find('.modal-body #password').val(recipient10)
    });

  </script> -->

</body>
</html>
<?php
} else {
    ?>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
     <?php
}
?>