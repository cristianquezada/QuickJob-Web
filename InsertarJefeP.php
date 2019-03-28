<?php
session_start();
  $conex= mysql_connect("hireme.cl","hiremecl_cris","hiremecl123")
    or die("No se pudo realizar la conexion");
  mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");

	$rutjefe=$_POST['form_user'];
	$nombrejefe=$_POST['nombreJefe'];
	$apellidojefe=$_POST['apellidoJefe'];
	$fonojefe=$_POST['fonoJefe'];
	$rut=$_SESSION['rutSirve'];
	
	$rut1 = $rutjefe;
	$rut1= str_replace('.', '', $rut1); 
    $rut1= str_replace('-', '', $rut1);
    
    $res8=mysql_query("SELECT * FROM usuario where rut='$rut1'");
		$dato8=mysql_fetch_assoc($res8);
		if(empty($dato8) == 0){
			?>
            <script language = javascript>
alert("Ya existe ese rut, ingrese otro rut")
self.location = "cCrearJefeProyecto.php" 
</script>
<?php
		}
	
	elseif(isset($rut1)){
	$idorg = $_SESSION['idorg'];
	
	include("conexionbd.php");

	$sql_insertar="INSERT INTO usuario SET rut='$rut1',password='123', fktipousuario='1', estadoUsuario='HABILITADO'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);
	
	$res2=mysql_query("SELECT * FROM usuario where rut='$rut1'");
		$dato2=mysql_fetch_assoc($res2);
		$idTipo=$dato2['idusuario'];
	
	
	$sql_insertars="INSERT INTO jefeproyecto SET nombreJefeP='$nombrejefe',apellidoJefeP='$apellidojefe',telefonoJefeP='$fonojefe',fkusuario='$idTipo',fkorganizacion='$idorg'";
    $conex->query($sql_insertars);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
}else{
		?>
<script language = javascript>
alert("Ingrese rut")
self.location = "cCrearJefeProyecto.php" 
</script>
<?php
}
?>
<script language = javascript>
	alert("Jefe de Proyecto ha sido registrado correctamente")
	self.location = "cVerJefeProyecto.php"  
</script>