<?php 

	session_start();
	require_once "../../clases/Equipo.php";
	$Equipo =  new Equipo();

	echo $Equipo->eliminarEquipo($_POST['idEquipo']);

 ?>