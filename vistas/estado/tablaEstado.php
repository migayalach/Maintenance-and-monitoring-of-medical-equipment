<?php session_start();
	require_once "../../clases/Conexion.php";
	//$idUsuario = $_SESSION['idUsuario'];
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaTipoEDataTable">
		<thead>
			<tr style="text-align: center;">
				<td>Nombre</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT *
					FROM tipoEstado"; 
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$idTipoE = $mostrar['idTipoEstado'];
		?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar['estadoGarantia']; ?></td>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosEstado('<?php echo $idTipoE ?>')"
						data-toggle="modal" data-target="#modalActualizarTipoE">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
							onclick="eliminarTipoE('<?php echo $idTipoE ?>')" >
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
		$('#tablaTipoEDataTable').DataTable();
	});
</script>