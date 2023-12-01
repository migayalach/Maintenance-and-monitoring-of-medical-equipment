<?php 
	//print_r($_POST);
	require_once "../../clases/Unidad.php";
	$Unidad =  new Unidad();

	echo json_encode($Unidad->obtenerEquipo($_POST['idEquipoU']));

 ?>