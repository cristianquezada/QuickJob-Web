<?php

session_start();
$idorg=$_SESSION['idorg'];
	
$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme",$conex)
or die("ERROR con la base de datos");

include("conexionbd.php");
$res9=mysql_query("SELECT * FROM organizacion where idOrganizacion='$idorg'");
		$dato9=mysql_fetch_assoc($res9);
		$org=$dato9['NombreOrganizacion'];
		$imgEmpresa=$dato9['imgOrganizacion'];

include("conexionbd.php");

$sql_consultar= "SELECT t.idTrabajador, t.nombreCompleto, t.direccion, t.fono,ciu.nombreCiudad,car.cargo,t.foto, t.venExamenMed, t.venInd,t.bloqueo, u.rut FROM trabajador t  INNER JOIN cargos car ON car.idCargo=t.fkCargo INNER JOIN ciudad ciu ON ciu.idCiudad=t.fkCiudad INNER JOIN solicitud s ON t.idTrabajador = s.fktrabajador INNER JOIN usuario u ON t.fkusuario = u.idusuario WHERE  s.estadoSolicitud = '5'";?>
</br>
</br>
<center>
<?php
$result_consulta=mysql_query($sql_consultar);
	   ?>
                  <?php
  
  while($Datos=mysql_fetch_array($result_consulta))
		{
			$codigo=$Datos['rut'];					
  ?>
<img src="<?php echo $imgEmpresa ?>" alt="" width="203" class="img-responsive" style="max-width: 200px; max-height: 200px" >
        <br />
        <img src="../AplicacionMovil/imagenes/Peligro.jpg" alt="" width="206" class="img-responsive" style="max-width: 200px; max-height: 200px" >
        <br />
        <table width="197">
        <tr>
        <td width="88"><font size="2">De esta tarjeta</font><br /><font size="2">depende</font> MI SEGURIDAD</td><td width="97"><img src="<?php echo $Datos['foto']; ?>" alt="" width="90" height="79" class="img-responsive" style="max-width: 200px; max-height: 200px" ></td></tr>
        
        </table>
        <br>
		<?php
		
		echo "<font size=1>RUT: ".$Datos['rut']?> </font></br>
        <!--<img src="<?php //echo "imagenes/".$fila['foto'] ; ?>" class="img-responsive" alt="" style="max-width: 200px; max-height: 200px" > </br>-->
        <?php echo "<font size=1>Nombre: ".$Datos['nombreCompleto']?> </font></br>
        <?php echo "<font size=1>Ciudad: ".$Datos['nombreCiudad']?> </font></br>
        <?php echo "<font size=1>Cargo: ".$Datos['cargo']?> </font></br>
        <?php echo "<font size=1>Empresa: Miincorp"?> </font></br>
        <?php echo "<font size=1>Teléfono: ".$Datos['fono']?> </font></br>
         <?php echo "<font size=1>Vencimiento: ".$Datos['']?> </font></br>
<font size=1 style="background-color:#FF0">Tarjeta de advertencia de bloqueo personal <br />
         permanente e instransferible</font>
        
<br>
<br>
        
        <?php 
		
echo '<img src="php-barcode-master/barcode.php?text=';
echo $codigo;
echo '&size=40&codetype=Code39&print=true" name="fotoCodigo" id="fotoCodigo" />';
 
		echo '<br><br><br>';
		}
		
		?>
        <a href=jVerProyecto.php>Volver</a>