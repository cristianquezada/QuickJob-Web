<?php
	
session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton'])) {
    $codigo = $_POST['idboton'];
	$_SESSION['idpro']=$codigo;

}

header("Location:cVerHistorialEspecialistas.php");
?>