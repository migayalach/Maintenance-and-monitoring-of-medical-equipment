<?php 
	//print_r($_POST);
	require_once "../../clases/Mantenimiento.php";
	$Mantenimiento =  new Mantenimiento();

	echo json_encode($Mantenimiento->obtenerMantenimientoP($_POST['idMantenimientoP']));
	//print_r($Mantenimiento);
 ?>