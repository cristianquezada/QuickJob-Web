<?php

session_start();
if (isset($_SESSION['idpro'])) {
    $idTrabajador = $_SESSION['idpro'];

}
$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");

$id      = $_POST['id'];
$nombre  = $_POST['nombre'];
$desc    = $_POST['descripcion'];
$fechini = $_POST['fechinicio'];
$fechter = $_POST['fechtermino'];
$cant    = $_POST['cantidad'];

$sql = $mysqli->query("update proyecto set IdProyecto='$id', NombreProyecto='$nombre', DescripcionProyecto='$desc', FechaInicioProyecto='$fechini', FechaTerminoProyecto='$fechter', CantNecesaria='$cant' where IdProyecto=$id");
?>



	 <SCRIPT LANGUAGE="javascript">
         alert("Proyecto Actualizado");
     </SCRIPT>
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=pVerProyecto.php">
