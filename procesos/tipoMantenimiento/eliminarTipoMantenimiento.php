<?php 
	//print_r($_POST);
	session_start();
	require_once "../../clases/tipoMantenimiento.php";
	$tipoM =  new tipoM();

	echo $tipoM->eliminarTipoM($_POST['idTipoM']);

 ?>