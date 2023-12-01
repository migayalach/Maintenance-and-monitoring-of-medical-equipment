<?php 
	//print_r($_POST);
	session_start();
	require_once "../../../clases/Usuario.php";
	$usuario = new Usuario();

	echo $usuario->eliminarUsuario($_POST['idUsuario']);

 ?>