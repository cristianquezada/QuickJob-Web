<?php
session_start();
if(!empty($_SESSION['rutPersonaElegida'])){
	$codigo=$_SESSION['rutPersonaElegida'];
	
}
if (!empty($_POST['rutPersona'])) {
    $codigo = $_POST['rutPersona'];
	$_SESSION['rutPersonaElegida']=$codigo;
}

header("Location:generarCodigo.php");
?>