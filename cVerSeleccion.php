<?php
//Iniciar Sesión

session_start();
$codigo;
if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton'])) {
    $codigo = $_POST['idboton'];
	$_SESSION['idpro']=$codigo;

}
//Proceso de conexión con la base de datos
$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la base de datos");

//Validar si se está ingresando con sesión correctamente
?>
<!DOCTYPE html>
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
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>
<br>
    <br>
    <br>
    <h1 align="center">Registro de Personal Contratado</h1>
    <div class="col-md-8 col-md-offset-2 myform-cont">
   <form action="envioSeleccion.php" method="POST" name="formPreseleccion" onsubmit="return pregunta()"> 
   <div class="myform-bottom">
              <table id="example" class="dataTables_info" cellspacing="0" width="100%">
                
                 <!--  <table id="example" class="display" width="900" border="2" cellpadding="4" cellspacing="4" >-->
                  <thead>                  
                  <tr >
                   
                    <th width="5" align="center">Seleccionar</th>
                    <th width="30" align="center">Rut</th>
                    <th width="30" align="center">Nombre</th>
                    <th width="30" align="center">Número</th>
                    <th width="73" align="center">Inducción</th>
                  <th width="73" align="center">Examen Médico</th>
                  <th width="73" align="center">Bloqueo</th>
                    <th width="73" align="center">Cargo</th>
                  </tr>
                  </thead>
                  <?php
	   
	    $sql_consulta="SELECT t.idTrabajador, t.nombreCompleto, t.direccion, t.fono,t.venExamenMed, t.venInd,t.bloqueo, s.fkproyecto, u.rut,c.cargo FROM trabajador t INNER JOIN cargos c ON c.idCargo=t.fkCargo INNER JOIN ciudad ciu ON ciu.idCiudad=t.fkCiudad INNER JOIN solicitud s ON t.idTrabajador = s.fktrabajador INNER JOIN usuario u ON t.fkusuario = u.idusuario WHERE  s.estadoSolicitud = '4' AND s.fkproyecto = '".$codigo."'";
		$result_consulta=mysql_query($sql_consulta);
	   ?>
                  <?php
  
  while($Datos=mysql_fetch_array($result_consulta))
		{
					
  ?>
                  <tr  class="alt">
                   
                    <td><label><input type="checkbox" align="absmiddle" name="datos[]" value="<?php echo $Datos['idTrabajador'];?></label></td>"></td>
                    <td align="center"><?php echo $Datos['rut'];?></td>
                    <td align="center"> <?php echo $Datos['nombreCompleto'];?></td>
                    <td align="center"><?php echo $Datos['fono'];?></td>
                    <td align="center"><?php echo $Datos['venInd'];?></td>
                   
                          <td align="center"><?php echo $Datos['venExamenMed'];?></td>
                           <td align="center"><?php echo $Datos['bloqueo'];?></td>
                           <td align="center"><?php echo $Datos['cargo'];?></td>
                  </tr>
                  <?php
   
		}

  ?>
                </table>
                <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.dataTables.min.css"/>
<script type="text/javascript" src="js/jquery.dataTables.min.js">
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[-1], ["Todo"]]
    } );
} );
</script>
                <button type="submit"  value="" class="btn btn-success">Confirmar contratación</button>
</form>
              </div>
            </div>
            </body>
</html>
<script>
function pregunta(){
	if (IsChk('datos')){
			 
    if(confirm("¿Está seguro de confirmar el personal seleccionado?"))
    {
		alert('Datos enviados correctamente')
        return true;
    }else{
	alert('Operación cancelada, Vuelva a seleccionar personal')
    return false;
	}
}else {
//ni siquiera uno chequeado no envía el form
alert ('Antes de enviar solicitudes debe seleccionar personal');
return false;
}
}
function IsChk(datos)
{
var found = false;
var chk = document.getElementsByName(datos+'[]');
for (var i=0 ; i < chk.length ; i++)
{
found = chk[i].checked ? true : found;
}
return found;
}

</script>