<?php 
	
	require_once "Conexion.php";

	class Usuario extends Conectar{

		public function agregarUsuario($datos) {
			$conexion = Conectar::conexion();

			if (self::buscarUsuarioRepetido($datos['carnet'])) {
				return 2;
			} else {
				$sql = "INSERT INTO usuario (idNivel,
											 nombre,
											 apellido,
											 carnet,
											 direccion,
											 email,
											 celular,
											 usuario,
											 clave) 
							VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$query = $conexion->prepare($sql);
				$query->bind_param('issssssss', $datos['nivel'],
												$datos['nombre'],
												$datos['apellido'],
												$datos['carnet'],
												$datos['direccion'],
												$datos['email'],
												$datos['celular'],
												$datos['usuario'],
												$datos['password']);
				$exito = $query->execute();
				$query->close();
				return $exito;
			}
		}

		public function buscarUsuarioRepetido($carnet) {
			$conexion = Conectar::conexion();

		    	$sql = "SELECT carnet 
				         FROM usuario 
				         WHERE carnet = '$carnet'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos != NULL) {
				if ($datos['carnet'] != "" || $datos['carnet'] == $carnet) {
					return 1;
				} else {
					return 0;
				}
			} else {
				return 0;
			}
		}

		public function login($usuario, $password) {
			$conexion = Conectar::conexion();

			$sql = "SELECT count(*) as existeUsuario 
					FROM usuario
					WHERE usuario = '$usuario' 
						AND clave = '$password'";
			$result = mysqli_query($conexion, $sql);

			$respuesta = mysqli_fetch_array($result)['existeUsuario'];

			if ($respuesta > 0) {
				$_SESSION['usuario'] = $usuario;

				$sql = "SELECT idUsuario
						FROM usuario 
						WHERE usuario = '$usuario' 
						AND clave = '$password'";
				$result = mysqli_query($conexion ,$sql);
				$idUsuario = mysqli_fetch_row($result)[0];
				$_SESSION['idUsuario'] = $idUsuario;

				$sql = "SELECT idNivel 
						FROM usuario 
						WHERE usuario = '$usuario' 
						AND clave = '$password'";
				$resul = mysqli_query($conexion ,$sql);
				$idNivel = mysqli_fetch_row($resul)[0];
				$_SESSION['idNivel'] = $idNivel;
				
				return 1;
			} else {
				return 0;
			}
		}

		public function agregarUsuarios($datos) {
			$conexion = Conectar::conexion();

			if (self::buscarUsuarioRepetido($datos['carnet'])) {
				return 2;
			} else {
				$sql = "INSERT INTO usuario (idNivel,
											 nombre,
											 apellido,
											 carnet,
											 direccion,
											 email,
											 celular,
											 usuario,
											 clave) 
							VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$query = $conexion->prepare($sql);
				$query->bind_param('issssssss', $datos['nivel'],
												$datos['nombre'],
												$datos['apellido'],
												$datos['carnet'],
												$datos['direccion'],
												$datos['email'],
												$datos['celular'],
												$datos['usuario'],
												$datos['password']);
				$exito = $query->execute();
				$query->close();
				return $exito;
			}
		}

		public function eliminarUsuario($idUsuario) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM usuario 
					WHERE idUsuario = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idUsuario);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerUsuario($idUsuario) {
			$conexion = Conectar::conexion();

			$sql="SELECT *
				  from usuario where idUsuario='$idUsuario'";
			$result = mysqli_query($conexion, $sql);

			$equipo = mysqli_fetch_array($result);

			$datos = array(
					"idUsuario" => $equipo['idUsuario'],
					"idNivel" => $equipo['idNivel'],
					"nombre" => $equipo['nombre'],
					"apellido" => $equipo['apellido'],
					"carnet" => $equipo['carnet'],
					"direccion" => $equipo['direccion'],
					"email" => $equipo['email'],
					"celular" => $equipo['celular']
						);
			return $datos;
		}

		public function actualizarUsuario($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE usuario 
					SET idNivel = ?, 
						nombre = ?,
						apellido = ?,
						carnet = ?,
						direccion = ?,
						email = ?,
						celular = ?

					WHERE idUsuario = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("issssssi", $datos['nivel'],
										   $datos['nombre'],
									 	   $datos['apellido'],
										   $datos['carnet'],
									 	   $datos['direccion'],
										   $datos['correo'],
										   $datos['celular'],
										   $datos['idUsuario'])
										  ;
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}

		public function obtenerUsuarioP($idUsuario) {
			$conexion = Conectar::conexion();

			$sql="SELECT *
				  from usuario where idUsuario='$idUsuario'";
			$result = mysqli_query($conexion, $sql);

			$equipo = mysqli_fetch_array($result);

			$datos = array(
					"idUsuario" => $equipo['idUsuario'],
					"nombre" => $equipo['nombre'],
					"apellido" => $equipo['apellido'],
					"carnet" => $equipo['carnet'],
					"direccion" => $equipo['direccion'],
					"email" => $equipo['email'],
					"celular" => $equipo['celular'],
					"usuario" => $equipo['usuario']
						);
			return $datos;
		}

		public function actualizarUsuarioP($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE usuario 
					SET nombre = ?,
						apellido = ?,
						carnet = ?,
						direccion = ?,
						email = ?,
						celular = ?,
						usuario = ?,
						clave = ?

					WHERE idUsuario = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("ssssssssi", $datos['nombre'],
									 	   $datos['apellido'],
										   $datos['carnet'],
									 	   $datos['direccion'],
										   $datos['correo'],
										   $datos['celular'],
										   $datos['usuario'],
										   $datos['clave'],
										   $datos['idUsuario'])
										  ;
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}

		public function obtenerUsuarioA($idUsuario) {
			$conexion = Conectar::conexion();

			$sql="SELECT *, now()
				  from usuario where idUsuario='$idUsuario'";
			$result = mysqli_query($conexion, $sql);

			$equipo = mysqli_fetch_array($result);

			$dato = array(
					"idUsuario" => $equipo['idUsuario'],
					"nombre" => $equipo['nombre'],
					"apellido" => $equipo['apellido'],
					"carnet" => $equipo['carnet'],
					"fecha" => $equipo['now()'],
						);
			return $dato;
		}

		public function agregaAsistencia($datos) {
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO asistencia (idUsuario) 
							VALUES (?)";
				$query = $conexion->prepare($sql);
				$query->bind_param('i', $datos['idUsuario']);
				$exito = $query->execute();
				$query->close();
				return $exito;
		}
	}
	
 ?>
