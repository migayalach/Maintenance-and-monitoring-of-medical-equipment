<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
		$idNivel=($_SESSION['idNivel']);
?>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Unidad</h1>
			<?php if($idNivel==1):?>
		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaUnidad">
		    			 <span class="fas fa-plus-circle"></span> Agregar nueva unidad
		    		</span>
		    	</div>
		    </div>
			<?php endif;?>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			<div id="tablaUnidad"></div>
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva unidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmUnidad">
			<label>Nombre de unidad</label>
			<input type="text" class="form-control input-sm" name="nombre" id="nombre">
			<?php require_once "../clases/Conexion.php"; 
				$c= new conectar();
				$conexion=$c->conexion();
				$sql="SELECT *
					  from equipo";
				$result=mysqli_query($conexion,$sql);
			?>
			<label>Equipo</label>
				<select class="form-control input-sm" id="idEquipo" name="idEquipo">
					<option value="A">Selecciona Equipo</option>
					<?php while($ver=mysqli_fetch_row($result)): ?>
						<option value="<?php echo $ver[0];?>"> <?php echo $ver[2]?></option>
					<?php 
					endwhile;?>	
				</select>
			<?php 
				$sql="SELECT *
				  	  from encargadoUnidad";
				$result=mysqli_query($conexion,$sql);
			?>
			<label>Encargado de unidad</label>
				<select class="form-control input-sm" id="idEncargado" name="idEncargado">
					<option value="A">Selecciona Encargado</option>
					<?php while($ver=mysqli_fetch_row($result)): ?>
						<option value="<?php echo $ver[0];?>"> <?php echo $ver[1]?></option>
					<?php 
					endwhile;?>	
				</select>
			<p></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarUnidad">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalActualizarUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar unidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizaUnidad">
				<input type="text" hidden="" id="idUnidadU" name="idUnidadU">
				<label>Nombre de unidad</label>
				<input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
					<?php require_once "../clases/Conexion.php"; 
						$c= new conectar();
						$conexion=$c->conexion();
						$sql="SELECT *
							  from equipo";
						$result=mysqli_query($conexion,$sql);
					?>
				<label>Equipo</label>
					<select class="form-control input-sm" id="idEquipoU" name="idEquipoU">
						<option value="A">Selecciona Equipo</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0];?>"> <?php echo $ver[2]?></option>
							<?php 
							endwhile;?>	
					</select>
						<?php 
							$sql="SELECT *
								  from encargadoUnidad";
							$result=mysqli_query($conexion,$sql);
						?>
				<label>Encargado de unidad</label>
					<select class="form-control input-sm" id="idEncargadoU" name="idEncargadoU">
						<option value="A">Selecciona Encargado</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
						<option value="<?php echo $ver[0];?>"> <?php echo $ver[1]?></option>
						<?php 
						endwhile;?>	
					</select>
				<label>Marca</label>
				<input readonly="" type="text" class="form-control input-sm" name="marcaU" id="marcaU">
				<label>Modelo</label>
				<input readonly="" type="text" class="form-control input-sm" name="modeloU" id="modeloU">
				<label>Nro. de serie</label>
				<input readonly="" type="text" class="form-control input-sm" name="serieU" id="serieU">
				<label>Nro. de inventario</label>
				<input readonly="" type="text" class="form-control input-sm" name="inventarioU" id="inventarioU">
				<p></p>
      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateUnidad">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaUnidad">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php
		include "footer.php"; 
?>
	<!--Dependencia de categorias, todas las funciones js de categorias-->
	<script src="../js/unidad.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaUnidad').load("unidad/tablaUnidad.php");

			$('#btnGuardarUnidad').click(function(){
				agregarUnidad();
			});

			$('#btnActualizaUnidad').click(function(){
				actualizaUnidad();
			});

			$('#idEquipoU').change(function(){
				actualizarDatos();
			});

		});
	</script>
<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>