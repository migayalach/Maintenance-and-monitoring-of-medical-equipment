<?php 
	//print_r($_POST);
	require_once "../../../clases/Usuario.php";
	$usuario = new Usuario();

	$datos = array (
				"idUsuario" => $_POST['idUsuarioA']
					);

	echo $usuario->agregaAsistencia($datos);

 ?>