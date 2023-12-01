<?php 

	session_start();
	require_once "../../clases/Mantenimiento.php";
	$Mantenimiento =  new Mantenimiento();

	echo $Mantenimiento->eliminarMantenimiento($_POST['idMantenimiento']);

 ?>