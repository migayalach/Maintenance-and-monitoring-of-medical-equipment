<?php 
require_once "../../clases/Conexion.php";
$c= new conectar();
$conexion=$c->conexion();
?>

<h4>Asignar mantenimiento</h4>
<div class="row bg-dark">
	<div class="col-sm-3 text-white">
		<form id="frmMantenimiento">
			<p></p>
			<label>Seleciona un tipo de mantenimiento</label>
			<select class="form-control input-sm" id="idTipoM" name="idTipoM">
				<option value="A">Selecciona</option>
				<!--<option value="0">Sin cliente</option>-->
				<?php
				$sql="SELECT *
				from tipoMantenimiento";
				$result=mysqli_query($conexion,$sql);
				while ($cliente=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?></option>
				<?php endwhile; ?>
			</select>
			
			<label>Equipo y Unidad</label>
			<select class="form-control input-sm" id="idEquipoM" name="idEquipoM">
				<option value="A">Selecciona</option>
				<?php
				$sql="SELECT e.idEquipo, e.nombre, u.nombre
					  FROM equipo e, unidad u
					  WHERE e.idEquipo=u.idEquipo";
				$result=mysqli_query($conexion,$sql);

				while ($producto=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $producto[0] ?>"><?php echo $producto[1]." - ".$producto[2]?></option>
				<?php endwhile; ?>
			</select>
			
			<label>Marca</label>
			<input readonly="" type="text" class="form-control input-sm" id="marca" name="marca">
			<label>Modelo</label>
			<input readonly="" type="text" class="form-control input-sm" id="modelo" name="modelo">
			<label>Nro. de serie</label>
			<input readonly="" type="text" class="form-control input-sm" id="serie" name="serie">
			<label>Nro. de inventario</label>
			<input readonly="" type="text" class="form-control input-sm" id="inventario" name="inventario">
		
			<label>Fecha de programación</label>
			<input type="date" class="form-control input-sm" id="fecha" name="fecha">
			<label>Nro de reporte</label>
			<input type="text" class="form-control input-sm" id="nroDocumento" name="nroDocumento">	
			<p></p>
			
			<div class="row">
				<div class="col-sm-6 text-left" >
					<span class="btn btn-primary" id="btnAgregaMantenimiento">Agregar</span>
				</div>
				<div class="col-sm-6 text-right">
					<span class="btn btn-danger" id="btnVaciarMantenimiento">Cancelar</span>
				</div>
			</div>
		</form>
		<br>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalActualizarMantenimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Reprogramar mantenimiento</h4>
				<button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				</div>
				<div class="modal-body">
				<form id="frmActualizaManteniniemtoU">
					<input type="text" hidden="" id="idMantenimientoU" name="idMantenimientoU">
					<label>Seleciona un tipo de mantenimiento</label>
					<select class="form-control input-sm" id="idTipoMantenimientoU" name="idTipoMantenimientoU">
						<option value="A">Selecciona</option>
						<!--<option value="0">Sin cliente</option>-->
						<?php
						$sql="SELECT *
						from tipoMantenimiento";
						$result=mysqli_query($conexion,$sql);
						while ($cliente=mysqli_fetch_row($result)):
							?>
							<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?></option>
						<?php endwhile; ?>
					</select>
					
					<label>Equipo y Unidad</label>
					<select class="form-control input-sm" id="idUnidadU" name="idUnidadU">
						<option value="A">Selecciona</option>
						<?php
						$sql="SELECT e.idEquipo, e.nombre, u.nombre
							FROM equipo e, unidad u
							WHERE e.idEquipo=u.idEquipo";
						$result=mysqli_query($conexion,$sql);

						while ($producto=mysqli_fetch_row($result)):
							?>
							<option value="<?php echo $producto[0] ?>"><?php echo $producto[1]." - ".$producto[2]?></option>
						<?php endwhile; ?>
					</select>
					
					<label>Marca</label>
					<input readonly="" type="text" class="form-control input-sm" id="marcaU" name="marcaU">
					<label>Modelo</label>
					<input readonly="" type="text" class="form-control input-sm" id="modeloU" name="modeloU">
					<label>Nro. de serie</label>
					<input readonly="" type="text" class="form-control input-sm" id="serieU" name="serieU">
					<label>Nro. de inventario</label>
					<input readonly="" type="text" class="form-control input-sm" id="inventarioU" name="inventarioU">
				
					<label>Fecha de programación</label>
					<input type="date" class="form-control input-sm" id="fechaU" name="fechaU">
					<label>Nro de documento</label>
					<input type="text" class="form-control input-sm" id="documentoU" name="documentoU">	
				</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpdateMantenimiento">Cerrar</button>
					<button id="btnActualizaMantenimiento" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
				</div>
			</div>
		</div>
	</div>	


	<div class="col-sm-9 text-white">
		<h2>Mantenimientos Programados</h2>
		<div id="tablaMantenimiento"></div>
	</div>
</div>

<script src="../js/mantenimiento.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaMantenimiento').load("mantenimiento/tablaMantenimiento.php");

		$('#btnAgregaMantenimiento').click(function(){
			agregarMantenimiento();
		});

		$('#btnActualizaMantenimiento').click(function(){
			actualizaMantenimiento();
		});

		$('#idEquipoM').change(function(){
			mostrar();
		});

		$('#idUnidadU').change(function(){
			mostrarU();
		});
	});
</script>