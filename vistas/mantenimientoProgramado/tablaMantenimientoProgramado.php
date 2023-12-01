<?php session_start();
	require_once "../../clases/Conexion.php";
	$idUsuario = $_SESSION['idUsuario'];
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaMantenimientoPDataTable">
		<thead>
			<tr style="text-align: center;">
			<td>Fecha programada</td>
			<td>Tipo de mantenimiento</td>
			<td>Unidad</td>
			<td>Equipo</td>
			<td>Marca</td>
			<td>Modelo</td>
			<td>Nro. serie</td>
			<td>Nro. inventario</td>
			<td>Estado</td>
			<td>Nro. documento</td>
			<td>Realizar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT 	m.idMantenimiento, 		
						   	m.idTipoMantenimiento, 	
						   	m.idEquipo, 				
		 				   	m.fechaMantenimiento, 		
						   	t.nombre, 
						   	u.nombre, 
						   	e.nombre, 				
							e.marca, 
							e.modelo, 
							e.nroSerie, 
							e.nroInventario, 
							x.estadoGarantia, 
							m.nroDocumento
					 FROM mantenimiento m, equipo e, unidad u, tipoMantenimiento t, tipoEstado X
					 WHERE t.idTipoMantenimiento=m.idTipoMantenimiento and e.idEquipo=m.idEquipo and e.idEquipo=u.idEquipo and e.idTipoEstado=x.idTipoEstado and m.hecho like '%F%'
					 ORDER BY m.fechaMantenimiento ASC"; 
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$idMantenimiento = $mostrar[0];
				$dato=(($mostrar[6]." - ".$mostrar[5]));
		?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar[3]; ?></td>
				<td><?php echo $mostrar[4]; ?></td>
				<td><?php echo $mostrar[5]; ?></td>
				<td><?php echo $mostrar[6]; ?></td>
				<td><?php echo $mostrar[7]; ?></td>
				<td><?php echo $mostrar[8]; ?></td>
				<td><?php echo $mostrar[9]; ?></td>
				<td><?php echo $mostrar[10]; ?></td>
				<td><?php echo $mostrar[11]; ?></td>
				<td><?php echo $mostrar[12]; ?></td>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosMantenimientoP('<?php echo $mostrar[0]?>',
															'<?php echo $mostrar[1]?>',
															'<?php echo $mostrar[2]?>',
															'<?php echo $mostrar[3]?>',
															'<?php echo $mostrar[7]?>',
															'<?php echo $mostrar[8]?>',
															'<?php echo $mostrar[9]?>',
															'<?php echo $mostrar[10]?>',
															'<?php echo $mostrar[11]?>',
															'<?php echo $mostrar[4]?>',
															'<?php echo $dato?>',
															'<?php echo $mostrar[12]?>')"
						data-toggle="modal" data-target="#modalActualizarMantenimientoP">
						<span class="fas fa-edit"></span>
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
		$('#tablaMantenimientoPDataTable').DataTable();
	});
</script>