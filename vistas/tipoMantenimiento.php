<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
?>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Tipo de mantenimiento</h1>

		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaTipoM">
		    			 <span class="fas fa-plus-circle"></span> Agregar nuevo tipo de mantenimiento
		    		</span>
		    	</div>
		    </div>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			<div id="tablaTipoM"></div>
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaTipoM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo tipo de mantenimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmTipoM">
        	<label>Nombre del mantenimiento</label>
        	<input type="text" name="nombreTipoM" id="nombreTipoM" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarTipoM">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalActualizarTipoM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar tipo de mantenimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizaTipoM">
      			<input type="text" id="idTipoM" name="idTipoM" hidden="">
	        	<label>Categoria</label>
	        	<input type="text" id="tipoMU" name="tipoMU" class="form-control">
      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateTipoM">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaTipoM">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php
		include "footer.php"; 
?>
	<!--Dependencia de categorias, todas las funciones js de categorias-->
	<script src="../js/tipoMantenimiento.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaTipoM').load("tipoMantenimiento/tablaTipoM.php");

			$('#btnGuardarTipoM').click(function(){
				agregarTipoM();
			});

			$('#btnActualizaTipoM').click(function(){
				actualizaTipoM();
			});
		});
	</script>
<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>