<?php
session_start();

date_default_timezone_set('Chile/Continental');
$hoy      = date_default_timezone_get();
$fecha    = getdate();
$conv     = array_merge((array) $fecha['year'], (array) $fecha['mon'], (array) $fecha['mday']);
$fechaHoy = implode("-", $conv);

$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion exitosamente");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la bd");

$trab=$_SESSION['trab'];
$user=$_SESSION['user'];
$nombre=$_FILES['archivo']['name'];
$tipo=$_FILES['archivo']['type'];
$tam=$_FILES['archivo']['size'];
$ruta=$_FILES['archivo']['tmp_name'];
$destino="HireMe/".$nombre;


if($nombre!=""){
	if((strpos($tipo, "pdf"))||(strpos($tipo, "jpeg"))||(strpos($tipo, "png"))){
	if(copy($ruta,$destino)){
		$sql2 = "INSERT INTO archivo SET nombre='$nombre',
tipoArchivo='$tipo',
tam='$tam',
fecha='$fechaHoy',
fkusuario='$user'";
mysql_query($sql2);
		echo "<script language='javascript'>alert('Registro exitoso');</script>"; 
	}else{
		echo "<script language='javascript'>alert('No se realizó la operación');</script>"; ;
	}
	}else{
	echo "<script language='javascript'>alert('Archivo no permitido. Intentelo con otro archivo');</script>";
	}
	
}
?>
<script language = javascript>
	window.location="psubirArchivos.php";
</script>