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
$id=$_SESSION['id'];

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION) {
    header("location:login.php");
}
?>
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
		<div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="envioCodTerminar.php" method="POST" name="form1" onsubmit="return pregunta()">

	<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='1'and fkjefeproyecto='$id' ORDER BY p.nombreProyecto ASC;";
		$resultados2=$conex->query($sql_consultar2);
	?>
		<h1 align="center">Solicitud para terminar proyecto</h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Nombre de proyecto</th>
						<th>Descripcion proyecto</th>
						<th>Jefe de proyecto</th>
						<th>Cantidad de especialistas</th>
                        <th>Acción</th>
					</tr>
			<thead>
			<tbody>
				<?php
					foreach ($resultados2 as $fila2){
				?>
					<tr>
						<td align="left"><?php echo $fila2['NombreProyecto'];?></td>
						<td align="left"><?php echo $fila2['DescripcionProyecto'];?></td>
						<td><?php echo $fila2['nombreJefeP']." ".$fila2['apellidoJefeP'];?></td>
						<td><?php echo $fila2['CantNecesaria'];?></td>
                        <td align="left"><button type="submit" name="idboton2" id="<?php echo $fila2['IdProyecto']; ?>" value="<?php echo $fila2['IdProyecto']; ?>" class="btn btn-success">Terminar</button></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>	
            </form>
	</div>

</body>
</html><script>
function pregunta(){
if(confirm("¿Está seguro de enviar la solicitud para terminar el proyecto seleccionado?"))
    {
		<!--alert('Datos enviados correctamente')-->
        return true;
    }else{
	alert('Operación cancelada, Vuelva a seleccionar un proyecto')
    return false;
	}
}
	</script>