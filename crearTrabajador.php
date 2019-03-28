<?php
session_start();
  $conex= mysql_connect("hireme.cl","hiremecl_cris","hiremecl123")
    or die("No se pudo realizar la conexion");
  mysql_select_db("hiremecl_hireme",$conex)
    or die("ERROR con la base de datos");
	
	$rut=$_POST['form_user'];
	$rut= str_replace('-', '', $rut);
	
	
	$res2=mysql_query("SELECT * FROM usuario where rut='$rut'");
		$dato2=mysql_fetch_assoc($res2);
		if(empty($dato2) == 0){
			?>
            <script language = javascript>
alert("Ya existe ese rut")
self.location = "jCrearTrabajador.php" 
</script>
<?php
		}
	
	elseif(isset($rut)){

	
	
	
	
	include("conexionbd.php");
	

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
$pass = substr("$rut", 0, 4);


	$sql_insertar="INSERT INTO usuario SET rut='$rut',password='$pass', fktipousuario='2', estadoUsuario='HABILITADO'";
    $conex->query($sql_insertar);
    if($conex->errno) die($conex->error);
	
$res2=mysql_query("SELECT * FROM usuario where rut='$rut'");
		$dato2=mysql_fetch_assoc($res2);
		$idTipo=$dato2['idusuario'];
	
	//$sql_insertars="INSERT INTO trabajador SET fkusuario='$idTipo'";
    //$conex->query($sql_insertars);
    //if($conex->errno) die($conex->error);

    mysqli_close($conex);
}else{
?>
<script language = javascript>
alert("Ingrese rut")
self.location = "jCrearTrabajador.php" 
</script>
<?php
}
?>
<script language = javascript>
	alert("Trabajador ha sido registrado correctamente")
	self.location = "jCrearTrabajador.php" 
</script>
