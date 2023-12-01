<?php $idUsuario=($_SESSION['idUsuario']);
$idNivel=($_SESSION['idNivel']);
//echo($idCliente);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Electromedicina</title>
	<link rel="icon" href="../img/logo.ico">
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap4/bootstrap.min.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">
</head>
<body style="background-color: #e9ecef">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
			<a class="navbar-brand" href="inicio.php">
				<img src="../img/logo.png" alt="" width="50px">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">

					<li class="nav-item active">
						<a class="nav-link" href="inicio.php"> <span class="fas fa-home"></span> Inicio
							<span class="sr-only">(current)</span>
						</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> <span class="fas fa-clipboard"></span> Administrar unidad</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="encargado.php"><span class="fas fa-user-check"></span> Encargado</a>
							<a class="dropdown-item" href="unidad.php"><span class="fas fa-address-card"></span> Unidad</a>
						</div>
					</li>

					
					<?php if($idNivel==1):?>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> <span class="fas fa-clipboard"></span> Mantenimiento y estado</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="tipoMantenimiento.php"> <span class="fas fa-edit"></span> Tipo mantenimiento</a>
							<a class="dropdown-item" href="estado.php"> <span class="fab fa-steam-symbol"></span> Estado</a>
						</div>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="usuario.php"> <span class="fas fa-users-cog"></span> Usuario</a>
					</li>

					<?php endif;?>

					<li class="nav-item">
						<a class="nav-link" href="equipo.php"> <span class="fas fa-star"></span> Equipo</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="mantenimiento.php"> <span class="fas fa-screwdriver"></span> Mantenimiento</a>
					</li>
					
					<!--
					<li class="nav-item">
						<a class="nav-link" href="historial.php"> <span class="fas fa-file">Historial</span></a>
					</li>
					-->

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> <span class="fas fa-clipboard"></span> Usuario: <?php echo $_SESSION['usuario']; ?> </a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="" data-toggle="modal" data-target="#modalActualizarUsuarioP" class="" onclick="agregaDatosUsuarioP('<?php echo $idUsuario; ?>')" style="color: blue">  <span class="fas fa-users-cog"></span> Administrar usuario</a>
							<?php if($idNivel==2):?>
							<a class="dropdown-item" href="" data-toggle="modal" data-target="#modalAsistencia" class="" onclick="agregaAsistencia('<?php echo $idUsuario; ?>')" style="color: black">  <span class="fas fa-smile-beam"></span> Registrar entrada y salida</a>
							<?php endif;?>
							<a class="dropdown-item" href="../procesos/usuario/salir.php" style="color: red"><span class="fas fa-power-off"></span> Salir</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		
<!-- Modal -->
<div class="modal fade" id="modalActualizarUsuarioP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizaUsuarioP" method="post" onsubmit="return btnActualizaUsuarioP()" >
			  	<input type="text" hidden="" id="idUsuarioP" name="idUsuarioP">
				<label>Nombre</label>
				<input type="text" name="nombreP" id="nombreP" class="form-control" required="">
				<label>Apellido</label>
				<input type="text" name="apellidoP" id="apellidoP" class="form-control" required="">
				<label>Carnet</label>
				<input type="text" name="carnetP" id="carnetP" class="form-control" required="">
				<label>Dirección</label>
				<input type="text" name="direccionP" id="direccionP" class="form-control" required="">
				<label>Email o correo</label>
				<input type="email" name="correoP" id="correoP" class="form-control" required="">
				<label>Celular</label>
				<input type="text" name="celularP" id="celularP" class="form-control" required="">
				<label>Usuario</label>
				<input type="text" name="usuarioP" id="usuarioP" class="form-control" required="">
				<label>Nueva contraseña</label>
				<input type="password" name="passwordP" id="passwordP" class="form-control" required="">
				<br>
				<div class="row">
					<div class="col-sm-6 text-left" >
						<button class="btn btn-primary">Registrar</button>
					</div>
					<div class="col-sm-6 text-right">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
      		</form>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar entrada y/o salida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmAsistencia" method="post" onsubmit="return btnAsistencia()" >
			  	<input readonly="" type="text" hidden="" id="idUsuarioA" name="idUsuarioA">
				<label>Nombre</label>
				<input readonly="" type="text" name="nombreA" id="nombreA" class="form-control" required="">
				<label>Apellido</label>
				<input readonly="" type="text" name="apellidoA" id="apellidoA" class="form-control" required="">
				<label>Carnet</label>
				<input readonly="" type="text" name="carnetA" id="carnetA" class="form-control" required="">
				<label>Fecha</label>
				<input readonly="" type="text" name="fechaA" id="fechaA" class="form-control" required="">
				<br>
				<div class="row">
					<div class="col-sm-6 text-left" >
						<button class="btn btn-primary">Registrar</button>
					</div>
					<div class="col-sm-6 text-right">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
      		</form>
      </div>
     
    </div>
  </div>
</div>

	</nav>