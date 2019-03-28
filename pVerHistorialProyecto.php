<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
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
	<?php  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="gerente"){
include("header/cabGerente.php");
}else {

	}


?>
	<div class="col-md-8 col-md-offset-2 myform-cont">
    <form action="envioCodi.php" method="POST" name="form1">

	<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='3' ORDER BY p.nombreProyecto ASC;";
		$resultados2=$conex->query($sql_consultar2);
	?>
		<h1>Ver Proyectos Terminados</h1>
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
						<td><?php echo $fila2['NombreProyecto'];?></td>
						<td><?php echo $fila2['DescripcionProyecto'];?></td>
						<td><?php echo $fila2['nombreJefeP']." ".$fila['apellidoJefeP'];?></td>
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
    <form action="envioCod.php" method="POST" name="form2">

	<?php
		include("conexionbd.php");
		$sql_consultar= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='1' ORDER BY p.nombreProyecto ASC;";
		$resultados=$conex->query($sql_consultar);
	?>
		<h1>Ver Proyectos en Desarrollo</h1>
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
					foreach ($resultados as $fila){
				?>
					<tr>
						<td><?php echo $fila['NombreProyecto'];?></td>
						<td><?php echo $fila['DescripcionProyecto'];?></td>
						<td><?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP'];?></td>
						<td><?php echo $fila['CantNecesaria'];?></td>
                        <td align="left"><button type="submit" name="idboton" id="<?php echo $fila['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">Ver detalle del proyecto</button></td>
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
    <form action="#" method="POST" name="form3">

	<?php
		include("conexionbd.php");
		$sql_consultar1= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p INNER JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='2' ORDER BY p.nombreProyecto ASC;";
		$resultados1=$conex->query($sql_consultar1);
	?>
		<h1>Ver Proyectos Cancelados</h1>
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
						<td><?php echo $fila1['NombreProyecto'];?></td>
						<td><?php echo $fila1['DescripcionProyecto'];?></td>
						<td><?php echo $fila1['nombreJefeP']." ".$fila['apellidoJefeP'];?></td>
						<td><?php echo $fila1['CantNecesaria'];?></td>
                        <td align="left"><button type="submit" name="idboton" id="<?php echo $fila1['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">Ver detalle del proyecto</button></td>
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