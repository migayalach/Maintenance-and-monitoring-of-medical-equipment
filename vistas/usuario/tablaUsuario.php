<?php session_start();
	require_once "../../clases/Conexion.php";
	//$idUsuario = $_SESSION['idUsuario'];
	$conexion = new Conectar();
	$conexion = $conexion->conexion();
 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaUsuarioDataTable">
		<thead>
			<tr style="text-align: center;">
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Carnet</td>
				<td>Direccion</td>
				<td>Celular</td>
				<td>Correo</td>
				<td>Usuario</td>
				<td>Nivel de acceso</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT c.idUsuario,
						   c.nombre,
						   c.apellido,
						   c.carnet,
						   c.direccion,
						   c.celular,
						   c.usuario,
						   n.tipo,
						   email
					FROM usuario c, nivel n
					WHERE n.idNivel=c.idNivel"; 
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$idUsuario = $mostrar['idUsuario'];
		?>
			<tr style="text-align: center;">
				<td><?php echo $mostrar['nombre']; ?></td>
				<td><?php echo $mostrar['apellido']; ?></td>
				<td><?php echo $mostrar['carnet']; ?></td>
				<td><?php echo $mostrar['direccion']; ?></td>
				<td><?php echo $mostrar['celular']; ?></td>
				<td><?php echo $mostrar['email']; ?></td>
				<td><?php echo $mostrar['usuario']; ?></td>
				<td><?php echo $mostrar['tipo']; ?></td>

				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosUsuario('<?php echo $idUsuario ?>')"
						data-toggle="modal" data-target="#modalActualizarUsuario">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
							onclick="eliminarUsuario('<?php echo $idUsuario ?>')" >
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
		$('#tablaUsuarioDataTable').DataTable();
	});
</script>