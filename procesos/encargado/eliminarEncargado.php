<?php 

	session_start();
	require_once "../../clases/Encargado.php";
	$Encargado =  new Encargado();

	echo $Encargado->eliminarEncargado($_POST['idEncargado']);

 ?>