<?php 

	require_once "../../clases/tipoMantenimiento.php";
	$tipoM = new tipoM();

	$datos = array (
				"idTipoM" => $_POST['idTipoM'],
				"tipoM" => $_POST['tipoMU']
					);

	echo $tipoM->actualizarTipoM($datos);

 ?>