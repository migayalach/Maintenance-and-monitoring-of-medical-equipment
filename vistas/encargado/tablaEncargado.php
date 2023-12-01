<?php session_start();
	require_once "../../clases/Conexion.php";
	//$idUsuario = $_SESSION['idUsuario'];
	$idNivel=($_SESSION['idNivel']);
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaEncargadoDataTable">
		<thead>
			<tr style="text-align: center;">
				<td>Nombre</td>
				<td>Fecha de agregado</td>
				<?php if($idNivel==1):?>
				<td>Editar</td>
				<td>Eliminar</td>
				<?php endif;?>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT *
					FROM encargadoUnidad"; 
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){
				$idEncargado = $mostrar['idEncargado'];
		?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar['nombre']; ?></td>
				<td><?php echo $mostrar['fechaEncargado']; ?></td>
				<?php if($idNivel==1):?>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosEncargado('<?php echo $idEncargado ?>')"
						data-toggle="modal" data-target="#modalActualizarEncargado">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
							onclick="eliminarEncargado('<?php echo $idEncargado ?>')" >
						<span class="fas fa-trash-alt"></span>
					</span>
				</td>
				<?php endif;?>
			</tr>
		<?php
			} 
		 ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaEncargadoDataTable').DataTable();
	});
</script>