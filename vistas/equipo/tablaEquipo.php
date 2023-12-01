<?php session_start();
	require_once "../../clases/Conexion.php";
	//$idUsuario = $_SESSION['idUsuario'];
	$idNivel=($_SESSION['idNivel']);
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaEquipoDataTable">
		<thead>
			<tr style="text-align: center;">
				<td>Estado equipo</td>
				<td>Nombre</td>
				<td>Marca</td>
				<td>Modelo</td>
				<td>Nro. de serie</td>
				<td>Nro. de inventario</td>
				<td>Fecha</td>
				<?php if($idNivel==1):?>
				<td>Editar</td>
				<td>Eliminar</td>
				<?php endif;?>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT e.idEquipo, t.estadoGarantia, e.nombre, e.marca, e.modelo, e.nroSerie, e.nroInventario, e.fechaEquipo
					FROM equipo e, tipoEstado t
					WHERE e.idTipoEstado=t.idTipoEstado"; 
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$idEquipo = $mostrar['idEquipo'];
		?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar['estadoGarantia']; ?></td>
				<td><?php echo $mostrar['nombre']; ?></td>
				<td><?php echo $mostrar['marca']; ?></td>
				<td><?php echo $mostrar['modelo']; ?></td>
				<td><?php echo $mostrar['nroSerie']; ?></td>
				<td><?php echo $mostrar['nroInventario']; ?></td>
				<td><?php echo $mostrar['fechaEquipo']; ?></td>
				<?php if($idNivel==1):?>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosEquipo('<?php echo $idEquipo ?>')"
						data-toggle="modal" data-target="#modalActualizarEquipo">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
							onclick="eliminarEquipo('<?php echo $idEquipo ?>')" >
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
		$('#tablaEquipoDataTable').DataTable();
	});
</script>