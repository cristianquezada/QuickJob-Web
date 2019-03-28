<?php

session_start();

$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");

$id      = $_POST['id'];
$nombre  = $_POST['nombre'];
$apellido    = $_POST['apellido'];
$telefono    = $_POST['telefono'];


$sql = $mysqli->query("update admcontrato set nombreAdm='$nombre', apellidoAdm='$apellido', telefonoAdm='$telefono' where idAdm='$id'");
?>



	 <SCRIPT LANGUAGE="javascript">
         alert("Administrador de Contrato Actualizado");
     </SCRIPT>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=pVerAdmContrato.php">
