<?php
session_start();
$idpro = $_SESSION['idpro'];


//Conexion BD

$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion exitosamente");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la bd");


$res=mysql_query("SELECT * FROM proyecto where IdProyecto='$idpro'");
$dat=mysql_fetch_assoc($res);
$inicio=$dat['FechaInicioProyecto'];
$termino=$dat['FechaTerminoProyecto'];

//Crear fecha actual

//Bucle para recorrer lo enviado
foreach ($_POST['datos'] as $valor) {

$sql2 = "UPDATE solicitud SET 
estadoSolicitud='5'
where fktrabajador='$valor'
and fkproyecto = '".$idpro."'";
mysql_query($sql2);

$sql3 = "UPDATE trabajador SET 
DisfechaInicio='$inicio', DisfechaTermino='$termino'
where IdTrabajador='$valor'";
mysql_query($sql3);

header("location:cVerSeleccion.php");


$host = "hireme.cl";
$db_user = "hiremecl_cris";
$db_password = "hiremecl123";
$db_name = "hiremecl_hireme";

$con = mysqli_connect($host, $db_user, $db_password, $db_name);


$message = "Su disponibilidad fue modificada, verifique su disponibilidad en la app";
$title = "Contratado!";

$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';

$server_key = "AAAAP0rR7L8:APA91bH2yfg86iRmm86jwPWMVMIZIpUKHevAOmcRII21t236Fm_PNKP4a7Zy-3Sj8NI6UwT0J4QxLhfvtkwI4Qj6BdkfXAfedRle0Z9dOemgx4K3qUV6QFmddb5Sgj1uA_p2FrtgI7iy";

$sql = "select fcm_token from fcm_info where fktrabajador='$valor'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_row($result);
$key = $row[0];

$headers = array(
            'Content-Type:application/json',
			'Authorization:key=' .$server_key
			);
			
$fields = array('to'=>$key,
				'notification'=>array('title'=>$title,'body'=>$message, 'sound' => 'default', 'vibrate'=> '1', 'click_action' => 'com.example.alumno.probando_TARGET_NOTIFICATION2'));
				
$payload = json_encode($fields);

$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
curl_setopt($curl_session, CURLOPT_POST, true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);

$result = curl_exec($curl_session);

curl_close($curl_session);
mysqli_close($con);


}
?>
<script language = javascript>
	alert("Los datos han sido guardados y enviados exitosamente");
</script>