<?php
session_start();
$idorg=$_SESSION['idorg'];
?><!DOCTYPE html>
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
<?php  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>	
<br>
    <div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="envioCodDesarrolloC.php" method="POST" name="form2">

	<?php
		include("conexionbd.php");
		$sql_consultar= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.FechaInicioProyecto, p.FechaTerminoProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='1' and p.fkOrganizacion='$idorg' ORDER BY p.nombreProyecto ASC;";
		$resultados=$conex->query($sql_consultar);
	?>
		<h1 align="center">Ver Proyectos en Desarrollo</h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Nombre de proyecto</th>
						<th>Descripcion proyecto</th>
						<th>Fecha de Inicio</th>
                        <th>Fecha de Término</th>
						<th>Jefe de proyecto</th>
						<th>Cantidad de especialistas</th>
                        <td align="center"><h4><b>Acciones</b></h4></td>
					</tr>
			<thead>
			<tbody>
				<?php
					foreach ($resultados as $fila){
				?>
					<tr>
						<td align="left"><?php echo $fila['NombreProyecto'];?></td>
						<td align="left"><?php echo $fila['DescripcionProyecto'];?></td>
						<td align="left"><?php echo $fila['FechaInicioProyecto']; ?></td>
                        <td align="left"><?php echo $fila['FechaTerminoProyecto']; ?></td>
						<td align="left"><?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP'];?></td>
						<td><?php echo $fila['CantNecesaria'];?></td>
						<td><a data-toggle='modal' data-target='#editUsu1' data-id=' <?php echo $fila['IdProyecto']; ?> ' data-nombre='<?php echo $fila['NombreProyecto']; ?>' data-descripcion='<?php echo $fila['DescripcionProyecto']; ?>' data-fechinicio='<?php echo $fila['FechaInicioProyecto']; ?>' data-fechtermino='<?php echo $fila['FechaTerminoProyecto']; ?>' data-cantidad='<?php echo $fila['CantNecesaria']; ?>' data-nombjefe='<?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP'];?>' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a></td>
                        <td align="left"><button type="submit" name="idboton" id="<?php echo $fila['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">Ver detalle del proyecto</button></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>	
            </form>
            <div class="modal" id="editUsu1" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 align="center" class="black-text">Editar Proyecto</h4>
                    </div>
                    <div class="modal-body">
                       <form action="cAtualizarProyecto2.php" method="POST">

                                    <input  id="id" name="id" type="hidden" ></input>
                                    <div align="center" class="form-group">
                                        <label for="nombre">Nombre del Proyecto</label>
                                        <input class="form-control" id="nombre" name="nombre" type="text" required="required" ></input>
                                    </div>
                                    <div align="center" class="form-group">
                                        <label for="descripcion">Descripción del Proyecto</label>
                                        <textarea maxlength="200" class="form-control" id="descripcion" rows="8" name="descripcion" type="text" required="required" ></textarea>
                                    </div>
                                    <div align="center" class="form-group">
                                        <label for="fechinicio">Fecha de Inicio</label>
                                        <input type="text" id="fechinicio" name="fechinicio" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" required="required">
                                    </div><div align="center" class="form-group">
                                        <label for="fechtermino">Fecha de Término</label>
                                        <input type="text" id="fechtermino" name="fechtermino" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" required="required">
                                    </div>
                                    <div align="center" class="form-group">
                                    <select class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="idjefe" value="Seleccione jefe de proyecto">
					<option value="<option value="<?php echo $fila['idjefeProyecto']; ?>"><?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP'];?></option>" id="nombjefe" required="required">
					    
					    
					</option>
					
					<?php
					$sql_listar="SELECT * FROM jefeproyecto where fkorganizacion='$idorg' ORDER BY apellidoJefeP ASC";
					$resultados=$conex->query($sql_listar);
					foreach ($resultados as $nombre) {					
				?>
					<option value="<?php echo $nombre['idjefeProyecto']; ?>"><?php echo $nombre['nombreJefeP']." ".$nombre['apellidoJefeP']; ?></option>
				<?php } ?>
			</select>
                                   
			                    </div>
                                    <div align="center" class="form-group">
                                        <label for="cantidad">Cantidad Necesaria</label>
                                        <input class="form-control" type="number" min="1" max="1000" maxlength="5" id="cantidad" name="cantidad" type="text" required="required" ></input>
                                    </div>
                                    <div align="center"><input  type="submit" class="btn btn-success" value="Guardar"></div>
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
            
	</div>
	<div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="envioCodTerminadoC.php" method="POST" name="form1">
    
	<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.FechaInicioProyecto, p.FechaTerminoProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='4' and p.fkOrganizacion='$idorg' ORDER BY p.nombreProyecto ASC;";
		$resultados2=$conex->query($sql_consultar2);
	?>
		<h1 align="center">Ver Proyectos Terminados</h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Nombre de proyecto</th>
						<th>Descripcion proyecto</th>
						<th>Fecha de Inicio</th>
                        <th>Fecha de Término</th>
						<th>Jefe de proyecto</th>
						<th>Cantidad de especialistas</th>
                        <td align="center"><h4><b>Acción</b></h4></td>
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
                        <td align="left"><button type="submit" name="idboton2" id="<?php echo $fila2['IdProyecto']; ?>" value="<?php echo $fila2['IdProyecto']; ?>" class="btn btn-success">Ver detalle del proyecto</button></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>	
            </form>
            
	</div>
    <div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="cVerHistorialEspecialistasCancelado.php" method="POST" name="form3">

	<?php
		include("conexionbd.php");
		$sql_consultar1= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p INNER JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='2' and p.fkOrganizacion='$idorg' ORDER BY p.nombreProyecto ASC;";
		$resultados1=$conex->query($sql_consultar1);
	?>
		<h1 align="center">Ver Proyectos Cancelados</h1>
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
					foreach ($resultados1 as $fila1){
				?>
					<tr>
						<td align="left"><?php echo $fila1['NombreProyecto'];?></td>
						<td align="left"><?php echo $fila1['DescripcionProyecto'];?></td>
						<td><?php echo $fila1['nombreJefeP']." ".$fila1['apellidoJefeP'];?></td>
						<td><?php echo $fila1['CantNecesaria'];?></td>
                        <td align="left"><button type="submit" name="idboton" id="<?php echo $fila1['IdProyecto']; ?>" value="<?php echo $fila1['IdProyecto']; ?>" class="btn btn-success">Ver detalle del proyecto</button></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>	
            </form>
            
	</div>

        <script>
          $('#editUsu1').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var recipient0 = button.data('id')
          var recipient1 = button.data('nombre')
          var recipient2 = button.data('descripcion')
          var recipient3 = button.data('fechinicio')
          var recipient4 = button.data('fechtermino')
          var recipient5 = button.data('cantidad')

          var modal = $(this)
          modal.find('.modal-body #id').val(recipient0)
          modal.find('.modal-body #nombre').val(recipient1)
          modal.find('.modal-body #descripcion').val(recipient2)
          modal.find('.modal-body #fechinicio').val(recipient3)
          modal.find('.modal-body #fechtermino').val(recipient4)
          modal.find('.modal-body #cantidad').val(recipient5)

        });
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script src="js/bootstrap-datepicker.js"></script>
  <script>
  $('.date').datepicker({
    format: 'yyyy-mm-dd',
  })
  </script>

</body>
</html>