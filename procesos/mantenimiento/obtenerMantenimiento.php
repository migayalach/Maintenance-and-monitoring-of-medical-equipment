<?php 
	//print_r($_POST);
	require_once "../../clases/Mantenimiento.php";
	$Mantenimiento =  new Mantenimiento();

	echo json_encode($Mantenimiento->obtenerMantenimiento($_POST['idMantenimiento']));
	//print_r($Mantenimiento);
 ?>