<?php
	session_start();
	if(isset($_SESSION['id']))
	{
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
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="pAdministrador.php"><img alt="" src="imagenes/Imagen1.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="aVerEspecialista.php">Gestión de Especialistas</a></li>
        <li><a href="VerOrganizacion.php">Gestión de Organizaciones</a></li>
        <li><a href="aVerProyectos.php">Gestion de Proyectos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion de cuentas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aVerCuentas.php">Cuentas de representantes</a></li>
            <li><a href="#">Pronto</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ver Perfil</a></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>		
	<div>
	<div class="col-sm-6 col-sm-offset-3 myform-cont">
	<br>
	
		<h1 align="center">Listado de Proyectos</h1>

		<div >
		<div >		
		<br ><br >
			
			<table class='table'>
			<thead>	
				<tr>
						<th>Nombre de proyecto</th>
						<th>Descripcion proyecto</th>
						<th>Nombre jefe de proyecto</th>
						<th>Cantidad de especialistas</th>
						<th>Organizacion</th>
						<th>Acciones</th>

				</tr>			
			<thead>	
<?php
			$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");
			if ($mysqli->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT p.IdProyecto, p.NombreProyecto, p.DescripcionProyecto, p.CantNecesaria, j.nombreJefeP, j.apellidoJefeP, o.NombreOrganizacion FROM proyecto p LEFT JOIN jefeproyecto j ON p.fkjefeproyecto = j.idjefeProyecto INNER JOIN organizacion o ON j.fkorganizacion = o.idOrganizacion ORDER BY p.nombreProyecto ASC";

			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					{	
					?>
					<form method="post" action="aEliminarProyecto.php" name="form-lista">
         			<tbody>
          			<tr>
           	 		<td><?php echo $fila[1]; ?></td>
           	 		<td><?php echo $fila[2]; ?></td>
            		<td><?php echo $fila[4] . " " . $fila[5]; ?></td>
            		<td><?php echo $fila[3]; ?></td>
            		
            		<td><?php echo $fila[6]; ?></td>
	        		<td align="left"><button type="submit" name="idboton" id="<?php echo $fila[0]; ?>" value="<?php echo $fila[0]; ?>" class="btn btn-danger">Eliminar Proyecto</button></td>
          		</tr>
          </tbody>
          </form>
        <?php				
				}
				}
				$resultado->close();
			}
			$mysqli->close();			
			
	

?>
	        </table>
		</div> 


        <!-- <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Editar Organización</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="ActualizaOrganizacion.php" method="POST">                       		
                       		        
                       		        <input  id="id" name="id" type="hidden" ></input>   		
		                       		<div class="form-group">
		                       			<label for="rut">Rut de la Organizacion</label>
		                       			<input class="form-control" id="rut" name="rut" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="nombre">nombre</label>
		                       			<input class="form-control" id="nombre" name="nombre" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="pagina">Pagina Web</label>
		                       			<input class="form-control" id="pagina" name="pagina" type="text" ></input>
		                       		</div>
		                       		<div class="form-group">
		                       			<label for="correo">Correo</label>
		                       			<input class="form-control" id="correo" name="correo" type="text" ></input>
		                       		</div>

									<input type="submit" class="btn btn-success">							
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>  -->



	</div>
	
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var recipient0 = button.data('id')
		  var recipient1 = button.data('rut')
		  var recipient2 = button.data('nombre')
		  var recipient3 = button.data('pagina')
		  var recipient4 = button.data('correo')
		  var modal = $(this)		 
		  modal.find('.modal-body #id').val(recipient0)
		  modal.find('.modal-body #rut').val(recipient1)
		  modal.find('.modal-body #nombre').val(recipient2)
		  modal.find('.modal-body #pagina').val(recipient3)	
		  modal.find('.modal-body #correo').val(recipient4)	 
		});
		
	</script>
	
</body>
</html>
<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>