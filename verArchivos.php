<?php
//Iniciar Sesión



session_start();
$nombre=$_POST['idboton'];

$conex = mysql_connect("hireme.cl", "hiremecl_cris", "hiremecl123")
or die("No se pudo realizar la conexion");
mysql_select_db("hiremecl_hireme", $conex)
or die("ERROR con la base de datos");
$user=$_SESSION['user'];

$trab=$_SESSION['trab'];
	   
	    $sql_consulta="SELECT * FROM archivo where fkusuario='$user' and nombre='$nombre'";
		$result_consulta=mysql_query($sql_consulta);
	   ?>
                  <?php
  
  while($Datos=mysql_fetch_array($result_consulta))
		{
			if(empty($Datos)){
				echo "No hay archivos";
			}
			elseif($Datos['tipoArchivo']=="application/pdf"){
			    $file= './HireMe/'.$Datos['nombre'];
			    
			    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    ob_clean();
            flush();
    exit;
				//-header("Content-type: application/pdf");
				//-header('Content-Disposition: attachment; filename="' . basename($Datos['nombre']) . '"');
//header('filename="' . basename($Datos['nombre']) . '"');
//-readfile('HireMe/'.$Datos['nombre']);
				//header('content-type:application/pdf');
				//readfile('HireMe/'.$Datos['nombre']);
			}
			if($Datos['tipoArchivo']=="image/jpeg"){
				$file= './HireMe/'.$Datos['nombre'];
            $filename= basename($file);
            $type = '';
             
            if (is_file($file)) {
                $size = filesize($file);
                if (function_exists('mime_content_type')) {
                    $type = mime_content_type($file);
                } else if (function_exists('finfo_file')) {
                    $info = finfo_open(FILEINFO_MIME);
                    $type = finfo_file($info, $file);
                    finfo_close($info);
                }
                if ($type == '') {
                    $type = "application/force-download";
                }
                // Set Headers
                header("Content-Type: $type");
                header("Content-Disposition: attachment; filename=$filename");
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: " . $size);
                // Download File
                ob_end_clean();
                flush();
                readfile($file);
            } else {
                echo $file.' no es un archivo.';
            }
				
				
				
				
				
				//$archivo=basename($Datos['nombre']);
				//$ruta='./HireMe/'.$archivo;
//				$size=filesize($ruta);
//				header("Cache-Control: public");
//				header("Content-Description: File Transfer");
//				header("Content-Disposition: attachment; filename='".$archivo."'");
				//header("Content-Type: application/zip");
				//header("Content-Type: MIME");
//				header("Content-Transfer-Encoding: binary");
				//$file=file("HireMe/".$Datos['nombre']);
				//$file2=implode("", $file);
				//header("Content-type: image/jpeg");
				//header('Content-Disposition: attachment; filename="HireMe/'.$Datos['nombre'].'"');
				//header ("Content-Length: ".filesize($Datos['nombre']));
//header('filename="' . basename($Datos['nombre']) . '"');
//header ("Content-Type: application/octet-stream");
//header('Content-Disposition: attachment; filename="' . basename($Datos['nombre']) . '"');
//header ("Content-Length: ".filesize('HireMe/'.$Datos['nombre']));
//ob_end_clean();
//                flush();
//readfile($ruta);
				//echo "<img src='HireMe/".$Datos['nombre']."'>"; 
				//echo $file2;
			}
   
		}
?>