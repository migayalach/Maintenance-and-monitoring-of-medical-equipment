<?php 
	//print_r($_POST);
	session_start();

	require_once "../../clases/Unidad.php";
	$Unidad = new Unidad();

	$datos = array (
		    "nombre" => $_POST['nombre'],
			"idEquipo" => $_POST['idEquipo'],
			"idEncargado" => $_POST['idEncargado']
					);

	echo $Unidad->agregarUnidad($datos);

 ?>