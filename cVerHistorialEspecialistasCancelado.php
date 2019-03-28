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
<?php  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>
<br>

<div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="envioCodi3.php" method="POST" name="form1">
    
	<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.FechaInicioProyecto, p.FechaTerminoProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='2' ORDER BY p.nombreProyecto ASC;";
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
                        <th>Fecha de T谷rmino</th>
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

                        </tr>
                        </thead>
                        <?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
                                <form method="post" action="#" name="formCancelar" onSubmit="return pregunta()">
					<tbody>
						<tr>
							<td align="left"><?php echo $fila['rut']; ?></td>
							<input type="hidden" name="idTrabajador" value="<?php echo $fila['idTrabajador']; ?>" />
                            
							<td align="left"><?php echo $fila['nombreCompleto']; ?></td>
							<td align="left"><?php echo $fila['ciudad']; ?></td>
							<td align="left"><?php echo $fila['cargo']; ?></td>
							<td align="left"><?php echo $fila['fono']; ?></td>
							<td>50 mil lucas</td>
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