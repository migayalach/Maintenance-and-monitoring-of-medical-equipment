<?php 
	//print_r($_POST);
	require_once "../../clases/Mantenimiento.php";
	$Mantenimiento = new Mantenimiento();

	$datos = array (
				"idMantenimiento" => $_POST['idMantenimientoU'],
				"idTipoMantenimiento" => $_POST['idTipoMantenimientoU'],
				"idEquipo" => $_POST['idUnidadU'],
				"fecha" => $_POST['fechaU'],
				"documento" => $_POST['documentoU']
					);

	echo $Mantenimiento->actualizarMantenimiento($datos);

 ?>