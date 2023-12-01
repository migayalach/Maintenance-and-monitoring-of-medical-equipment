<?php 
	
	require_once "../../clases/Equipo.php";
	$Equipo =  new Equipo();

	echo json_encode($Equipo->obtenerEquipo($_POST['idEquipo']));

 ?>