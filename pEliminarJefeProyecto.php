<?php
session_start();
$id=$_SESSION['id'];
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
<body>		
	<header>
		
	</header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="pRepresentante.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="pCrearProyecto.php">Crear Proyecto</a></li>
            <li><a href="pVerProyecto.php">Ver Proyectos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Jefes de Proyecto<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="pCrearJefeProyecto.php">Registrar Jefe de Proyecto</a></li>
            <li><a href="pVerJefeProyecto.php">Ver Jefes de Proyectos</a></li>
            <li><a href="pEliminarJefeProyecto.php">Eliminar Jefes de Proyectos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estado de Selección<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="pVerAvance.php">Avance selección</a></li>
            <li><a href="pVerAvanceRechazo.php">Avance contratados</a></li>
            <li><a href="pVerAvanceRechazado.php">% de rechazo</a></li>
            <li><a href="pVerAvanceContratados.php">Contratados vs P.Filtro</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Representante <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
	<div class="col-sm-8 col-sm-offset-2 myform-cont">
	<br>
    <form action="EliminaJefeProyecto.php" name="formEliminar" method="POST" onsubmit="return pregunta()">

	<?php
		include("conexionbd.php");
		$sql_consultar= "SELECT u.rut,j.nombreJefeP,j.apellidoJefeP, j.idjefeProyecto from jefeproyecto j inner join usuario u on j.fkusuario=u.idusuario where fkgerente='$id'";
		$resultados=$conex->query($sql_consultar);
	?>
		<h1 align="center">Ver Jefe de proyectos</h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Rut</th>
						<th>Nombre</th>
						<th>Cargo</th>
                        <th>Acción</th>
					</tr>
			</thead>
			<tbody>
				<?php
					foreach ($resultados as $fila){
				?>
					<tr>
						<td><?php echo $fila['rut'];?></td>
						<td><?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP'];?></td>
						<td>Jefe de Proyectos</td>
                        <td><button type="submit" name="idboton2" id="<?php echo $fila['idjefeProyecto']; ?>" value="<?php echo $fila['idjefeProyecto']; ?>" class="btn btn-success">Eliminar</button></td>
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
</html>
<script>
function pregunta(){
if(confirm("¿Desea continuar con la eliminación de este jefe de proyecto?"))
    {
		<!--alert('Datos enviados correctamente')-->
        return true;
    }else{
	alert('Operación cancelada, Vuelva a a seleccionar un Jefe de Proyecto')
    return false;
	}
}
	</script>