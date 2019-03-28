<?php
session_start();
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
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
<br><br>
	<div class="col-sm-8 col-sm-offset-2 myform-cont">
	
<form action="EliminaJefeProyecto.php" name="formEliminar" method="POST" onsubmit="return pregunta()">

	<?php
		include("conexionbd.php");
	
        $idorg= $_SESSION['idorg'];
		
		$sql_consultar= "SELECT u.rut,j.nombreJefeP,j.apellidoJefeP,j.telefonoJefeP, j.idjefeProyecto from jefeproyecto j inner join usuario u on j.fkusuario=u.idusuario where fkorganizacion='$idorg'";
		$resultados=$conex->query($sql_consultar);
		require("funciones.php");
	?>
		<h1 align="center">Ver Jefe de proyectos</h1>
			<div class="myform-bottom">
			<table class="table">
			<thead>
				<tr>
						<th>Rut</th>
						<th>Nombre Apellido</th>
						<th>Teléfono</th>
						<th>Especialidad</th>
                        <td align="center"><h4><b>Acciones</b></h4></td>
					</tr>
			</thead>
			<tbody>
				<?php
					foreach ($resultados as $fila){
					    $rut = (esRut($fila['rut'])); 
				?>
					<tr>
						<td align="left"><?php echo $rut;?></td>
						<td align="left"><?php echo $fila['nombreJefeP']." ".$fila['apellidoJefeP'];?></td>
						<td align="left"><?php echo $fila['telefonoJefeP'];?></td>
						<td align="left">Jefe de Proyectos</td>
						<td align="right"><a data-toggle='modal' data-target='#editJP' data-id='<?php echo $fila['idjefeProyecto'];?>' data-nombre='<?php echo $fila['nombreJefeP'];?>' data-apellido='<?php echo $fila['apellidoJefeP']; ?>'  data-telefono=' <?php echo $fila['telefonoJefeP']; ?>' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a></td>
                        <td align="left"><button type="submit" name="idboton2" id="<?php echo $fila['idjefeProyecto']; ?>" value="<?php echo $fila['idjefeProyecto']; ?>" class="btn btn-danger"><span class='glyphicon glyphicon-trash'></span>Eliminar</button></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>	
            </form>
            <div class="modal" id="editJP" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 align="center" class="black-text">Editar Jefe de Proyecto</h4>
                    </div>
                    <div class="modal-body">
                       <form action="cAtualizarJefeProyecto.php" method="POST">

                                    <input name="id" type="hidden" id="id" ></input>
                                    <div align="center" class="form-group">
                                        <label for="nombre">Nombre del Jefe de Proyecto</label>
                                        <input class="form-control" id="nombre" name="nombre" type="text" required="required" maxlength="30"></input>
                                    </div>
                                    <div align="center" class="form-group">
                                        <label for="apellido">Apellido del Jefe de Proyecto</label>
                                        <input class="form-control" id="apellido" name="apellido" type="text" required="required" maxlength="30"></input>
                                    </div><div align="center" class="form-group">
                                        <label for="apellido">Teléfono del Jefe de Proyecto</label>
                                        <input class="form-control" id="telefono" name="telefono" type="text" required="required" maxlength="12"></input>
                                    </div>
                                    <div align="center"><input  type="submit" class="btn btn-success" value="Guardar"></div>
                                    
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
	
	
</body>
</html>
<script>
function pregunta(){
if(confirm("¿Desea continuar con la eliminación de este jefe de proyecto?"))
    {
		<!--alert('Datos enviados correctamente')-->
        return true;
    }else{
	alert('Operación cancelada, Vuelva a a seleccionar un Jefe de Proyecto')
    return false;
	}
}
	</script>
    <script>
          $('#editJP').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var recipient0 = button.data('id')
          var recipient1 = button.data('nombre')
          var recipient2 = button.data('apellido')
          var recipient3 = button.data('telefono')
          
          var modal = $(this)
          modal.find('.modal-body #id').val(recipient0)
          modal.find('.modal-body #nombre').val(recipient1)
          modal.find('.modal-body #apellido').val(recipient2)
          modal.find('.modal-body #telefono').val(recipient3)
          

        });
        </script>
