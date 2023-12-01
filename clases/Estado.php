<?php 
		
	require_once "Conexion.php";
	class Estado extends Conectar 
	{
		public function agregarTipoE($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO tipoEstado (estadoGarantia) 
							VALUES (?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("s", $datos['nombreTipoE']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminarTipoE($idTipoE) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM tipoEstado  
					WHERE idTipoEstado = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idTipoE);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerTipoE($idTipoE) {
			$conexion = Conectar::conexion();

			$sql = "SELECT *
					FROM tipoEstado
					WHERE idTipoEstado = '$idTipoE'";
			$result = mysqli_query($conexion, $sql);

			$estado= mysqli_fetch_array($result);

			$datos = array(
					"idTipoE" => $estado['idTipoEstado'],
					"nombreTipoE" => $estado['estadoGarantia']
						);
			return $datos;
		}

		public function actualizarTipoE($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE tipoEstado
					SET estadoGarantia = ? 
					WHERE idTipoEstado = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("si", $datos['estadoU'], $datos['idTipoE']);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}
	}

 ?>