<?php 
		
	require_once "Conexion.php";
	class tipoM extends Conectar 
	{
		public function agregarTipoM($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO tipoMantenimiento (nombre) 
							VALUES (?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("s", $datos['nombreTipoM']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminarTipoM($idTipoM) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM tipoMantenimiento  
					WHERE idTipoMantenimiento = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idTipoM);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerTipoM($idTipoM) {
			$conexion = Conectar::conexion();

			$sql = "SELECT idTipoMantenimiento, 
							nombre 
					FROM tipoMantenimiento 
					WHERE idTipoMantenimiento = '$idTipoM'";
			$result = mysqli_query($conexion, $sql);

			$categoria = mysqli_fetch_array($result);

			$datos = array(
					"idTipoM" => $categoria['idTipoMantenimiento'],
					"nombreTipoM" => $categoria['nombre']
						);
			return $datos;
		}

		public function actualizarTipoM($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE tipoMantenimiento
					SET nombre = ? 
					WHERE idTipoMantenimiento = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("si", $datos['tipoM'], $datos['idTipoM']);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}
	}

 ?>