<?php
session_start();

$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la base de datos");

$rut=$_SESSION['rutSirve'];
$res8=mysql_query("SELECT adm.idAdm FROM usuario u inner join admcontrato adm on u.idusuario=adm.fkusuario where rut='$rut'");
$dato8=mysql_fetch_assoc($res8);
$id=$dato8['idAdm'];
$_SESSION['id']=$id;
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
<?php
//Proceso de conexión con la base de datos
$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION) {
    header("location:login.php");
}

$rut = $_SESSION['rutSirve'];

$consulta2 = "SELECT a.idAdm, a.fkorganizacion, a.fkusuario, u.rut, u.password, u.idusuario FROM admcontrato a LEFT JOIN usuario u ON a.fkusuario = u.idusuario WHERE rut='$rut'";
$resultado2= mysql_query($consulta2,$conex) or die (mysql_error());
$fila2=mysql_fetch_array($resultado2);
$_SESSION['idorg'] = $fila2['fkorganizacion'];


?>

<body>
  <header>

  </header>
  <?  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>
<br><br>
<br><br>
  <div>
    <div>
     <div align="center">
			Bienvenido Administrador de Contratos
		</div>
    </div>
  </div>
</body>
</html>