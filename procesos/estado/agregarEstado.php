<?php 
	//print_r($_POST);
	require_once "../../clases/Estado.php";
	$estado = new Estado();

	$datos = array (
			"nombreTipoE" => $_POST['nombreTipoE']);

	echo $estado->agregarTipoE($datos);

 ?>