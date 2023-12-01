<?php 
	
	require_once "../../clases/Estado.php";
	$tipoE =  new Estado();

	echo json_encode($tipoE->obtenerTipoE($_POST['idTipoE']));

 ?>