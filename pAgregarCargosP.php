<?php
session_start();

$conex= mysql_connect("hireme.cl","hiremecl_cris","hiremecl123")
    or die("No se pudo realizar la conexion");
  mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");
	
$idpro=$_SESSION['idpro'];
?><!DOCTYPE html>
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
	<?php  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="gerente"){
include("header/cabGerente.php");
}else {

	}


?>	
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
    <?php
		include("conexionbd.php");
		$sql_consultar2= "SELECT * FROM proyecto where IdProyecto='$idpro'";
		$resultados2=$conex->query($sql_consultar2);
		foreach ($resultados2 as $fila2){
	?>
		<h1>Agregar Cargos a Proyecto "<?php echo $fila2['NombreProyecto']; }?>" </h1>

			<div class="myform-bottom">
			<form action="crearCargoProyecto.php" method="POST" onSubmit="return pregunta()">
          
			<?php
					$sql_listara="SELECT c.cargo FROM cargos c inner join cargoProyecto s on c.idCargo=s.fkCargo  where s.fkProyecto ='$idpro'";
					$resultadosa=$conex->query($sql_listara);
					foreach ($resultadosa as $datosa) {
						if(isset($datosa)){
						echo "Cargo: ".$datosa['cargo'];
						echo "<br>";
					}}?>
                <br>
				Cargo:
                <br>
                <select class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="cargo" value="Seleccione cargo">
					<option value="">Seleccione cargo</option>
					<?php
					$sql_listar="SELECT * FROM cargos ORDER BY cargo ASC";
					$resultados=$conex->query($sql_listar);
					foreach ($resultados as $datos) {					
				?>
					<option value="<?php echo $datos['cargo']; ?>"><?php echo $datos['cargo']; ?></option>
				<?php } ?>
    
			</select>
				<br><br>Sueldo:<br>
                <input type="text" name="sueldo" class="form-control" maxlength="7" required>
                <br>
                <br>Cantidad:<br>
                <input type="text" name="cantidad" class="form-control" required>
                <br>
				<button type="submit" class="mybtn" value="Agregar"> Registrar </button>
                </form>
			</div>	
	</div>
</body>
</html>
<script>
function pregunta(){
if(confirm("¿Está seguro de agregar el cargo seleccionado ?"))
    {
		<!--alert('Datos enviados correctamente')-->
        return true;
    }else{
	alert('Operación cancelada, Vuelva a intentarlo')
    return false;
	}
}
</script>