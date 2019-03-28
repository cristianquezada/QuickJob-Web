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
	<?php  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="gerente"){
include("header/cabGerente.php");
}else {

	}


?>	

		<div class="col-md-8 col-md-offset-2 myform-cont">
    <form action="envioCodEmpezar.php" method="POST" name="form1" onsubmit="return pregunta()">

	<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto where p.fkEstadoProyecto='5' ORDER BY p.NombreProyecto ASC;";
		$resultados2=$conex->query($sql_consultar2);
	?>
		<h1 align="center">Empezar proyecto</h1>
			<div class="myform-bottom">
            <p>Para empezar el proyecto recuerde tener todos los cargos agregados</p>
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
                        <td align="left"><button type="submit" name="idboton2" id="<?php echo $fila2['IdProyecto']; ?>" value="<?php echo $fila2['IdProyecto']; ?>" class="btn btn-success">Empezar</button></td>
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
if(confirm("¿Está seguro de empezar el proyecto seleccionado?"))
    {
		<!--alert('Datos enviados correctamente')-->
        return true;
    }else{
	alert('Operación cancelada, Vuelva a seleccionar un proyecto')
    return false;
	}
}
	</script>