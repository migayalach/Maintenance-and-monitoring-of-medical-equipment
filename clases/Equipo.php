<?php 
		
	require_once "Conexion.php";
	class Equipo extends Conectar {
		public function agregarEquipo($datos) {
			$conexion = Conectar::conexion();

			$sql="INSERT INTO equipo (`idTipoEstado`,
									  `nombre`,
									  `marca`,
									  `modelo`,
									  `nroSerie`,
									  `nroInventario`) 
							VALUES (?, ?, ?, ?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("isssss", $datos['estado'], 
									 	 $datos['nombre'],
										 $datos['marca'],
										 $datos['modelo'],
										 $datos['serie'],
										 $datos['inventario']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminarEquipo($idEquipo) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM equipo 
					WHERE idEquipo = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idEquipo);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerEquipo($idEquipo) {
			$conexion = Conectar::conexion();

			$sql="SELECT *
				  from equipo where idEquipo='$idEquipo'";
			$result = mysqli_query($conexion, $sql);

			$equipo = mysqli_fetch_array($result);

			$datos = array(
					"idEquipo" => $equipo['idEquipo'],
					"idTipoEstado" => $equipo['idTipoEstado'],
					"nombre" => $equipo['nombre'],
					"marca" => $equipo['marca'],
					"modelo" => $equipo['modelo'],
					"nroSerie" => $equipo['nroSerie'],
					"nroInventario" => $equipo['nroInventario']
						);
			return $datos;
		}

		public function actualizarEquipo($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE equipo 
					SET idTipoEstado = ?, 
						nombre = ?,
						marca = ?,
						modelo = ?,
						nroSerie = ?,
						nroInventario = ?

					WHERE idEquipo = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("isssssi", $datos['estado'],
										  $datos['nombre'],
									 	  $datos['marca'],
										  $datos['modelo'],
									 	  $datos['serie'],
										  $datos['inventario'],
										  $datos['idEquipo'])
										  ;
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}
	}

 ?>