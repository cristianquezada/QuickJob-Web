<?php
session_start();
$codigo=$_SESSION['idpro'];
$idt=$_SESSION['fkt'];
if(isset($_SESSION['fkt'])){
	$idt=$_SESSION['fkt'];
	
}
if (isset($_POST['idTrabajador'])) {
    $idt = $_POST['idTrabajador'];
	$_SESSION['fkt']=$idt;

}


?><!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
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
<br>
<div class="col-md-8 col-md-offset-2">

  <br>

      <?php

include "conexionbd.php";
//$codigo        = $_POST['idboton'];
$sql_consultar = "SELECT t.idTrabajador, t.nombreCompleto, t.fono, u.rut,c.cargo,ciu.nombreCiudad FROM trabajador t INNER JOIN cargos c ON c.idCargo=t.fkCargo INNER JOIN ciudad ciu on ciu.idCiudad=t.fkCiudad INNER JOIN solicitud s ON t.idTrabajador = s.fktrabajador INNER JOIN usuario u ON t.fkusuario = u.idusuario WHERE t.idTrabajador = '" . $idt . "' AND s.estadoSolicitud = '5'";
$resultados    = $conex->query($sql_consultar);
?>
      <h1 align="center">Especialista</h1>
                <br>

                <div class="myform-bottom">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Cargo</th>
                            <th>Fono</th>
                            <th>Sueldo</th>

                        </tr>
                        </thead>
                        <?php
if (is_array($resultados) || is_object($resultados)) {
    foreach ($resultados as $fila) {
        ?>
                        <form method="post" action="#.php" name="formCancelar" onSubmit="return pregunta()">
              <tbody>
            <tr>
              <td align="left"><?php echo $fila['rut']; ?></td>
              <input type="hidden" name="idTrabajador" value="<?php echo $fila['idTrabajador']; ?>" />
                            
              <td align="left"><?php echo $fila['nombreCompleto']; ?></td>
              <td align="left"><?php echo $fila['nombreCiudad']; ?></td>
              <td align="left"><?php echo $fila['cargo']; ?></td>
              <td align="left"><?php echo $fila['fono']; ?></td>
              <td>50 mil lucas</td>
            </tr>
            </tbody>
            </form>
                                <?php 
}
}

?>
                    </table>
                </div>

    <?php
include "conexionbd.php";
// echo $dato;
$sql_consultar = "SELECT * FROM comentarios WHERE fkTrabajador=$idt";
$resultados2    = $conex->query($sql_consultar);

?>
    <br><br>
    <br><br>
    <h1 align="center">Comentarios</h1>
      <div class="myform-bottom">
      <table class="table">
        <thead>
        <tr>
            <th>Comentario</th>
            <th>Fecha comentario</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <?php

foreach ($resultados2 as $fila2) {
    ?>
          <form method="post" action="EliminarComentario.php" name="form-lista" onSubmit='return preg()'>
          <tbody>
          <tr>
            <td align="left"><?php echo $fila2['comentario']; ?></td>
            <td align="left"><?php echo $fila2['fechaComentario']; ?></td>
            <?php // echo $fila['IdProyecto']?>
            <td align="left"><button type="submit" name="idboton" id="<?php echo $fila2['idComentarios']; ?>" value="<?php echo $fila2['idComentarios']; ?>" class="btn btn-danger">Eliminar comentario</button></td>
          </tr>
          </tbody>
          </form>
          
        </div>
        </div>
        <?php
}

?>
<script>
function preg(){
    if(confirm("¿Está seguro de eliminar el comentario?"))
    {
		<!--alert('Datos enviados correctamente')-->
        return true;
    }else{
	alert('Operación cancelada, Vuelva a seleccionar un comentario')
    return false;
	}
}
</script>