<?php
session_start();
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
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>
    <br><br>
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
		<h1 align="center">Registrar Jefe de proyecto</h1>
			<div class="myform-bottom">
			<form action="InsertarJefeP.php" method="POST">
				Rut: <input type="text" maxlength="10" name="form_user" class="form-control" id="form_user"  required oninput="checkRut(this)"><br>
				Nombre: <input type="text" name="nombreJefe" class="form-control" required="required"><br>
				Apellido: <input type="text" name="apellidoJefe" class="form-control" required="required"><br>		
				Telefono: <input type="text" name="fonoJefe" class="form-control" required="required"><br>
				<button type="submit" class="mybtn" value="Crear proyecto"> Registrar
				<script src="js\validarRUT.js"></script>
							 <script>
								function justNumbers(e)
        						{
							       var keynum = window.event ? window.event.keyCode : e.which;
							       if ((keynum == 8) || (keynum == 46))
							       return true;

							       return /\d/.test(String.fromCharCode(keynum));
							    }
							</script>
			</div>	
	</div>
</body>
</html>