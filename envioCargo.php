<?php
session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton4'])) {
    $codigo = $_POST['idboton4'];
	$_SESSION['idpro']=$codigo;

}

header("Location:pCrearCargo.php");
?>