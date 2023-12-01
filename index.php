<?php 	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * 
		  from nivel n, usuario c
		  where n.idNivel=c.idNivel and n.tipo like'%Administrador%'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0)
		$validar=1;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="icon" href="img/logo.ico">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
</head>
<body>
	<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <p></p>
      <img src="img/logo.png" class="img-thumbnail" width="80px" id="icon" alt="User Icon" />
      <h1>Electromedicina</h1>
    </div>

    <!-- Login Form -->
    <form method="post" id="frmLogin" onsubmit="return logear()">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario" required="">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required="">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <?php  if(!$validar): ?>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="registro.php">Registrar</a>
    </div>
    <?php endif; ?>
  </div>
</div>

<script src="librerias/jquery-3.4.1.min.js"></script>
<script src="librerias/sweetalert.min.js"></script>
  
 <script type="text/javascript">
   function logear(){
        $.ajax({
            type:"POST",
            data:$('#frmLogin').serialize(),
            url:"procesos/usuario/login/login.php",
            success:function(respuesta) {
               
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    window.location = "vistas/inicio.php";
                } else {
                    swal(":(", "Fallo al entrar!", "error");
                }
            }
        });

        return false;
   }
 </script>

</body>
</html>