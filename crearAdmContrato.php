<?php
session_start();
  $conex= mysql_connect("hireme.cl","hiremecl_cris","hiremecl123")
    or die("No se pudo realizar la conexion");
  mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");

	$rutAdm=$_POST['form_user'];
	$nombreAdm=$_POST['nombreAdm'];
	$apellidoAdm=$_POST['apellidoAdm'];
	$fonoAdm=$_POST['fonoAdm'];
	$rut=$_SESSION['rutSirve'];
	
	$rut2 = $rutAdm;
	$rut2= str_replace('.', '', $rut2); 
    $rut2= str_replace('-', '', $rut2);
    
    $res8=mysql_query("SELECT * FROM usuario where rut='$rut2'");
		$dato8=mysql_fetch_assoc($res8);
		if(empty($dato8) == 0){
			?>
            <script language = javascript>
alert("Ya existe ese rut, ingrese otro rut")
self.location = "pCrearAdmContrato.php" 
</script>
<?php
		}
	
	elseif(isset($rut2)){
	    
	function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=6;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}
$pw=generaPass();
	
	$idorg = $_SESSION['idorg'];
	include("conexionbd.php");

	$sql_insertar="INSERT INTO usuario SET rut='$rut2',password='$pw', fktipousuario='4', estadoUsuario='LISTO'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);
	
	$res2=mysql_query("SELECT * FROM usuario where rut='$rut2'");
		$dato2=mysql_fetch_assoc($res2);
		$idTipo=$dato2['idusuario'];
	
	
	$sql_insertars="INSERT INTO admcontrato SET nombreAdm='$nombreAdm',apellidoAdm='$apellidoAdm',telefonoAdm='$fonoAdm',fkusuario='$idTipo',fkorganizacion='$idorg'";
    $conex->query($sql_insertars);
    if($conex->errno) die($conex->error);

    mysqli_close($conex);
}else{
		?>
<script language = javascript>
alert("Ingrese rut")
self.location = "pCrearAdmContrato.php" 
</script>
<?php
}
?>
<script language = javascript>
	alert("Administrador de Contrato ha sido registrado correctamente")
	self.location = "pCrearAdmContrato.php"  
</script>