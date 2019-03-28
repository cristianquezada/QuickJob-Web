<?php
//Iniciar Sesión

session_start();
if (isset($_SESSION['idpro'])) {
    $idTrabajador = $_SESSION['idpro'];

}
$user=$_SESSION['user'];
$trab=$_SESSION['trab'];
//if (isset($_POST['idboton'])) {
//    $idTrabajador = $_POST['idboton'];
//    $_SESSION['idpro']=$idTrabajador;
//
//}
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
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
</head>
<body>
    <header>

    </header>
<?php  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="gerente"){
include("header/cabGerente.php");
}else {

	}


?>	
<br><br>
 <div class="col-md-8 col-md-offset-2 myform-cont">
        <br>
        <center>
    <h1>Archivos encontrados</h1></center>
    
   <form action="verArchivos.php" method="POST" name="form"> 
   <div class="myform-bottom">
               <table id="example" class="dataTables_info" cellspacing="0" width="100%">
                
                 <!--  <table id="example" class="display" width="900" border="2" cellpadding="4" cellspacing="4" >-->
                  <thead>                  
                  <tr >
                   
                    
                    <th align="left">Nombre</th>
                    <th  align="left">Fecha</th>
                    <th align="left">Selección</th>
                  </tr>
                  </thead>
                  <?php
	   
	    $sql_consulta="SELECT * FROM archivo where fkusuario='$user'";
		$result_consulta=mysql_query($sql_consulta);
	   ?>
                  <?php
  
  while($Datos=mysql_fetch_array($result_consulta))
		{
					
  ?>
                  <tr  class="alt">
                   
                    
                    <td align="left"><?php echo $Datos['nombre']?>;</td>
                    <td align="left"> <?php echo $Datos['fecha'];?></td>
                    <td><a href="HireMe/<?php echo $Datos['nombre'] ;?>" class="btn btn-info" target="_blank">Abrir</a>   <a href="HireMe/<?php echo $Datos['nombre'] ;?>" download="<?php echo $Datos['nombre'] ;?>" class="btn btn-primary">Download</a></td>
                    
                    
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
                
</form>
              </div>
            </div>
            </body>
</html>