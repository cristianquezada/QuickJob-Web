<?php
//Iniciar Sesión

session_start();
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton'])) {
    $codigo = $_POST['idboton'];
	$_SESSION['idpro']=$codigo;

}
//Proceso de conexión con la base de datos
$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la base de datos");

//Validar si se está ingresando con sesión correctamente
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
<?  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>
<br>
<div class="col-md-8 col-md-offset-2">
  <br>

  <?php
include "conexionbd.php";

$idorg = $_SESSION['idorg'];


$sql_consultar = "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.FechaInicioProyecto, p.FechaTerminoProyecto, p.fkjefeproyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, j.fkorganizacion, o.idOrganizacion, o.NombreOrganizacion  FROM jefeproyecto j INNER JOIN proyecto p ON j.idjefeProyecto = p.fkjefeproyecto INNER JOIN organizacion o ON j.fkorganizacion = o.idOrganizacion WHERE o.idOrganizacion = '".$idorg."' ORDER BY p.nombreProyecto ASC";

$resultados    = $conex->query($sql_consultar);

?>
    <br><br>
    <h1 align="center">Proyectos de la organización</h1>
      <div class="myform-bottom">
      <table class="table">
        <thead>
        <tr>
            <th>Nombre de proyecto</th>
            <th>Descripcion proyecto</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Término</th>
            <th>Jefe de proyecto</th>
            <th>Cantidad de especialistas</th>
            <th >Acciones</td>
        </tr>
        </thead>
        <?php

foreach ($resultados as $fila) {
    ?>
          <form method="post" action="envioCodigos.php" name="form-lista">
          <tbody>
          <tr>
            <td align="left"><?php echo $fila['NombreProyecto']; ?></td>
            <td align="left"><?php echo $fila['DescripcionProyecto']; ?></td>
            <td align="center"><?php echo $fila['FechaInicioProyecto']; ?></td>
            <td align="center"><?php echo $fila['FechaTerminoProyecto']; ?></td>
            <td align="left"><?php echo $fila['nombreJefeP'] . " " . $fila['apellidoJefeP']; ?></td>
            <td align="center"><?php echo $fila['CantNecesaria']; ?></td>
            <?php // echo $fila['IdProyecto']?>
            <td align="left"><button type="submit" name="idboton" id="<?php echo $fila['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">Contratar</button></td>
            <td align="left"><button type="submit" name="idboton2" onclick = "this.form.action = 'envioCodigoss.php'" id="<?php echo $fila['IdProyecto']; ?>" value="<?php echo $fila['IdProyecto']; ?>" class="btn btn-success">P.Filtro</button></td>
          </tr>
          </tbody>
          </form>
        <?php
}

?>
      </table>
      </div>
  </div>