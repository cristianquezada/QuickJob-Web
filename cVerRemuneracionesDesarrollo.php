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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="pAdmContrato.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cCrearProyecto.php">Crear Proyecto</a></li>
            <li><a href="cVerProyecto.php">Ver Proyectos</a></li>  
            <li><a href="cTerminarProyecto.php">Terminar Proyectos</a></li>
          </ul>
          </li>
      	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de especialistas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cVerPreseleccion.php">Confirmación</a></li>
            <li><a href="admVerProyectos.php">Contratación</a></li>
          </ul>
          </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Jefes de Proyecto<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="cCrearJefeProyecto.php">Registrar Jefe de Proyecto</a></li>
            <li><a href="cVerJefeProyecto.php">Ver Jefes de Proyectos</a></li>
            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estado de Selección<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="cVerAvance.php">Avance selección</a></li>
            <li><a href="cVerAvanceRechazo.php">Avance contratados</a></li>
            <li><a href="cVerAvanceRechazado.php">% de rechazo</a></li>
            <li><a href="cVerAvanceContratados.php">Contratados vs P.Filtro</a></li>
          </ul>
        </li>
         <li><a href="cVerRemuneraciones.php">Remuneraciones</a></li>
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
		<div class="col-md-8 col-md-offset-2 myform-cont">
	<br>
    <form action="#" method="POST" name="form1" onsubmit="return pregunta()">
<?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT o.NombreOrganizacion,p.IdProyecto, p.NombreProyecto,p.FechaInicioProyecto,p.FechaTerminoProyecto FROM proyecto p inner join organizacion o on p.fkorganizacion=o.idOrganizacion where fkOrganizacion='$idOrg' and p.fkEstadoProyecto='1'";
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
						<th>Dias del proyecto</th>
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