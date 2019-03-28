<?php
session_start();
if (isset($_SESSION['id'])) {
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
	
		<h1 align="center">Cuentas de representantes</h1>

		<div >
		<div align="center">		
		<br>

		<a class="btn btn-success" data-toggle="modal" data-target="#nuevacuenta">Nuevo Representante</a><br><br>
			
			<table class='table'>
			<thead>	
				<tr>
						<th>Rut</th>
						<th>Nombre</th>
						<th>Apellido</th>
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
			$consulta= "SELECT g.nombreGerente, g.apellidoGerente, o.NombreOrganizacion, u.rut, u.idusuario, g.idgerente FROM usuario u LEFT JOIN gerente g ON u.idusuario = g.fkusuario INNER JOIN organizacion o ON g.fkorganizacion = o.idOrganizacion ORDER BY g.apellidoGerente ASC";
			require("funciones.php"); 
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{	
					$rut = (esRut($fila[3])); 
				?>
				<form method="post" action="aEliminarCuenta.php" name="form-lista">
         		<tbody>
          		<tr>
           	 	<td><?php echo $rut; ?></td>
           	 	<td><?php echo $fila[0]; ?></td>
            	<td><?php echo $fila[1]; ?></td>
            	<td><?php echo $fila[2]; ?></td>
            	<?php // echo $fila['IdProyecto']?>
            	<!-- <a data-toggle='modal' data-target='#editUsu' data-id='" .$fila[0] ."' data-rut='" .$fila[1] ."' data-nombre='" .$fila[2] ."' data-pagina='" .$fila[3] ."' data-correo='" .$fila[4] ."' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span>Editar</a> -->
	        	<td align="left"><button type="submit" name="idboton" id="<?php echo $fila[5]; ?>" value="<?php echo $fila[5]; ?>" class="btn btn-danger">Eliminar Cuenta</button></td>
				</tr>
          		</tbody>
          		</form>
					<!-- {	
					require("funciones.php"); 
          			$rut = (esRut($fila[3])); 

					echo "<tr>";
					echo "<td>$rut</td><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td>";			
					echo "<td><a class='btn btn-danger' href='aEliminarCuenta.php?id=" .$fila[4] ."'><span class='glyphicon glyphicon-remove'></span>Eliminar</a>";		
					echo "</td>";
					echo "</tr>"; -->
					<?php 
				}
				}		
			
	

?>
	        </table>
		</div> 


		<div class="modal" id="nuevacuenta" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Representante</h4>
                    </div>
                    <div class="modal-body">
                       <form action="NuevaCuentaRepresentante.php" method="POST">
                          <div class="form-group">
                            <div class="form-group">
                            <label for="nombre">Rut:</label>
                            <input class="form-control" id="rut" name="rut" type="text" placeholder="Insertar Rut" required="required"></input>
                          </div>
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Insertar Nombre" required="required"></input>
                          </div>
                          <div class="form-group">
                            <label for="edad">Apellido: </label>
                            <input class="form-control" id="apellido" name="apellido" type="text" placeholder="Insertar Apellido" required="required"></input>
                          </div>
                          <div class="form-group ">
                            <label for="edad">Organizacion:</label>
                            <br>
							<select class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="idorg" value="Seleccione Organizacion">
							<option value="">Seleccione organizacion</option>
							<?php
							$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");	
							$sql_listar="SELECT * FROM organizacion ORDER BY NombreOrganizacion ASC";
							$resultados=$mysqli->query($sql_listar);
							foreach ($resultados as $nombre) {					
							?>
							<option value="<?php echo $nombre['idOrganizacion']; ?>"><?php echo $nombre['NombreOrganizacion']; ?></option>
							<?php } ?>
							</select><br />
                          </div>
                          <div class="form-group">
                            <label for="direccion">Contraseña:</label>
                            <input class="form-control" id="contraseña" name="contraseña" type="text" placeholder="Insertar Contraseña" required="required"></input>
                          </div>
                          

              <input type="submit" class="btn btn-success" value="Registrar">
                       </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

	
	<script>
      $('#editUsu').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient0 = button.data('rut')
      var recipient1 = button.data('nombre')
      var recipient2 = button.data('apellido')
      var recipient3 = button.data('organizacion')
      var recipient4 = button.data('contraseña')
      var modal = $(this)
      modal.find('.modal-body #rut').val(recipient0)
      modal.find('.modal-body #nombre').val(recipient1)
      modal.find('.modal-body #apellido').val(recipient2)
      modal.find('.modal-body #apellidom').val(recipient3)
      modal.find('.modal-body #organizacion').val(recipient4)
      modal.find('.modal-body #contraseña').val(recipient5)
    });

  </script>
	
</body>
</html>
<?php
} else {
        ?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
}
    ?>