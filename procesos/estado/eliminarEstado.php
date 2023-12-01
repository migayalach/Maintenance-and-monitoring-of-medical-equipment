<?php 
	//print_r($_POST);
	session_start();
	require_once "../../clases/Estado.php";
	$tipoE =  new Estado();

	echo $tipoE->eliminarTipoE($_POST['idTipoE']);

 ?>