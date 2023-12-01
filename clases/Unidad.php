<?php 
		
	require_once "Conexion.php";
	class Unidad extends Conectar {
		public function agregarUnidad($datos) {
			$conexion = Conectar::conexion();

			$sql="INSERT into `unidad`(`idEquipo`,
									   `idEncargado`,
									   `nombre`)
							VALUES (?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("iis", $datos['idEquipo'], 
									  $datos['idEncargado'],
									  $datos['nombre']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminarUnidad($idUnidad) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM unidad 
					WHERE idUnidad = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idUnidad);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerUnidad($idUnidad) {
			$conexion = Conectar::conexion();

			$sql="SELECT u.idUnidad, u.idEquipo, u.idEncargado, u.nombre, e.marca, e.modelo, e.nroSerie, e.nroInventario
				  FROM unidad u, equipo e
				  WHERE u.idEquipo=e.idEquipo and idUnidad='$idUnidad'";
			$result = mysqli_query($conexion, $sql);

			$unidad = mysqli_fetch_array($result);

			$datos = array(
					"idUnidad" => $unidad['idUnidad'],
					"idEquipo" => $unidad['idEquipo'],
					"idEncargado" => $unidad['idEncargado'],
					"nombre" => $unidad['nombre'],
					"marca" => $unidad['marca'],
					"modelo" => $unidad['modelo'],
					"nroSerie" => $unidad['nroSerie'],
					"nroInventario" => $unidad['nroInventario']
						);
			return $datos;
		}

		public function actualizarUnidad($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE unidad
					SET idEquipo = ?, 
						idEncargado = ?,
						nombre = ?

					WHERE idUnidad = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("iisi", $datos['idEquipo'],
									   $datos['idEncargado'],
									   $datos['nombre'],
									   $datos['idUnidad'])
										  ;
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}

		public function obtenerEquipo($idEquipo) {
			$conexion = Conectar::conexion();

			$sql="SELECT *
				  FROM equipo
				  WHERE idEquipo='$idEquipo'";
			$result = mysqli_query($conexion, $sql);

			$equipo = mysqli_fetch_array($result);

			$datos = array(
					"marca" => $equipo['marca'],
					"modelo" => $equipo['modelo'],
					"nroSerie" => $equipo['nroSerie'],
					"nroInventario" => $equipo['nroInventario']
						);
			return $datos;
		}
	}

 ?>