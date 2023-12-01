<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
?>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Tipo de estado</h1>

		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaEstado">
		    			 <span class="fas fa-plus-circle"></span> Agregar nuevo tipo de estado
		    		</span>
		    	</div>
		    </div>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			<div id="tablaEstado"></div>
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo tipo de estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEstado">
        	<label>Nombre de estado</label>
        	<input type="text" name="nombreEstado" id="nombreEstado" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarEstado">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalActualizarTipoE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar tipo de estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizaEstadoU">
      			<input type="text" id="idTipoE" name="idTipoE" hidden="">
	        	<label>Estado</label>
	        	<input type="text" id="estadoU" name="estadoU" class="form-control">
      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateTipoE">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaEstado">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php
		include "footer.php"; 
?>
	<!--Dependencia de categorias, todas las funciones js de categorias-->
	<script src="../js/estado.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaEstado').load("estado/tablaEstado.php");

			$('#btnGuardarEstado').click(function(){
				agregarEstado();
			});

			$('#btnActualizaEstado').click(function(){
				actualizaEstado();
			});
		});
	</script>
<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>