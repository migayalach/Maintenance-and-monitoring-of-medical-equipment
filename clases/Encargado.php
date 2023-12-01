<?php 
		
	require_once "Conexion.php";
	class Encargado extends Conectar {
		public function agregarEncargado($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO encargadoUnidad (nombre) 
							VALUES (?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("s", $datos['encargado']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminarEncargado($idEncargado) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM encargadoUnidad 
					WHERE idEncargado = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idEncargado);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerEncargado($idEncargado) {
			$conexion = Conectar::conexion();

			$sql = "SELECT * 
					FROM encargadoUnidad 
					WHERE idEncargado = '$idEncargado'";
			$result = mysqli_query($conexion, $sql);

			$encargado = mysqli_fetch_array($result);

			$datos = array(
					"idEncargado" => $encargado['idEncargado'],
					"nombre" => $encargado['nombre']
						);
			return $datos;
		}

		public function actualizarEncargado($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE encargadoUnidad
					SET nombre = ? 
					WHERE idEncargado = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("si", $datos['nombre'],
									 $datos['idEncargado']);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}
	}

 ?>