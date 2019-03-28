<?php

session_start();
if(isset($_SESSION['id']))
{
	$id = $_POST['idboton'];
	$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");	
	$sql = $mysqli->query("delete from comentarios where idComentarios='$id'");	
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=verComentarios.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>