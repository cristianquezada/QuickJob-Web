﻿<?php
session_start();

if(isset($_SESSION['idpro'])){
	$codigo=$_SESSION['idpro'];
	
}
if (isset($_POST['idboton'])) {
    $codigo = $_POST['idboton'];
	$_SESSION['idpro']=$codigo;

}
//Crear fecha actual

date_default_timezone_set('Chile/Continental');
$hoy      = date_default_timezone_get();
$fecha    = getdate();
$conv     = array_merge((array) $fecha['year'], (array) $fecha['mon'], (array) $fecha['mday']);
$fechaHoy = implode("-", $conv);

//Proceso de conexión con la base de datos
    $conex = mysql_connect("localhost", "root", "administrador")
    or die("No se pudo realizar la conexion exitosamente");
    mysql_select_db("basedatoshireme", $conex)
    or die("ERROR con la bd");

//Iniciar Sesión
    session_start();

//Validar si se está ingresando con sesión correctamente
    if (!$_SESSION) {
        header("location:login.php");
    }
	
if (isset($_SESSION['nombre'])) {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.dataTables.min.css"/>
<script type="text/javascript" src="js/jquery.dataTables.min.js">
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="pJefeProyecto.php"><img alt="" src="imagenes/Imagen1.png"></a>
      </br>
      </br>
      <a href="jBuscarEspecialistasPrueba.php">Volver</a>
      </br>
      </br>
    </div>
    </div>

</nav>

<div id="main2">
              <div >
              <form action="pruebaEnvio.php" method="POST" name="formEnviar" onsubmit="return pregunta()"> 
              <table id="example" class="display" cellspacing="0" width="100%">
                
                 <!--  <table id="example" class="display" width="900" border="2" cellpadding="4" cellspacing="4" >-->
                  <thead>                  
                  <tr >
                   
                    <th width="5" align="center">Seleccionar</th>
                    <th width="30" align="center">Rut</th>
                    <th width="30" align="center">Nombre</th>
                    <th width="30" align="center">Número</th>
                    <th width="125" align="center">Cargo</th>
                    <th width="73" align="center">Dirección</th>
                   
                      <th width="73" align="center">Ciudad</th>
                       <th width="73" align="center">Examen Médico</th>
                       <th width="73" align="center">Inducción</th>
                       <th width="73" align="center">Talla</th>
                       <th width="73" align="center">Bloqueo</th>
                       <th width="73" align="center">F.Nacimiento</th>
                       <th width="73" align="center">Nacionalidad</th>
                       <th width="73" align="center">Salud</th>
                       <th width="73" align="center">Afp</th>
                  </tr>
                  </thead>
                  <?php
	   
	    $sql_consulta="SELECT * FROM trabajador WHERE DisfechaTermino <='".$fechaHoy."'";
		$result_consulta=mysql_query($sql_consulta);
	   ?>
                  <?php
  
  while($Datos=mysql_fetch_array($result_consulta))
		{
			$ven=explode('-',$Datos['venExamenMed']);
			$ind=explode('-',$Datos['venInd']);
			$bloq=explode('-',$Datos['bloqueo']);
			//Colores para vencimiento examen medico
			if($ven['0']>$fecha['year']){
				$color='#00FF00';
				//verde
			}
			if($ven['0']<$fecha['year']){
				$color='#FF0000';
			}
			if($ven['1']>$fecha['mon']&&$ven['0']==$fecha['year']){
					$color='#00FF00';
				}
				if(($ven['1']-1)==$fecha['mon']&&$ven['0']==$fecha['year']){
					$color='#FFFF00';
				}
			if($ven['1']<$fecha['mon']&&$ven['0']==$fecha['year']){
					$color='#FF0000';
				}
			if($ven['2']>$fecha['mday']&&$ven['0']==$fecha['year']&&$ven['1']==$fecha['mon']){
						$color='#00FF00';
				}
				if($ven['2']<$fecha['mday']&&$ven['0']==$fecha['year']&&$ven['1']==$fecha['mon']){
						$color='#FF0000';
				}
				if($ven['1']==$fecha['mon']&&$ven['0']==$fecha['year']){
					$color='#FFFF00';
				}
				
				
				//Colores para vencimiento induccion
			if($ind['0']>$fecha['year']){
				$color2='#00FF00';
				//verde
			}
			if($ind['0']<$fecha['year']){
				$color2='#FF0000';
			}
			if($ind['1']>$fecha['mon']&&$ind['0']==$fecha['year']){
					$color2='#00FF00';
				}
				if(($ind['1']-1)==$fecha['mon']&&$ind['0']==$fecha['year']){
					$color2='#FFFF00';
				}
			if($ind['1']<$fecha['mon']&&$ind['0']==$fecha['year']){
					$color2='#FF0000';
				}
			if($ind['2']>$fecha['mday']&&$ind['0']==$fecha['year']&&$ind['1']==$fecha['mon']){
						$color2='#00FF00';
				}
				if($ind['2']<$fecha['mday']&&$ind['0']==$fecha['year']&&$ind['1']==$fecha['mon']){
						$color2='#FF0000';
				}
				if($ind['1']==$fecha['mon']&&$ind['0']==$fecha['year']){
					$color2='#FFFF00';
				}
				
				//vencimiento para el bloqueo
				
				if($bloq['0']>$fecha['year']){
				$color3='#00FF00';
				//verde
			}
			if($bloq['0']<$fecha['year']){
				$color3='#FF0000';
			}
			if($bloq['1']>$fecha['mon']&&$bloq['0']==$fecha['year']){
					$color3='#00FF00';
				}
				if(($bloq['1']-1)==$fecha['mon']&&$bloq['0']==$fecha['year']){
					$color3='#FFFF00';
				}
			if($bloq['1']<$fecha['mon']&&$bloq['0']==$fecha['year']){
					$color3='#FF0000';
				}
			if($bloq['2']>$fecha['mday']&&$bloq['0']==$fecha['year']&&$bloq['1']==$fecha['mon']){
						$color3='#00FF00';
				}
				if($bloq['2']<$fecha['mday']&&$bloq['0']==$fecha['year']&&$bloq['1']==$fecha['mon']){
						$color3='#FF0000';
				}
				if($bloq['1']==$fecha['mon']&&$bloq['0']==$fecha['year']){
					$color3='#FFFF00';
				}
				
				
			
				
			
  ?>
                  <tr  class="alt">
                   
                    <td><label><input type="checkbox" align="absmiddle" name="datos[]" value="<?php echo $Datos['idTrabajador'];?></label></td>"></td>
                    <td align="center"><?php echo $Datos['rut'];?></td>
                    <td align="center" > <?php echo $Datos['nombreCompleto'];?></td>
                    <td align="center"><?php echo $Datos['fono'];?></td>
                    <td align="center"><?php echo $Datos['cargo'];?></td>
                   
                          <td align="center"><?php echo $Datos['direccion'];?></td>
                           <td align="center"><?php echo $Datos['ciudad'];?></td>
                            <td align="center" bgcolor="<?php echo $color; ?>"><?php echo $Datos['venExamenMed'];?></td>
                           <td align="center" bgcolor="<?php echo $color2; ?>"><?php echo $Datos['venInd'];?></td>
                           <td align="center"><?php echo $Datos['talla'];?></td>
                           <td align="center" bgcolor="<?php echo $color3; ?>"><?php echo $Datos['bloqueo'];?></td>
                           <td align="center"><?php echo $Datos['fechaNacimiento'];?></td>
                           <td align="center"><?php echo $Datos['nacionalidad'];?></td>
                           <td align="center"><?php echo $Datos['salud'];?></td>
                           <td align="center"><?php echo $Datos['afp'];?></td>
                  </tr>
                  <?php
   
		}
}

  ?>
                </table>
                <button type="submit" value="" >Enviar Solicitud</button>
                <button type="button" onclick="seleccionar_todo()" value="" >Seleccionar todo</button>
                <button type="button" onclick="desmarcar_todo()" value="" >Desmarcar todo</button>
</form>
              </div>
            </div>
         


</body>
</html>
<script>
function pregunta(){  
    if(confirm("¿Está seguro de enviar las notificaciones al personal seleccionado?"))
    {
		alert('Datos enviados correctamente')
        return true;
    }
	alert('Operación cancelada, Vuelva a seleccionar personal')
    return false;
}
</script>
<script>
function seleccionar_todo(){ 
   for (i=0;i<document.formEnviar.elements.length;i++) 
      if(document.formEnviar.elements[i].type == "checkbox")	
         document.formEnviar.elements[i].checked=1
		 alert('Ha seleccionado todos los especialistas posibles, si desea quitar alguno desmarque al especialista')
}
</script>
<script>
function desmarcar_todo(){
	if(confirm("¿Realmente desea desmarcar a todos los especialistas seleccionados?")){
	for (i=0;i<document.formEnviar.elements.length;i++) 
      if(document.formEnviar.elements[i].type == "checkbox")	
         document.formEnviar.elements[i].checked=0 
	return true;	
	}else{
	alert('Ha desmarcado todos los especialistas posibles.')
	return false;
}
}
</script>

