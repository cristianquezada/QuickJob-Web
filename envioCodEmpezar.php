<?php
	
session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton2'])) {
    $codigo = $_POST['idboton2'];
	$_SESSION['idpro']=$codigo;

}


$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion exitosamente");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la bd");

//Crear fecha actual

//Bucle para recorrer lo enviado

$sql2 = "UPDATE proyecto SET 
fkEstadoProyecto='1'
where IdProyecto = '".$codigo."'";
mysql_query($sql2);

?>
<script language = javascript>
	alert("Los datos han sido guardados y enviados exitosamente");
	window.location.replace("pDesarrolloProyecto.php");
</script>

