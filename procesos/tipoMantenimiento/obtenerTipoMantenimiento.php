<?php 
	
	require_once "../../clases/tipoMantenimiento.php";
	$tipoM =  new tipoM();

	echo json_encode($tipoM->obtenerTipoM($_POST['idTipoM']));

 ?>