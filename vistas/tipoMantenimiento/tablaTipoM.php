<?php session_start();
	require_once "../../clases/Conexion.php";
	//$idUsuario = $_SESSION['idUsuario'];
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaTipoMDataTable">
		<thead>
			<tr style="text-align: center;">
				<td>Nombre</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT idTipoMantenimiento,
						   nombre
					FROM tipoMantenimiento
					ORDER BY idTipoMantenimiento DESC"; 
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$idTipoM = $mostrar['idTipoMantenimiento'];
		?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar['nombre']; ?></td>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosTipoM('<?php echo $idTipoM ?>')"
						data-toggle="modal" data-target="#modalActualizarTipoM">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
							onclick="eliminarTipoM('<?php echo $idTipoM ?>')" >
						<span class="fas fa-trash-alt"></span>
					</span>
				</td>
			</tr>
		<?php
			} 
		 ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaTipoMDataTable').DataTable();
	});
</script>