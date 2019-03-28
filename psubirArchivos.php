<?php
//Iniciar Sesión

session_start();
if (isset($_SESSION['idpro'])) {
    $idTrabajador = $_SESSION['idpro'];

}
$user=$_SESSION['user'];
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
   <form action="subir.php" method="POST" name="formPreseleccion" enctype="multipart/form-data" > 
   <div class="myform-bottom">
              <table id="example" class="dataTables_info" cellspacing="0" width="100%">
                
                 <!--  <table id="example" class="display" width="900" border="2" cellpadding="4" cellspacing="4" >-->
                  <thead>                  
                  <tr >
                   
                    
                    <th   align="left"></th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tr  class="alt">
                   
                    
                    <td align="left"><input type="file" id="archivo" name="archivo"></input></td>
                    
                    <td><button type="submit" value="<?php echo $user; ?>" name="idboton" class="btn btn-success">Subir ODI</button></td>
                  </tr>
                </table>
                </div>
                </form>

</div>
            </div>
            </body>
</html>