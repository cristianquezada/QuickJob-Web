<?php
session_start();
  			$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
			or die("No se pudo realizar la conexion");
			mysql_select_db("hiremecl_hireme", $conex)
			or die("ERROR con la base de datos");

			$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");	
			$rut = $_POST['rut'];
			$nom = $_POST['nombre'];
			$ape = $_POST['apellido'];
			$org = $_POST['idorg'];
			$pass = $_POST['contraseña'];
			
            $rut= str_replace('.', '', $rut); 
            $rut= str_replace('-', '', $rut);
			
			include("conexionbd.php");						
			$sql1 = ("insert into usuario SET rut = '$rut', password = '$pass', fktipousuario = '3', estadoUsuario = 'LISTO'");	

			$conex->query($sql1);
    		if($conex->errno) die($conex->error);
	
			$sql2=mysql_query("SELECT * FROM usuario where rut = '$rut'");
			$clave=mysql_fetch_assoc($sql2);
			$idusuario=$clave['idusuario'];
	
			$sql3=("INSERT INTO gerente SET nombreGerente = '$nom', apellidoGerente = '$ape', fkusuario='$idusuario', fkorganizacion='$org'");
    		$conex->query($sql3);
    		if($conex->errno) die($conex->error);

    		mysqli_close($conex);
	?>

	<SCRIPT LANGUAGE="javascript"> 
    alert("Representante Registrado"); 
    </SCRIPT> 
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=aVerCuentas.php">
