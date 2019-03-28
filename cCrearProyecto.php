<?php
session_start();
$idorg=$_SESSION['idorg'];
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();
  } );
  </script>
</head>
<?php
	include("conexionbd.php");
?>
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
		<h1 align="center">Crear Proyecto</h1>
			<div class="myform-bottom">
			<form action="crearProyectoAdm.php" method="POST">
				Nombre: <input type="text" name="nombreproyecto" autofocus="autofocus" class="form-control" required>
				Descripcion: <br> <textarea name="descproyecto" class="form-control" required></textarea> 
				Jefe de proyecto: <br>
				<select class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="idjefe" value="Seleccione jefe de proyecto">
					<option value="" required="required">Seleccione jefe de proyecto</option>
					<?php
					$sql_listar="SELECT * FROM jefeproyecto where fkorganizacion='$idorg' ORDER BY apellidoJefeP ASC";
					$resultados=$conex->query($sql_listar);
					foreach ($resultados as $nombre) {					
				?>
					<option value="<?php echo $nombre['idjefeProyecto']; ?>"><?php echo $nombre['nombreJefeP']." ".$nombre['apellidoJefeP']; ?></option>
				<?php } ?>
			</select><br />
				Cantidad especialistas: <input type="text" name="cantproyecto" class="form-control" required maxlength="4" type="justNumbers">
				<br>
                 <p>Fecha de Inicio:<br> <input type="text" style="background-color:#333" id="datepicker" name="inicio"></p>
                <p>Fecha de Termino:<br>   <input type="text" style="background-color:#333"id="datepicker2" name="final"></p>
                
				<button type="submit" class="mybtn" value="Crear proyecto"> Crear proyecto
			</div>	
	</div>
</body>
</html>