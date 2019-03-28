<?php
session_start();
$idpro=$_SESSION['idpro'];
$cargo=$_POST['cargo'];
$sueldo=$_POST['sueldo'];
$cantidad=$_POST['cantidad'];

$conex= mysql_connect("hireme.cl","hiremecl_cris","hiremecl123")
    or die("No se pudo realizar la conexion");
  mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");
	$res3=mysql_query("SELECT * FROM cargos where cargo='$cargo'");
		$dato3=mysql_fetch_assoc($res3);
		$idCargo=$dato3['idCargo'];
	
	$res2=mysql_query("SELECT * FROM cargoProyecto where fkCargo='$idCargo' and fkProyecto='$idpro'");
		$dato2=mysql_fetch_assoc($res2);
		if(empty($dato2) == 0){
			?>
            <script language = javascript>
alert("El cargo seleccionado ya fue agregado")
self.location = "pAgregarCargosP.php" 
</script>
<?php
		}
		elseif(isset($cargo)&&isset($sueldo)){
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO cargoProyecto SET remuneracion='$sueldo', fkProyecto='$idpro', fkCargo='$idCargo',cantidad='$cantidad'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
		}
?>
<script language = javascript>
	alert("Registrado correctamente")
	self.location = "pAgregarCargosP.php" 
</script>