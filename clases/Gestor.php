<?php 
	require_once "Conexion.php";

	class Gestor extends Conectar{
		public function agregaRegistroArchivo($datos) {
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO archivos (idUsuario,
										  idMantenimiento,
										  nombre,
										  tipo,
										  ruta)
							VALUES (?,?,?,?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('iisss', $datos['idUsuario'],
										$datos['idMantenimiento'],
										$datos['nombreArchivo'],
										$datos['tipo'],
										$datos['ruta']);

			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenNombreArchivo($idArchivo){
			$conexion = Conectar::conexion();
			$sql = "SELECT nombre
					FROM archivos 
					WHERE idArchivo = '$idArchivo'";
			$result = mysqli_query($conexion, $sql);
			return mysqli_fetch_array($result)['nombre'];
		}

		public function eliminarRegistroArchivo($idArchivo) {
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM archivos WHERE idArchivo = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idArchivo);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerRutaArchivo($idArchivo) {
			$conexion = Conectar::conexion();

			$sql = "SELECT nombre, tipo 
					FROM archivos 
					WHERE idArchivo = '$idArchivo'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);
			$nombreArchivo = $datos['nombre'];
			$extension = $datos['tipo'];
			return self::tipoArchivo($nombreArchivo, $extension);
		}

		public function tipoArchivo($nombre, $extension){
			$idUsuario = $_SESSION['idUsuario'];

			$ruta = "../archivos/".$idUsuario."/".$nombre;

			switch ($extension) {
				case 'png':
					return '<img src="'.$ruta.'" width="80%">';
					break;
					
				case 'jpg':
					return '<center><img src="'.$ruta.'" width="80%"></center>';
					break;

				case 'pdf':
					return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
					break;

				case 'mp3':
					return '<audio controls src="' . $ruta .'"></audio>';
					break;

				case 'mp4':
					return '<video src="'.$ruta.'" controls width="100%" height="600px"></video>';
					break;
				
				default:
					# code...
					break;
			}

		}
	}
 ?>