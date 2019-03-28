<?php
session_start();
if(empty($_SESSION)){
	header("Location:index.php");
}
?><!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
	
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Formulario Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
</head>
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
	
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gesti車n de Especialistas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#.php">Editar Especialistas</a></li>
          </ul>
        </li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerProyecto.php">Ver Proyectos</a></li>
            <li><a href="jTerminarProyecto.php">Terminar Proyectos</a></li>
            <li><a href="jVerHistorialProyectos.php">Historial de Proyectos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Especialistas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jCrearTrabajador.php">Crear nuevo Trabajador</a></li>
            <li><a href="jVerEspecialistas.php">Editar Trabajador</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usabilidad<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerPersonalApp.php">Personas que usan la app</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estado de Selección<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="jVerAvance.php">Avance selección</a></li>
            <li><a href="jVerAvanceRechazo.php">Avance contratados</a></li>
            <li><a href="jVerAvanceRechazado.php">% de rechazo</a></li>
            <li><a href="jVerAvanceContratados.php">Contratados vs P.Filtro</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jefe de Proyecto <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jVerMiCuenta.php">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br>
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
		<h1 align="center">Crear nuevo Trabajador</h1>
        <br><br>
			<div class="myform-bottom">
			<form action="crearTrabajador.php" method="POST">
				Rut Trabajador: <input  type="text" maxlength="10" autofocus="autofocus" name="form_user" placeholder="Rut Trabajador..." class="form-control" id="form_user"  required oninput="checkRut(this)" >
                <br><br>
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
				<button type="submit" class="mybtn" value="Crear Trabajador"> Crear Trabajador</button>
               
			</div>	
	</div>
</body>
</html>