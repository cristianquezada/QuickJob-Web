	<?php
			$mysqli = new mysqli("hireme.cl", "hiremecl_cris", "hiremecl123", "hiremecl_hireme");
			$comentario = $_POST['comentario'];
			$id = $_POST['id'];

			date_default_timezone_set('Chile/Continental');
			$hoy = date_default_timezone_get();
			$fecha = getdate();
			$conv = array_merge((array) $fecha['year'], (array) $fecha['mon'], (array) $fecha['mday']);
			$fechaHoy = implode("-", $conv);
			
			$sql = $mysqli->query("insert into comentarios (comentario, fechaComentario, fktrabajador) values ('$comentario', '$fechaHoy', '$id') ");			
			
	?>	

		    <SCRIPT LANGUAGE="javascript"> 
            alert("Comentario Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=jVerHistorialEspecialistasTerminado.php">
