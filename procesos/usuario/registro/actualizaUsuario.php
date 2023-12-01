<?php 
	//print_r($_POST);
	require_once "../../../clases/Usuario.php";
	$usuario = new Usuario();

	$datos = array (
				"idUsuario" => $_POST['idUsuarioU'],
				"nivel" => $_POST['nivelU'],
				"nombre" => $_POST['nombreU'],
				"apellido" => $_POST['apellidoU'],
				"carnet" => $_POST['carnetU'],
				"direccion" => $_POST['direccionU'],
				"correo" => $_POST['correoU'],
				"celular" => $_POST['celularU']
					);

	echo $usuario->actualizarUsuario($datos);

 ?>