<?php 
	
	require_once "../../clases/Unidad.php";
	$Unidad =  new Unidad();

	echo json_encode($Unidad->obtenerUnidad($_POST['idUnidad']));

 ?>