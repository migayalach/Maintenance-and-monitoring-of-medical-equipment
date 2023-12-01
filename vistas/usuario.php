<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
?>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Administrar Usuarios</h1>

		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaUsuario">
		    			 <span class="fas fa-plus-circle"></span> Agregar nuevo usuario
		    		</span>
		    	</div>
		    </div>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			<div id="tablaUsuario"></div>
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmUsuario">
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
			<label>Nivel de acceso</label>
			<select name="nivel" id="nivel" class="form-control">
				<option>Seleccionar el estado</option>
				<?php require_once "../clases/Conexion.php"; 
					$c= new conectar();
					$conexion=$c->conexion();
					$sql="SELECT *
				 		  from nivel";
					$result=mysqli_query($conexion,$sql);
				?>
				<?php while($ver=mysqli_fetch_row($result)): ?>
				<option value="<?php echo $ver[0];?>"> <?php echo $ver[1];?></option>
				<?php endwhile; ?>
			</select>	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarUsuario">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizaUsuario">
			  	<input type="text" hidden="" id="idUsuarioU" name="idUsuarioU">
				<label>Nombre</label>
				<input type="text" name="nombreU" id="nombreU" class="form-control" required="">
				<label>Apellido</label>
				<input type="text" name="apellidoU" id="apellidoU" class="form-control" required="">
				<label>Carnet</label>
				<input type="text" name="carnetU" id="carnetU" class="form-control" required="">
				<label>Dirección</label>
				<input type="text" name="direccionU" id="direccionU" class="form-control" required="">
				<label>Email o correo</label>
				<input type="email" name="correoU" id="correoU" class="form-control" required="">
				<label>Celular</label>
				<input type="text" name="celularU" id="celularU" class="form-control" required="">
				<label>Nivel de acceso</label>
				<select name="nivelU" id="nivelU" class="form-control">
					<option>Seleccionar el estado</option>
					<?php require_once "../clases/Conexion.php"; 
						$c= new conectar();
						$conexion=$c->conexion();
						$sql="SELECT *
							from nivel";
						$result=mysqli_query($conexion,$sql);
					?>
					<?php while($ver=mysqli_fetch_row($result)): ?>
					<option value="<?php echo $ver[0];?>"> <?php echo $ver[1];?></option>
					<?php endwhile; ?>
				</select>
      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateUsuario">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaUsuario">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php
		include "footer.php"; 
?>
	<!--Dependencia de categorias, todas las funciones js de categorias-->
	<script src="../js/usuario.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaUsuario').load("usuario/tablaUsuario.php");

			$('#btnGuardarUsuario').click(function(){
				agregarUsuario();
			});

			$('#btnActualizaUsuario').click(function(){
				actualizaUsuario();
			});
		});
	</script>
<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>