<?php 
	//print_r($_POST);
	require_once "../../clases/Equipo.php";
	$Equipo = new Equipo();

	$datos = array (
				"idEquipo" => $_POST['idEquipoU'],
				"estado" => $_POST['estadoU'],
				"nombre" => $_POST['nombreU'],
				"marca" => $_POST['marcaU'],
				"modelo" => $_POST['modeloU'],
				"serie" => $_POST['serieU'],
				"inventario" => $_POST['inventarioU']
					);

	echo $Equipo->actualizarEquipo($datos);

 ?>