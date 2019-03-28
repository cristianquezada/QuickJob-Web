<?php
session_start();
if(empty($_SESSION)){
header("location:index.php");
}

  $conex= mysql_connect("hireme.cl","hiremecl_cris","hiremecl123")
    or die("No se pudo realizar la conexion");
  mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");
    

$idorg= $_SESSION['idorg'];



	$nombreproyecto=$_POST['nombreproyecto'];
	$descproyecto=$_POST['descproyecto'];
	$jefeproyecto=$_POST['idjefe'];
	$cantidad=$_POST['cantproyecto'];
	$inicio=$_POST['inicio'];
	$final=$_POST['final'];
	
$fec = explode('/',$inicio);
$fechaInicio = "{$fec[2]}-{$fec[0]}-{$fec[1]}";

$fec2 = explode('/',$final);
$fechaTermino = "{$fec2[2]}-{$fec2[0]}-{$fec2[1]}";

if($inicio<$final){
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO proyecto SET NombreProyecto='$nombreproyecto',DescripcionProyecto='$descproyecto', FechaInicioProyecto='$fechaInicio',FechaTerminoProyecto='$fechaTermino', fkjefeproyecto='$jefeproyecto', CantNecesaria='$cantidad',fkEstadoProyecto='1',fkOrganizacion='$idorg'";
	
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
}else{
	?>
    <script language = javascript>
	alert("La fecha de inicio es mayor que la fecha de termino")
	self.location = "cCrearProyecto.php" 
</script>
<?php
}
?>
<script language = javascript>
	alert("Proyecto registrado correctamente")
	self.location = "cVerProyecto.php" 
</script>