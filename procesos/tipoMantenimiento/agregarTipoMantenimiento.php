<?php 
	//print_r($_POST);
	require_once "../../clases/tipoMantenimiento.php";
	$tipoM = new tipoM();

	$datos = array (
			"nombreTipoM" => $_POST['nombreTipoM']);

	echo $tipoM->agregartipoM($datos);

 ?>