<?php 
	//print_r($_POST);
	require_once "../../../clases/Usuario.php";

	$usuario = $_POST['carnet'];
	$password = sha1($_POST['carnet']);

	
	$datos = array(
				"nivel"=> $_POST['nivel'],
				"nombre" => $_POST['nombre'], 
				"apellido" => $_POST['apellido'], 
				"carnet" => $_POST['carnet'],
				"direccion" => $_POST['direccion'], 
			    "email" => $_POST['correo'], 
				"celular" => $_POST['celular'], 
			    "usuario" => $usuario, 
			    "password" => $password
			);

	$usuario = new Usuario();
	echo $usuario->agregarUsuarios($datos);
 ?>