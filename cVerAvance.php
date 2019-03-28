<?php
session_start();
$idorg=$_SESSION['idorg'];
$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
    or die("No se pudo realizar la conexion exitosamente");
    mysql_select_db("hiremecl_hireme", $conex)
    or die("ERROR con la bd");
	$contador=0;
	
	
		
		 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>HireMe</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();
  } );
  </script>

</head>
<style>
	.leyendaH {text-align:center;}
	.leyenda  ul {list-style-type:none;padding:0 10px;}
	.leyendaH ul {display:inline-block;}
	.leyenda  ul>li {font-size:14px;}
	.leyendaH ul>li {float:left;margin-right:10px;}
	.leyenda  ul>li>span {width:12px;height:12px;display:inline-block;margin-right:3px;}
	</style>	
	<header>
		
	</header>
	<?  
if(isset($_SESSION['tipousuario'])&&$_SESSION['tipousuario']=="admcontrato"){
include("header/cabContrato.php");
}else {

	}


?>
<br><br>
<br>
<body>

<?php 
$sql_consulta="SELECT IdProyecto,NombreProyecto FROM proyecto where fkOrganizacion='$idorg'";
		$result_consulta=mysql_query($sql_consulta);
		  while($Datos=mysql_fetch_array($result_consulta))
		{
			
			$idpro=$Datos['IdProyecto'];
$res=mysql_query("SELECT CantNecesaria FROM proyecto  WHERE IdProyecto='$idpro'");
		$dat=mysql_fetch_assoc($res);
		
		$resultado=mysql_query("SELECT count(*) as total FROM solicitud where estadoSolicitud='2' and fkproyecto='$idpro'");
		$dato=mysql_fetch_assoc($resultado);

		
		$quedan=$dat['CantNecesaria']-$dato['total'];
		
			?>
            <center>
            <div style="float:left;margin-right:70px;">
	<div style="float:left;margin-right:50px;">
    Proyecto <?php echo $Datos['NombreProyecto'];?><br>
	<canvas id="canvas<?php echo $Datos['IdProyecto'];?>"></canvas>
	<div id="leyenda<?php echo $Datos['IdProyecto'];?>" class="leyenda"></div>
    
</div>
</center>


<script>
var miPastel=function(canvasId,width,height,valores) {
	this.canvas=document.getElementById(canvasId);;
	this.canvas.width=width;
	this.canvas.height=height;
	this.radio=Math.min(this.canvas.width/2,this.canvas.height/2)
	this.context=this.canvas.getContext("2d");
	this.valores=valores;
	this.tamanoDonut=0;
 
	/**
	 * Dibuja un gráfico de pastel
	 */
	this.dibujar=function() {
		this.total=this.getTotal();
		var valor=0;
		var inicioAngulo=0;
		var angulo=0;
 
		// creamos los quesos del pastel
		for(var i in this.valores)
		{
			valor=valores[i]["valor"];
			color=valores[i]["color"];
			angulo=2*Math.PI*valor/this.total;
 
			this.context.fillStyle=color;
			this.context.beginPath();
			this.context.moveTo(this.canvas.width/2, this.canvas.height/2);
			this.context.arc(this.canvas.width/2, this.canvas.height/2, this.radio, inicioAngulo, (inicioAngulo+angulo));
			this.context.closePath();
			this.context.fill();
			inicioAngulo+=angulo;
		}
	}
 
	/**
	 * Dibuja un gráfico de pastel con una redonda en medio en modo de donut
	 * Tiene que recibir:
	 *	el tamaño de la redonda central (0 no hay redonda - 1 es todo)
	 *	el color de la redonda
	 */
	this.dibujarDonut=function(tamano,color) {
		this.tamanoDonut=tamano;
		this.dibujar();
 
		// creamos un circulo del color recibido en medio
		this.context.fillStyle=color;
		this.context.beginPath();
		this.context.moveTo(this.canvas.width/2, this.canvas.height/2);
		this.context.arc(this.canvas.width/2, this.canvas.height/2, this.radio*tamano, 0, 2*Math.PI);
		this.context.closePath();
		this.context.fill();
	}
 
	/**
	 * Pone el tanto por ciento de cada uno de los valores
	 * Tiene que recibir:
	 *	el color del texto
	 */
	this.ponerPorCiento=function(color){
		var valor=0;
		var etiquetaX=0;
		var etiquetaY=0;
		var inicioAngulo=0;
		var angulo=0;
		var texto="";
		var incrementar=0;
 
		// si hemos dibujado un donut, tenemos que incrementar el valor del radio
		// para que quede centrado
		if(this.tamanoDonut)
			incrementar=(this.radio*this.tamanoDonut)/2;
 
		this.context.font="bold 12pt Calibri";
		this.context.fillStyle=color;
		for(var i in this.valores)
		{
			valor=valores[i]["valor"];
			angulo=2*Math.PI*valor/this.total;
 
			// calculamos la posición del texto
			etiquetaX=this.canvas.width/2+(incrementar+this.radio/2)*Math.cos(inicioAngulo+angulo/2);
			etiquetaY=this.canvas.height/2+(incrementar+this.radio/2)*Math.sin(inicioAngulo+angulo/2);
 
			texto=Math.round(100*valor/this.total);
 
			// movemos la posición unos pixels si estamos en la parte izquierda
			// del pastel para que quede mas centrado
			if(etiquetaX<this.canvas.width/2)
				etiquetaX-=10;
 
			// ponemos los valores
			this.context.beginPath();
			this.context.fillText(texto+"%", etiquetaX, etiquetaY);
			this.context.stroke();
 
			inicioAngulo+=angulo;
		}
	}
 
	/**
	 * Function que devuelve la suma del total de los valores recibidos en el array
	 */
	this.getTotal=function() {
		var total=0;
		for(var i in this.valores)
		{
			total+=valores[i]["valor"];
		}
		return total;
	}
 
	/**
	 * Función que devuelve una lista (<ul><li>) con la leyenda
	 * Tiene que recibir el id donde poner la leyenda
	 */
	this.ponerLeyenda=function(leyendaId) {
		var codigoHTML="<ul class='leyenda'>";
 
		for(var i in this.valores)
		{
			codigoHTML+="<li><span style='background-color:"+valores[i]["color"]+"'></span>"+i+"</li>";
		}
		codigoHTML+="</ul>";
		document.getElementById(leyendaId).innerHTML=codigoHTML;
	}
}
 
// definimos los valores de nuestra gráfica
var valores={
	"Personas confirmadas: <?php echo $dato['total']; ?>":{valor:<?php echo $dato['total'];?>,color:"green"},
	"Personas que faltan: <?php echo $quedan;?>":{valor:<?php echo $quedan;?>,color:"orange"},
}
 
// generamos el primer pastel
var pastel=new miPastel("canvas<?php echo $Datos['IdProyecto'];?>",200,200,valores);
pastel.dibujar();
pastel.ponerPorCiento("white");
pastel.ponerLeyenda("leyenda<?php echo $Datos['IdProyecto'];?>");


 
// generamos el segundo pastel

</script>
<?php
		}
		?>
</body>
</html>	