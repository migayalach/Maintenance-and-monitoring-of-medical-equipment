<?php 
	//print_r($_POST);
	require_once "../../../clases/Usuario.php";
	$usuario = new Usuario();

	$password = sha1($_POST['password']);
	$datos = array(
				"nivel"=> $_POST['nivel'],
				"nombre" => $_POST['nombre'], 
				"apellido" => $_POST['apellido'], 
				"carnet" => $_POST['carnet'],
				"direccion" => $_POST['direccion'], 
			    "email" => $_POST['correo'], 
				"celular" => $_POST['celular'], 
			    "usuario" => $_POST['usuario'], 
			    "password" => $password
			);
			
	echo $usuario->agregarUsuario($datos);
 ?>