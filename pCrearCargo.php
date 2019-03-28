<?php
session_start();
$idpro=$_SESSION['idpro'];
?><!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>HireMe</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>		
	<header>
		
	</header>
	<?php  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="gerente"){
include("header/cabGerente.php");
}else {

	}


?>	
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
	<center>
		<h1>Registrar Cargo</h1></center>
        
			<div class="myform-bottom">
			<form action="crearCargo.php" method="POST" onsubmit="return pregunta()">
            
                <br>
				Cargo: <br><br>
				<input type="text" name="cargo" class="form-control" required="required">
				<br>
				<button type="submit" class="mybtn" value="Crear especialidad"> Registrar 
			</div>	
	</div>
</body>
</html>
<script>
function pregunta(){
if(confirm("¿Desea continuar con la creación de este nuevo cargo?"))
    {
		<!--alert('Datos enviados correctamente')-->
        return true;
    }else{
	alert('Operación cancelada, Vuelva a ingresar un cargo')
    return false;
	}
}
	</script>