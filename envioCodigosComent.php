<?php
	
	session_start();
if(isset($_SESSION['fkt'])){
	$codigo=$_SESSION['fkt'];
	
}
if (isset($_POST['idboton'])) {
    $codigo = $_POST['idboton'];
	$_SESSION['fkt']=$codigo;

}

header("Location:EliminarComentario.php");
?>