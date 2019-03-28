<?php

session_start();
if(isset($_POST['idboton2'])){
$id=$_POST['idboton2'];
}else{
	header("Location:index.php");
}

    $conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
    or die("No se pudo realizar la conexion exitosamente");
    mysql_select_db("hiremecl_hireme", $conex)
    or die("ERROR con la bd");
	

//$res=mysql_query("SELECT * FROM proyecto WHERE fkjefeproyecto='$id'");
$dat=mysql_fetch_assoc($res);
$res1=mysql_query("SELECT * FROM admcontrato WHERE idAdm='$id'");
$dat1=mysql_fetch_assoc($res1);
$nombre=$dat1['nombreAdm'];
$fk = $dat1['fkusuario'];
	
if(empty($dat)){
	
	

$sql2 = "DELETE FROM admcontrato where idAdm='$id'";
mysql_query($sql2);

$sql3 = "DELETE FROM usuario where idusuario ='$fk'";
mysql_query($sql3);

echo "<script language='javascript'>

alert('Administrador de Contrato ".$nombre." ha sido eliminado');</script>";

}else{
echo "<script language='javascript'>alert('El Administrador de Contrato ".$nombre." tiene proyectos en marcha, edite el proyecto para realizar esta operación(Cambie el Administrador de Contrato del proyecto)');</script>"; 
}

?>
<script language = javascript>
	window.location="pVerAdmContrato.php";
</script> 