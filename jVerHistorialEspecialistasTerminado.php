<?php
session_start();
$codigo=$_SESSION['idpro'];
?><!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
	
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

      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gesti車n de Especialistas<span class="caret"></span></a>
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
<br>

<div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="envioCodi2.php" method="POST" name="form1">
    
	<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.FechaInicioProyecto, p.FechaTerminoProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='4' ORDER BY p.nombreProyecto ASC;";
		$resultados2=$conex->query($sql_consultar2);
	?>
		<h1 align="center">Proyecto</h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Nombre de proyecto</th>
						<th>Descripcion proyecto</th>
						<th>Fecha de Inicio</th>
                        <th>Fecha de Termino</th>
						<th>Jefe de proyecto</th>
						<th>Cantidad de especialistas</th>
                        
					</tr>
			<thead>
			<tbody>
				<?php
					foreach ($resultados2 as $fila2){
				?>
					<tr>
						<td align="left"><?php echo $fila2['NombreProyecto'];?></td>
						<td align="left"><?php echo $fila2['DescripcionProyecto'];?></td>
						<td align="left"><?php echo $fila2['FechaInicioProyecto']; ?></td>
                        <td align="left"><?php echo $fila2['FechaTerminoProyecto']; ?></td>
						<td align="left"><?php echo $fila2['nombreJefeP']." ".$fila2['apellidoJefeP'];?></td>
						<td><?php echo $fila2['CantNecesaria'];?></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>	
            </form>
	</div>
	<br><br>
    <div class="col-md-8 col-md-offset-2 myform-cont">
			<?php
include "conexionbd.php";
//$codigo        = $_POST['idboton'];
$sql_consultar = "SELECT * FROM solicitud s INNER JOIN trabajador t ON t.idTrabajador=s.fktrabajador INNER JOIN cargos c ON c.idCargo=t.fkCargo INNER JOIN cargoProyecto cp ON cp.fkCargo=c.idCargo INNER JOIN proyecto p ON p.IdProyecto=cp.fkProyecto INNER JOIN ciudad ciu ON ciu.idCiudad=t.fkCiudad INNER JOIN usuario usu ON usu.idusuario=t.fkusuario where s.estadoSolicitud='5' and s.fkProyecto='$codigo' AND cp.fkProyecto='$codigo'";
$resultados    = $conex->query($sql_consultar);
?>
			<h1 align="center">Especialistas Contratados</h1>
                <br>

                <div class="myform-bottom">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Cargo</th>
                            <th>Fono</th>
                            <th>Sueldo</th>
                            <th>Comentarios</th>

                        </tr>
                        </thead>
                        <?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
                        <form method="post" action="verComentarios.php" name="formCancelar" onSubmit="return pregunta()">
					    <tbody>
						<tr>
							<td align="left"><?php echo $fila['rut']; ?></td>
							<input type="hidden" name="idTrabajador" value="<?php echo $fila['idTrabajador']; ?>" />
                            
							<td align="left"><?php echo $fila['nombreCompleto']; ?></td>
							<td align="left"><?php echo $fila['nombreCiudad']; ?></td>
							<td align="left"><?php echo $fila['cargo']; ?></td>
							<td align="left"><?php echo $fila['fono']; ?></td>
							<td>50 mil lucas</td>
							<?php
							echo "<td><a data-toggle='modal' data-target='#verComentarios' data-id='".$fila['idTrabajador']."' data-rut='" .$rut ."' id='".$fila[idTrabajador]."'; value='".$fila[idTrabajador]."' class='btn btn-success'>Insertar</td>"
	        	            ?>
	        	            <td align='left'><button type="submit" name="idboton" id="<?php echo $fila[0]; ?>" value="<?php echo $fila[0]; ?>" class="btn btn-info">Ver</button></td>
						</tr>
						</tbody>
						</form>
                                <?php 
}
}

?>
                    </table>
                </div>
    
    
    <div class="modal" id="verComentarios" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Comentarios</h4>
                    </div>
        
                    <div class="modal-body">
                       <form action="InsertarComentario.php" method="POST">

                            <input id="id" name="id" type="hidden"></input>
		                    <div class="form-group">
		         			<label for="nombre">Comentario</label>
                 			<input class="form-control" id="comentario" name="comentario" type="textarea" placeholder="Ingrese comentario..." ></input>
		                    </div>
		                    
							<input type="submit" class="btn btn-success" value="Guardar comentario">
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
		  $('#verComentarios').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('rut')
		  var modal = $(this)
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #rut').val(recipient1)
		});

	</script>

</body>
</html>