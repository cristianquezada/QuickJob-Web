<?php
session_start();
//Proceso de conexión con la base de datos
$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la base de datos");



//Validar si se está ingresando con sesión correctamente
if (!$_SESSION) {
    header("location:login.php");
}

$id=$_SESSION['id'];
$tot=0;
$res4=mysql_query("SELECT * FROM admcontrato where idAdm='$id'");
$dato4=mysql_fetch_assoc($res4);
$idOrg=$dato4['fkorganizacion'];
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
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>
<br>
		<div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="#" method="POST" name="form1" onsubmit="return pregunta()">
<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT o.NombreOrganizacion,p.IdProyecto, p.NombreProyecto,p.FechaInicioProyecto,p.FechaTerminoProyecto FROM proyecto p inner join organizacion o on p.fkorganizacion=o.idOrganizacion where fkOrganizacion='$idOrg' and p.fkEstadoProyecto='4'";
		$resultados2=$conex->query($sql_consultar2);
		 foreach ($resultados2 as $fila2){
			 $id=$fila2['IdProyecto'];
			 $inicio=$fila2['FechaInicioProyecto'];
			 $termino=$fila2['FechaTerminoProyecto'];
			 $datetime1 = date_create($inicio);
            $datetime2 = date_create($termino);
            $interval = date_diff($datetime1,$datetime2)->format('%a');
				?>
	
		<h1 align="center">Remuneraciones Proyecto <?php echo $fila2['NombreProyecto']; ?></h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
            
            
                
				<tr>
						<th width="19%">Nombre de proyecto</th>
						<th width="20%">Cargo</th>
						<th width="21%">Cantidad</th>
						<th width="14%">R. por día</th>
						<th>Dias Proyecto</th>
                        <th width="26%">Total</th>
					</tr>
			<thead>
			<tbody>
            <?php 
		$sql_consultar3= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.idjefeProyecto, car.cargo, ca.cantidad,ca.remuneracion FROM jefeproyecto j INNER JOIN proyecto p ON p.fkjefeproyecto=j.idjefeProyecto INNER JOIN cargoProyecto ca ON ca.fkProyecto = p.IdProyecto INNER JOIN cargos car ON car.idCargo=ca.fkCargo  WHERE p.IdProyecto='$id' ORDER BY p.nombreProyecto ASC;";;
		$resultados3=$conex->query($sql_consultar3);
		 foreach ($resultados3 as $fila3){
						$total=$fila3['cantidad']*$fila3['remuneracion']*$interval;
						$tot=$tot+$total;
				?>
            
					<tr>
						<td align="left"><?php echo $fila3['NombreProyecto'];?></td>
						<td align="left"><?php echo $fila3['cargo'];?></td>
						<td><?php echo $fila3['cantidad'];?></td>
						<td><?php echo $fila3['remuneracion'];?></td>
						<td><?php echo $interval; ?></td>
                        <td align="left"><?php echo $total;?></td>
                        
					</tr>
                     
                   
				<?php
					 }
					 echo '<font size=4>Total: ';
					 setlocale(LC_MONETARY,"es_CL");
echo money_format("%.2n", $tot);
echo '</font>';
					 $tot=0;
					 
				?>
                
				</tbody>
                
			</table>
            
			</div><?php }
			?>
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
	