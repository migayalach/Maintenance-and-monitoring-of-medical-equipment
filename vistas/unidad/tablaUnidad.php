<?php session_start();
	require_once "../../clases/Conexion.php";
	//$idUsuario = $_SESSION['idUsuario'];
	$idNivel=($_SESSION['idNivel']);
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaUnidadDataTable">
		<thead>
			<tr style="text-align: center;">
				<td>Unidad</td>
				<td>Encargado</td>
				<td>Equipo</td>
				<td>Marca</td>
				<td>Modelo</td>
				<td>Nro. de serie</td>
				<td>Nro. de inventario</td>
				<?php if($idNivel==1):?>
				<td>Editar</td>
				<td>Eliminar</td>
				<?php endif;?>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql="SELECT u.idUnidad, e.idEncargado, eq.idEquipo, u.nombre, e.nombre, eq.nombre, eq.marca, eq.modelo, eq.nroSerie, eq.nroInventario
				  FROM unidad u, encargadoUnidad e, equipo eq
				  WHERE eq.idEquipo=u.idEquipo and e.idEncargado=u.idEncargado";
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$idUnidad = $mostrar['idUnidad'];
		?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar[3]; ?></td>
				<td><?php echo $mostrar[4]; ?></td>
				<td><?php echo $mostrar['nombre']; ?></td>
				<td><?php echo $mostrar['marca']; ?></td>
				<td><?php echo $mostrar['modelo']; ?></td>
				<td><?php echo $mostrar['nroSerie']; ?></td>
				<td><?php echo $mostrar['nroInventario']; ?></td>
				<?php if($idNivel==1):?>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosUnidad('<?php echo $idUnidad ?>')"
						data-toggle="modal" data-target="#modalActualizarUnidad">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
							onclick="eliminarUnidad('<?php echo $idUnidad ?>')" >
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
		$('#tablaUnidadDataTable').DataTable();
	});
</script>