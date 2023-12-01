<?php 
	//print_r($_POST);
	require_once "../../../clases/Usuario.php";
	$usuario = new Usuario();

	$password = sha1($_POST['passwordP']);

	$datos = array (
				"idUsuario" => $_POST['idUsuarioP'],
				"nombre" => $_POST['nombreP'],
				"apellido" => $_POST['apellidoP'],
				"carnet" => $_POST['carnetP'],
				"direccion" => $_POST['direccionP'],
				"correo" => $_POST['correoP'],
				"celular" => $_POST['celularP'],
				"usuario" => $_POST['usuarioP'],
				"clave" => $password
					);

	echo $usuario->actualizarUsuarioP($datos);

 ?>