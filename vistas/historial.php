<?php 
	session_start();
	if (isset($_SESSION['usuario'])) {
		include "header.php";
		$idNivel=($_SESSION['idNivel']);
?>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	  		<h1>Historial :D</h1>
				<div id="buscador"></div>
				<div id="tablaHistorial"></div>	
		</div>	
	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaHistorial').load("historial/tablaHistorial.php");
			$('#buscador').load('historial/buscador.php');
		});
	</script>
		
<?php
		include "footer.php"; 
?>

<?php 		
	} else {
		session_destroy();
		header("location:../index.php");
	}
?>