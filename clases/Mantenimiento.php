<?php 
		
	require_once "Conexion.php";
	class Mantenimiento extends Conectar {
		public function agregarMantenimiento($datos) {
			$conexion = Conectar::conexion();
			$hecho="F";
			$sql="INSERT INTO mantenimiento (`idTipoMantenimiento`,
											 `idEquipo`,
											 `idUsuario`,
											 `fechaMantenimiento`,
											 `nroDocumento`,
											 `observacion`,
											 `reporte`,
											 `hecho`) 
							VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("iiisssss",  $datos['tipo'], 
									 	   $datos['equipo'],
										   $datos['usuario'],
										   $datos['fecha'],
										   $datos['nroDocumento'],
										   $datos['vacio'],
										   $datos['vacio'],
										   $hecho
										);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminarMantenimiento($idMantenimiento) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM mantenimiento
					WHERE idMantenimiento = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idMantenimiento);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerMantenimiento($idMantenimiento) {
			$conexion = Conectar::conexion();

			$sql="SELECT m.idMantenimiento, m.idTipoMantenimiento, e.idEquipo, e.marca, e.modelo, e.nroSerie, e.nroInventario, m.fechaMantenimiento, m.nroDocumento
				  FROM mantenimiento m, equipo e, unidad u
				  WHERE m.idEquipo=e.idEquipo and u.idEquipo=e.idEquipo and m.idMantenimiento='$idMantenimiento'";
			$result = mysqli_query($conexion, $sql);

			$equipo = mysqli_fetch_array($result);

			$datos = array(
					"idMantenimiento" => $equipo['idMantenimiento'],
					"idTipoMantenimiento" => $equipo['idTipoMantenimiento'],
					"idUnidad" => $equipo['idEquipo'],
					"marca" => $equipo['marca'],
					"modelo" => $equipo['modelo'],
					"nroSerie" => $equipo['nroSerie'],
					"nroInventario" => $equipo['nroInventario'],
					"fechaMantenimiento" => $equipo['fechaMantenimiento'],
					"nroDocumento" => $equipo['nroDocumento']
						);
			return $datos;
		}

		public function actualizarMantenimiento($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE mantenimiento 
					SET idTipoMantenimiento = ?, 
						idEquipo = ?,
						fechaMantenimiento = ?,
						nroDocumento = ?

					WHERE idMantenimiento = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("iissi",  $datos['idTipoMantenimiento'],
									 	  $datos['idEquipo'],
										  $datos['fecha'],
										  $datos['documento'],
										  $datos['idMantenimiento']);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}

		public function obtenerEquipoM($idEquipo) {
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

		public function obtenerEquipoFm($idEquipo) {
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

		/*public function obtenerMantenimientoP($idMantenimiento) {
			$conexion = Conectar::conexion();

			$sql="SELECT m.idMantenimiento, m.idTipoMantenimiento, e.idEquipo, e.marca, e.modelo, e.nroSerie, e.nroInventario, m.fechaMantenimiento, m.nroDocumento
				  FROM mantenimiento m, equipo e, unidad u
				  WHERE m.idEquipo=e.idEquipo and u.idEquipo=e.idEquipo and m.idMantenimiento='$idMantenimiento'";
			$result = mysqli_query($conexion, $sql);

			$mantenimiento = mysqli_fetch_array($result);

			$datos = array(
					"" => $mantenimiento[''],
					"" => $mantenimiento[''],
					"" => $mantenimiento[''],
					"" => $mantenimiento[''],
					"" => $mantenimiento[''],
					"" => $mantenimiento[''],
					"" => $mantenimiento[''],
					"" => $mantenimiento[''],
					"" => $mantenimiento['']
						);
			return $datos;
		}*/

		public function actualizarMantenimientoH($datos) {
			$conexion = Conectar::conexion();
			$hecho="V";
			$sql = "UPDATE mantenimiento 
					SET hecho = ?
					WHERE idMantenimiento = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("si",  $hecho,
									  $datos['idMantenimiento']);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}

	}
 ?>