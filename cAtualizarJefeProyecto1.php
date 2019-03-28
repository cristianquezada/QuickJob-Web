<?php

session_start();

$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");

$id      = $_POST['id'];
$nombre  = $_POST['nombre'];
$apellido    = $_POST['apellido'];
$telefono    = $_POST['telefono'];


$sql = $mysqli->query("update jefeproyecto set nombreJefeP='$nombre', apellidoJefeP='$apellido', telefonoJefeP='$telefono' where idjefeProyecto='$id'");
?>



	 <SCRIPT LANGUAGE="javascript">
         alert("Jefe de Proyecto Actualizado");
     </SCRIPT>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=pVerJefeProyecto.php">
