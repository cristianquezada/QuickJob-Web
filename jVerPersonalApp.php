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
	
    
    <div class="col-md-8 col-md-offset-2">
	<br>

	<?php
include "conexionbd.php";
$dato = $_SESSION['id'];
// echo $dato;
$sql="SELECT fktrabajador FROM fcm_info";
//$sql_consultar = "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.fkjefeproyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto WHERE j.idjefeProyecto = '". $_SESSION['id'] ."' ORDER BY p.nombreProyecto ASC";
$resultados    = $conex->query($sql);

$r=mysql_query("SELECT count(*) as total FROM fcm_info");
$d=mysql_fetch_assoc($r);

?>
		<br><br>
        <center>
		<h1>Personal Usando la Aplicación</h1>
			<div class="myform-bottom">
			<table class="table" align="center">
				<thead>
				<tr>
						
						<td align="center"><h4><b>Nombre</b></h4></td>
						<td align="center"><h4><b>Cargo</b></h4></td>
				</tr>
				</thead>
                <p><h4><b>Personas que usan la app: <?php echo $d['total']?></b></h4></p>
				<?php

foreach ($resultados as $fila) {
	
	$id=$fila['fktrabajador'];
	$sql1="SELECT t.nombreCompleto, c.cargo FROM cargos c inner join trabajador t on c.idCargo=t.fkCargo where t.idTrabajador='$id'";
//$sql_consultar = "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.fkjefeproyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto WHERE j.idjefeProyecto = '". $_SESSION['id'] ."' ORDER BY p.nombreProyecto ASC";
$resultados1    = $conex->query($sql1);

foreach ($resultados1 as $fila1) {
	
    ?>
					<form method="post" action="envioDatos.php" name="form-lista">
					<tbody>
					<tr>
						<td ><?php echo $fila1['nombreCompleto']; ?></td>
						<td><?php echo $fila1['cargo']; ?></td>
						<?php // echo $fila['IdProyecto']?>
						
					</tr>
					</tbody>
					</form>
				<?php
}
}
?>
			</table>
			</div>
	</div>
    
    <div class="col-md-8 col-md-offset-2">
	<br>

	<?php
include "conexionbd.php";
$dato = $_SESSION['id'];
// echo $dato;
$sql3="SELECT * FROM usuario where estadoUsuario='HABILITADO' AND fktipousuario='2'";
//$sql_consultar = "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.fkjefeproyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto WHERE j.idjefeProyecto = '". $_SESSION['id'] ."' ORDER BY p.nombreProyecto ASC";
$resultados3    = $conex->query($sql3);

$re=mysql_query("SELECT count(*) as cantidad FROM usuario where estadoUsuario='HABILITADO' AND fktipousuario='2'");
$da=mysql_fetch_assoc($re);


?>
		<br><br>
        <center>
		<h1>Personas que no están usando la App</h1>
			<div class="myform-bottom">
			<table class="table" align="center">
				<thead>
				<tr>
						
						<td align="center"><h4><b>Nombre</b></h4></td>
						<td align="center"><h4><b>Cargo</b></h4></td>
				</tr>
				</thead>
                <p><h4><b>Personas que no usan la app: <?php echo $da['cantidad']?></b></h4></p>
				<?php

foreach ($resultados3 as $fila3) {
	
	
	$id=$fila3['idusuario'];
	$sql4="SELECT t.nombreCompleto, c.cargo FROM cargos c inner join trabajador t on c.idCargo=t.fkCargo where t.idTrabajador='$id'";
//$sql_consultar = "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.fkjefeproyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto WHERE j.idjefeProyecto = '". $_SESSION['id'] ."' ORDER BY p.nombreProyecto ASC";
$resultados4    = $conex->query($sql4);

foreach ($resultados4 as $fila4) {
	
    ?>
					<form method="post" action="envioDatos.php" name="form-lista">
					<tbody>
					<tr>
						<td><?php echo $fila4['nombreCompleto']; ?></td>
						<td><?php echo $fila4['cargo']; ?></td>
						<?php // echo $fila['IdProyecto']?>
						
					</tr>
					</tbody>
					</form>
				<?php
}
}
?>
			</table>
			</div>
	</div>

</body>
</html>