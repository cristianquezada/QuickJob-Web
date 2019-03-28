<?php
session_start();
//$idpro = $_SESSION['idpro'];

//Conexion BD

$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion exitosamente");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la bd");

//Crear fecha actual

//Bucle para recorrer lo enviado
foreach ($_POST['datos'] as $valor) {

$sql2 = "UPDATE solicitud SET 
estadoSolicitud='4'
where fktrabajador='$valor'";
mysql_query($sql2);
header("location:cVerPreseleccion.php");

}
?>
<script language = javascript>
	alert("Los datos han sido guardados y enviados exitosamente");
</script>