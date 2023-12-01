<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
?>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Equipo</h1>
			<?php if($idNivel==1):?>
		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaEquipo">
		    			 <span class="fas fa-plus-circle"></span> Agregar nuevo equipo
		    		</span>
		    	</div>
		    </div>
			<?php endif;?>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			<div id="tablaEquipo"></div>
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEquipo">
        	<label>Nombre</label>
        	<input type="text" name="nombre" id="nombre" class="form-control" required="">
			<label>Estado de equipo</label>
				<select name="estado" id="estado" class="form-control">
				<option>Seleccionar el estado</acceso>
					<?php require_once "../clases/Conexion.php"; 
						$c= new conectar();
						$conexion=$c->conexion();
						$sql="SELECT *
						from tipoEstado";
						$result=mysqli_query($conexion,$sql);
					?>
					<?php while($ver=mysqli_fetch_row($result)): ?>
					<option value="<?php echo $ver[0];?>"> <?php echo $ver[1];?></option>
					<?php endwhile; ?>
				</select>		
			<label>Marca</label>
        	<input type="text" name="marca" id="marca" class="form-control" required="">
			<label>Modelo</label>
        	<input type="text" name="modelo" id="modelo" class="form-control" required="">
			<label>Nro. de serie</label>
        	<input type="text" name="serie" id="serie" class="form-control" required="">
			<label>Nro. inventario</label>
        	<input type="text" name="inventario" id="inventario" class="form-control" required="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarEquipo">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalActualizarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizaEquipo">
      			<input type="text" id="idEquipoU" name="idEquipoU" hidden="">
				<label>Nombre</label>
				<input type="text" name="nombreU" id="nombreU" class="form-control" required="">
				<label>Estado de equipo</label>
					<select name="estadoU" id="estadoU" class="form-control">
					<option>Seleccionar el estado</acceso>
						<?php require_once "../clases/Conexion.php"; 
							$c= new conectar();
							$conexion=$c->conexion();
							$sql="SELECT *
							from tipoEstado";
							$result=mysqli_query($conexion,$sql);
						?>
						<?php while($ver=mysqli_fetch_row($result)): ?>
						<option value="<?php echo $ver[0];?>"> <?php echo $ver[1];?></option>
						<?php endwhile; ?>
					</select>		
				<br>
				<label>Marca</label>
				<input type="text" name="marcaU" id="marcaU" class="form-control" required="">
				<label>Modelo</label>
				<input type="text" name="modeloU" id="modeloU" class="form-control" required="">
				<label>Nro. de serie</label>
				<input type="text" name="serieU" id="serieU" class="form-control" required="">
				<label>Nro. inventario</label>
				<input type="text" name="inventarioU" id="inventarioU" class="form-control" required="">
      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateEquipo">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaEquipo">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php
		include "footer.php"; 
?>
	<!--Dependencia de categorias, todas las funciones js de categorias-->
	<script src="../js/equipo.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaEquipo').load("equipo/tablaEquipo.php");

			$('#btnGuardarEquipo').click(function(){
				agregarEquipo();
			});

			$('#btnActualizaEquipo').click(function(){
				actualizaEquipo();
			});
		});
	</script>
<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>