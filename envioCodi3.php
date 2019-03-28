<?php
	
session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton3'])) {
    $codigo = $_POST['idboton3'];
	$_SESSION['idpro']=$codigo;

}

header("Location:jVerHistorialEspecialistasCancelado.php");
?>