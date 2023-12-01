<?php session_start();
	$idNivel=($_SESSION['idNivel']);
	require_once "../../clases/Conexion.php";
	$c = new Conectar();
	$conexion = $c->conexion();
	$idUsuario = $_SESSION['idUsuario'];
	$sql = "SELECT m.idMantenimiento, m.fechaMantenimiento, t.nombre, u.nombre, e.nombre, e.marca, e.modelo, e.nroSerie, e.nroInventario , x.estadoGarantia, m.nroDocumento, a.idArchivo, a.nombre, a.tipo, a.ruta, a.fecha, o.nombre, o.apellido
			FROM mantenimiento m, equipo e, unidad u, tipoMantenimiento t, tipoEstado x, archivos a, usuario o
			WHERE t.idTipoMantenimiento=m.idTipoMantenimiento and e.idEquipo=m.idEquipo and e.idEquipo=u.idEquipo and a.idMantenimiento=m.idMantenimiento and e.idTipoEstado=x.idTipoEstado and o.idUsuario=a.idUsuario 
			ORDER BY m.fechaMantenimiento ASC";
	$result = mysqli_query($conexion, $sql);
?>

<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-dark" id="tablaGestorDataTable">
				<thead>
					<tr>
						<th>Fecha hecho</th>
						<th>Realizado</th>
						<th>Nombre de archivo</th>
						<th>Extensión archivo</th>
						<th>Descargar</th>
						<th>Visualizar</th>
						<?php if($idNivel==1):?>
						<th>Eliminar</th>
						<?php endif;?>
					</tr>
				</thead>
				<tbody>
				<?php 

					/*
						Arreglo de extensiones validas
					*/
				
					$extensionesValidas = array('png', 'jpg', 'pdf', 'mp3', 'mp4');

					while($mostrar = mysqli_fetch_array($result)) { 

						$rutaDescarga = "../archivos/".$idUsuario."/".$mostrar[12];
						$nombreArchivo = $mostrar[12];
						$idArchivo = $mostrar['idArchivo'];
				 ?>
					<tr>
						<?php $nombre=$mostrar[16]." ".$mostrar[17]?>
						<td><?php echo $mostrar['fechaMantenimiento']; ?></td>
						<td><?php echo $nombre; ?></td>
						<td><?php echo $mostrar[12]; ?></td>
						<td><?php echo $mostrar[13]; ?></td>
						<td>
							<a href="<?php echo $rutaDescarga; ?>" 
								download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
								<span class="fas fa-download"></span>
							</a>
						</td>
						<td>
							<?php 
								for ($i=0; $i < count($extensionesValidas); $i++) { 
									if ($extensionesValidas[$i] == $mostrar[13]) {
							?>
									<span class="btn btn-primary btn-sm" 
										  data-toggle="modal" 
										  data-target="#visualizarArchivo" 
										  onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
									<span class="fas fa-eye"></span>
							</span>
							<?php
									}
								}
							 ?>
						</td>
						<?php if($idNivel==1):?>
						<td>
							<span class="btn btn-danger btn-sm" 
									onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
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
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorDataTable').DataTable();
	});
</script>