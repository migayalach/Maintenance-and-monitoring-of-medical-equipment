<?php 
	//print_r($_POST);
	require_once "../../clases/Unidad.php";
	$Unidad = new Unidad();

	$datos = array (
				"idUnidad" => $_POST['idUnidadU'],
				"nombre" => $_POST['nombreU'],
				"idEquipo" => $_POST['idEquipoU'],
				"idEncargado" => $_POST['idEncargadoU']
					);

	echo $Unidad->actualizarUnidad($datos);

 ?>