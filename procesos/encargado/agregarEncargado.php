<?php 
	//print_r($_POST);
	session_start();
	require_once "../../clases/Encargado.php";
	$Encargado = new Encargado();

	$datos = array ("encargado" => $_POST['encargado']);

	echo $Encargado->agregarEncargado($datos);

 ?>