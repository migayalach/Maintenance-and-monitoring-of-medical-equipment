<?php session_start();
if (isset($_SESSION['usuario']))
{
	include "header.php";
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="text-align: center;">
				<div class="jumbotron">
					<h1 class="display-4">Mantenimientos programados</h1>
					<div class="col-sm-12">
						<div id="tablaMantenimientoProgramado"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	include "footer.php"; 
} else {
	session_destroy();
	header("location:../index.php");
}
?>

<!-- Modal -->
<div class="modal fade" id="modalActualizarMantenimientoP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir informe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form id="frmSubirInformeU" enctype="multipart/form-data">
			<input type="text" hidden="" id="idMantenimientoU" name="idMantenimientoU">
			<input type="text" hidden="" id="idTipoMantenimientoU" name="idTipoMantenimientoU">
			<input type="text" hidden="" id="idEquipoU" name="idEquipoU">
			<label>Tipo de mantenimiento</label>
			<input readonly="" type="text" class="form-control input-sm" id="nombreMantenimientoU" name="nombreMantenimientoU" required=""> 
			<label>Equipo y Unidad</label>
			<input readonly="" type="text" class="form-control input-sm" id="nombreEquipoU" name="nombreEquipoU">
			<label>Marca</label>
			<input readonly="" type="text" class="form-control input-sm" id="marcaU" name="marcaU">
			<label>Modelo</label>
			<input readonly="" type="text" class="form-control input-sm" id="modeloU" name="modeloU">
			<label>Nro. de serie</label>
			<input readonly="" type="text" class="form-control input-sm" id="serieU" name="serieU">
			<label>Nro. de inventario</label>
			<input readonly="" type="text" class="form-control input-sm" id="inventarioU" name="inventarioU">
			<label>Fecha de programación</label>
			<input readonly="" class="form-control input-sm" id="fechaU" name="fechaU">
			<label>Estado</label>
			<input readonly="" type="text" class="form-control input-sm" id="estadoU" name="estadoU">
			<label>Numero de Reporte</label>
			<input readonly="" type="text" class="form-control input-sm" id="documentoU" name="documentoU">	
			<label>Selecciona archivos</label>
			<input type="file" name="archivos[]" id="archivos" class="form-control" multiple="multiple">
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateMantenimientoP">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaMantenimientoProgramado">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/gestor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaMantenimientoProgramado').load("mantenimientoProgramado/tablaMantenimientoProgramado.php");
		$('#btnActualizaMantenimientoProgramado').click(function(){
			agregarArchivosGestor();
		});
	});
</script>

<script type="text/javascript">
	function obtenerDatosMantenimientoP(idMantenimiento,idTipoMantenimiento,idEquipo,fecha,marca,modelo,serie,inventario,estado,nombreMantenimiento,nombreEquipo, documento)
	{
		$('#idMantenimientoU').val(idMantenimiento);
		$('#idTipoMantenimientoU').val(idTipoMantenimiento);
		$('#idEquipoU').val(idEquipo);
		$('#marcaU').val(marca);
		$('#modeloU').val(modelo);
		$('#serieU').val(serie);
		$('#inventarioU').val(inventario);
		$('#fechaU').val(fecha);
		$('#estadoU').val(estado);
		$('#nombreMantenimientoU').val(nombreMantenimiento);
		$('#nombreEquipoU').val(nombreEquipo);
		$('#documentoU').val(documento);
}
</script>
