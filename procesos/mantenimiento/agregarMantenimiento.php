<?php 
	//print_r($_POST);
	session_start();

	require_once "../../clases/Mantenimiento.php";
	$Mantenimiento = new Mantenimiento();
	$idUsuario=$_SESSION['idUsuario'];
	$vacio="";

	$datos = array (
		    "tipo" => $_POST['idTipoM'],
			"equipo" => $_POST['idEquipoM'],
			"usuario" => $idUsuario,
			"fecha" => $_POST['fecha'],
			"nroDocumento" => $_POST['nroDocumento'],
			"vacio"=>$vacio
					);
	
	//print_r($datos);
	echo $Mantenimiento->agregarMantenimiento($datos);
 ?>