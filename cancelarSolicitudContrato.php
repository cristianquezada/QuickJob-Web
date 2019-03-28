<?php 
include("conexionbd.php");

session_start();
$id = $_POST['idboton8'];
$idpro = $_SESSION['idpro'];
$tipousuario=$_SESSION['tipousuario'];


date_default_timezone_set('Chile/Continental');
$hoy      = date_default_timezone_get();
$fecha    = getdate();
$conv     = array_merge((array) $fecha['year'], (array) $fecha['mon'], (array) $fecha['mday']);
$fechaHoy = implode("-", $conv);

$sql_eliminar="UPDATE solicitud SET estadoSolicitud='6' WHERE fktrabajador='$id' AND fkproyecto='$idpro'";
    $conex->query($sql_eliminar);
    if($conex->errno) die($conex->error);
    
$sql_eliminar2="UPDATE trabajador SET DisfechaInicio='$fechaHoy', DisfechaTermino='$fechaHoy' WHERE idTrabajador='$id'";
    $conex->query($sql_eliminar2);
    if($conex->errno) die($conex->error);
    



$message = "Su disponibilidad se vió afectada, verifique los cambios realizados en  'Mi Disponibilidad'";
$title = "Contrato cancelado";

$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';

$server_key = "AAAAP0rR7L8:APA91bH2yfg86iRmm86jwPWMVMIZIpUKHevAOmcRII21t236Fm_PNKP4a7Zy-3Sj8NI6UwT0J4QxLhfvtkwI4Qj6BdkfXAfedRle0Z9dOemgx4K3qUV6QFmddb5Sgj1uA_p2FrtgI7iy";

$sql = "select fcm_token from fcm_info where fktrabajador='$id'";
$result = mysqli_query($conex,$sql);
$row = mysqli_fetch_row($result);
$key = $row[0];

$headers = array(
            'Content-Type:application/json',
			'Authorization:key=' .$server_key
			);
			
$fields = array('to'=>$key,
				'notification'=>array('title'=>$title,'body'=>$message, 'sound' => 'default', 'vibrate'=> '1', 'click_action' => 'com.example.alumno.probando_TARGET_NOTIFICATION3'));
				
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

mysqli_close($conex);

    if($tipousuario=="jefe"){
    header ("Location: jBuscarEspecialistasPrueba.php");
    }elseif($tipousuario=="gerente"){
        header ("Location: pVerHistorialEspecialistas.php");
    }elseif($tipousuario=="admcontrato"){
        header ("Location: cVerHistorialEspecialistas.php");
    
    }
?>
<script language = javascript>
	alert("Los datos han sido guardados y enviados exitosamente");
</script>