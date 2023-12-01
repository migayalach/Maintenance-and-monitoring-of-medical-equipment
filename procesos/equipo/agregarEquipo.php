<?php 
	//print_r($_POST);
	session_start();

	require_once "../../clases/Equipo.php";
	$Equipo = new Equipo();

	$datos = array (
		    "estado" => $_POST['estado'],
			"nombre" => $_POST['nombre'],
			"marca" => $_POST['marca'],
			"modelo" => $_POST['modelo'],
			"serie" => $_POST['serie'],
			"inventario" => $_POST['inventario']
					);
	echo $Equipo->agregarEquipo($datos);
 ?>