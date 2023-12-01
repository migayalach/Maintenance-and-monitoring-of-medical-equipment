<?php 

	require_once "../../clases/Estado.php";
	$tipoE = new Estado();

	$datos = array (
				"idTipoE" => $_POST['idTipoE'],
				"estadoU" => $_POST['estadoU']
					);

	echo $tipoE->actualizarTipoE($datos);

 ?>