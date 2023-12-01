<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
?>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">Encargado de unidad</h1>

			<?php if($idNivel==1):?>
		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaEncargado">
		    			 <span class="fas fa-plus-circle"></span> Agregar nuevo encargado
		    		</span>
		    	</div>
		    </div>
			<?php endif;?>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			<div id="tablaEncargado"></div>
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaEncargado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo encargado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEncargado">
        	<label>Nombre del encargado</label>
        	<input type="text" name="nombreEncargado" id="nombreEncargado" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarEncargado">Guardar</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalActualizarEncargado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar encargado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizaEncargado">
      			<input type="text" id="idEncargado" name="idEncargado" hidden="">
	        	<label>Encargado</label>
	        	<input type="text" id="nombreU" name="nombreU" class="form-control">
      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateEncargado">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaEncargado">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<?php
		include "footer.php"; 
?>
	<!--Dependencia de categorias, todas las funciones js de categorias-->
	<script src="../js/encargado.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaEncargado').load("encargado/tablaEncargado.php");

			$('#btnGuardarEncargado').click(function(){
				agregarEncargado();
			});

			$('#btnActualizaEncargado').click(function(){
				actualizaEncargado();
			});
		});
	</script>
<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>