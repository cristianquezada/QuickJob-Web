<?php

session_start();
if(isset($_SESSION['id']))
{
	$conex= mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
    or die("No se pudo realizar la conexion");
  	mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");

	$id = $_POST['idboton'];
	$consulta = "SELECT fkusuario FROM gerente WHERE idgerente='$id'";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$fila2=mysql_fetch_array($resultado);
	$fk = $fila2['fkusuario'];

	$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");	
	$sql = $mysqli->query("delete from gerente where idgerente='$id'");

	$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");	
	$sql = $mysqli->query("delete from usuario where idusuario='$fk'");	
	echo "eliminado";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=aVerCuentas.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>