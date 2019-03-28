<?php

session_start();
if (isset($_SESSION['idpro'])) {
    $idTrabajador = $_SESSION['idpro'];

}
$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");

$id        = $_POST['id'];
$nombre    = $_POST['nombre'];
$fono      = $_POST['fono'];
$cargo     = $_POST['cargo'];
$direccion = $_POST['direccion'];
$medico    = $_POST['medico'];
$induccion = $_POST['induccion'];
$talla     = $_POST['talla'];
$bloqueo   = $_POST['bloqueo'];
$salud     = $_POST['salud'];
$afp       = $_POST['afp'];

$sql = $mysqli->query("update trabajador set nombreCompleto='$nombre', fono='$fono', cargo='$cargo', direccion='$direccion', venExamenMed='$medico', venInd='$induccion', talla='$talla', bloqueo='$bloqueo', salud='$salud', afp='$afp' where idTrabajador=$id");
?>
	 <SCRIPT LANGUAGE="javascript">
         alert("Trabajador Actualizado");
     </SCRIPT>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=jVerEspecialistas.php">
