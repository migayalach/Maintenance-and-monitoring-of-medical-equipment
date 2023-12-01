<?php 
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	
	$sql="SELECT n.tipo
		  FROM nivel n, usuario u
		  WHERE n.idNivel=u.idNivel and n.tipo like '%Administrador%'";
	$result=mysqli_query($conexion,$sql);
	
	//ENTRADA A REGISTRO
	$validar=0;
	if(mysqli_num_rows($result) > 0)
		header("location:index.php");	
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="icon" href="img/logo.ico">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
</head>
<body>
	<div class="container">
		<h1 style="text-align: center;">Registro de usuario</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" 
				autocomplete="off">
					<label>Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">
					<label>Apellido</label>
					<input type="text" name="apellido" id="apellido" class="form-control" required="">
					<label>Carnet</label>
					<input type="text" name="carnet" id="carnet" class="form-control" required="">
					<label>Dirección</label>
					<input type="text" name="direccion" id="direccion" class="form-control" required="">
					<label>Email o correo</label>
					<input type="email" name="correo" id="correo" class="form-control" required="">
					<label>Celular</label>
					<input type="text" name="celular" id="celular" class="form-control" required="">
					<label>Nombre de usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">
					<label>Password o contraseña</label>
					<input type="password" name="password" id="password" class="form-control" required="">
					<label>Nivel de acceso</label>
						<select name="nivel" id="nivel" class="form-control" required="">
						<option>Seleccionar tipo de acceso</option>
							<?php
							require_once "clases/Conexion.php";
							$obj= new conectar();
							$conexion=$obj->conexion();
								
							$sql="SELECT *
   								  FROM nivel
								  WHERE tipo like '%Ad%' or tipo like '%Es%' or tipo like '%Vis%'";
							$result=mysqli_query($conexion,$sql);
							?>
							<?php while($ver=mysqli_fetch_row($result)): ?>
							<option value="<?php echo $ver[0];?>"> <?php echo $ver[1];?></option>
							<?php endwhile; ?>
						</select>		
					<br>
					<div class="row">
						<div class="col-sm-6 text-left" >
							<button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-right">
							<a href="index.php" class="btn btn-success">Login</a>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<script src="librerias/jquery-3.4.1.min.js"></script>
	<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>
	
	<script type="text/javascript">
		$(function() {
		    var fechaA = new Date();
		    var yyyy = fechaA.getFullYear();

		    $("#fechaNacimiento").datepicker({
		        changeMonth: true,
		        changeYear: true,
		        yearRange: '1900:' + yyyy,
		        dateFormat: "dd-mm-yy"
		    });
		});


		function agregarUsuarioNuevo() {
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){

					respuesta = respuesta.trim();
					//console.log(respuesta);
					if (respuesta == 1) {
						$("#frmRegistro")[0].reset();
						swal(":D", "Agregado con exito!", "success");
					} 
					else if(respuesta == 2){
						swal("Este usuario ya existe, por favor escribe otro !!!");
					} 
					else {
						swal(":(", "Fallo al agregar!", "error");
					}
				}
			});

			return false;
		}
	</script>
</body>
</html>