<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
		$idNivel=($_SESSION['idNivel']);
?>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
		    <h1 class="display-4">Mantenimiento de equipos</h1>
		    <div class="row">
		    	<div class="col-sm-12">
					<?php if($idNivel==1):?>
		    		<span class="btn btn-primary" id="asiganarMantenimiento"> Asignar mantenimiento </span>
					<?php endif;?>
					<span class="btn btn-primary" id="MantenimientoRealizados"> Mantenimientos hechos </span>
		    	</div>
		    </div>
			<div class="row">
				<div class="col-sm-12">
					<div id="asignarM"></div>
					<div id="realizados"></div>
				</div>
			</div>
	  </div>
	</div>


		
<?php
		include "footer.php"; 
?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#asiganarMantenimiento').click(function(){
				esconderMantenimiento();
				$('#asignarM').load('mantenimiento/asignarMantenimiento.php');
				$('#asignarM').show();
			});

			$('#MantenimientoRealizados').click(function(){
				esconderMantenimiento();
				$('#realizados').load('mantenimiento/RealizadoyReportes.php');
				$('#realizados').show();
			});
		});

		function esconderMantenimiento(){
			$('#asignarM').hide();
			$('#realizados').hide();
		}

	</script>

<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>