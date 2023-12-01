<?php 

	session_start();
	require_once "../../clases/Unidad.php";
	$Unidad =  new Unidad();

	echo $Unidad->eliminarUnidad($_POST['idUnidad']);

 ?>