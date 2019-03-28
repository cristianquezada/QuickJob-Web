<?php
	
session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton2'])) {
    $codigo = $_POST['idboton2'];
	$_SESSION['idpro']=$codigo;

}

header("Location:pVerHistorialEspecialistasTerminado.php");
?>