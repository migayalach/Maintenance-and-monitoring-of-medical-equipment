<?php 

	require_once "../../clases/Encargado.php";
	$Encargado = new Encargado();

	$datos = array (
				"idEncargado" => $_POST['idEncargado'],
				"nombre" => $_POST['nombreU']
					);

	echo $Encargado->actualizarEncargado($datos);

 ?>