<?php 
	
	require_once "../../clases/Encargado.php";
	$Encargado =  new Encargado();

	echo json_encode($Encargado->obtenerEncargado($_POST['idEncargado']));

 ?>