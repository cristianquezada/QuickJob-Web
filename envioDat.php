<?php
session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton5'])) {
    $codigo = $_POST['idboton5'];
	$_SESSION['idpro']=$codigo;

}

header("Location:pDesarrolloProyecto.php");
?>