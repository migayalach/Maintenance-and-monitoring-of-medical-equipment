<?php 
	session_start();
	require_once "../../clases/Gestor.php";
	$Gestor =  new Gestor();
	require_once "../../clases/Mantenimiento.php";
	$Mantenimiento = new Mantenimiento();
	
	$idMantenimiento = $_POST['idMantenimientoU'];
	$idUsuario = $_SESSION['idUsuario'];

	
	if($_FILES['archivos']['size'] > 0) {

		$carpetaUsuario = '../../archivos/'.$idUsuario;

		if (!file_exists($carpetaUsuario)) {
			mkdir($carpetaUsuario, 0777, true);
		}

		$totalArchivos = count($_FILES['archivos']['name']);
		for ($i=0; $i < $totalArchivos; $i++) { 

			$nombreArchivo = $_FILES['archivos']['name'][$i];
			$explode = explode('.', $nombreArchivo);
			$tipoArchivo = array_pop($explode);
			$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
			$rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;

			$datosRegistroArchivo = array(
										"idUsuario" => $idUsuario,
										"idMantenimiento" => $idMantenimiento,
										"nombreArchivo" => $nombreArchivo,
										"tipo" => $tipoArchivo,
										"ruta" => $rutaFinal
										);

			$datos = array ("idMantenimiento" => $idMantenimiento);

			if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
				
				$respuesta = $Gestor->agregaRegistroArchivo($datosRegistroArchivo);
				$respuesta = $Mantenimiento->actualizarMantenimientoH($datos);
			}
		}
		echo $respuesta;
	} else {
		echo 0;
	}

	//print_r($_POST);
	/*if($_FILES['archivos']['size'] > 0) 
	{
		$totalArchivos = count($_FILES['archivos']['name']);
		for ($i=0; $i < $totalArchivos; $i++) 
		{ 
			$nombreArchivo = $_FILES['archivos']['name'][$i];
			$explode = explode('.', $nombreArchivo);
			$tipoArchivo = array_pop($explode);
			
			$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
			$carpeta = '../../archivos/';
			$rutaFinal = $carpeta.$nombreArchivo;
			
			echo (move_uploaded_file($rutaAlmacenamiento, $rutaFinal));
		}
	}
	else 
	{
		echo 0;
	}*/

 ?>