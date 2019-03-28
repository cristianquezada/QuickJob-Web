<?php
$cargo=$_POST['cargo'];

$conex= mysql_connect("hireme.cl","hiremecl_cris","hiremecl123")
    or die("No se pudo realizar la conexion");
  mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");
	
	$rut=$_POST['ruttrabajador'];
	
	$res2=mysql_query("SELECT * FROM cargos where cargo='$cargo'");
		$dato2=mysql_fetch_assoc($res2);
		if(empty($dato2) == 0){
			?>
            <script language = javascript>
alert("Ya existe ese cargo")
self.location = "pCrearCargo.php" 
</script>
<?php
		}
		elseif(isset($cargo)){
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO cargos SET cargo='$cargo'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
		}
?>
<script language = javascript>
	alert("Registrado correctamente")
	self.location = "pCrearCargo.php" 
</script>