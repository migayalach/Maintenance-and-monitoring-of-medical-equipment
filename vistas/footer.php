
	<script src="../librerias/jquery-3.4.1.min.js"></script>
	<script src="../librerias/bootstrap4/popper.min.js"></script>
	<script src="../librerias/bootstrap4/bootstrap.min.js"></script>
	<script src="../librerias/sweetalert.min.js"></script>
	<script src="../librerias/datatable/jquery.dataTables.min.js"></script>
	<script src="../librerias/datatable/dataTables.bootstrap4.min.js"></script>
	</body>
</html>

<script type="text/javascript">
		function agregaDatosUsuarioP(idusuario){
			$.ajax({
				type:"POST",
				data:"idUsuarioP=" + idusuario,
				url:"../procesos/usuario/registro/obtenDatosUsuarioP.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					$('#idUsuarioP').val(dato['idUsuario']);
					$('#nombreP').val(dato['nombre']);
					$('#apellidoP').val(dato['apellido']);
					$('#carnetP').val(dato['carnet']);
					$('#direccionP').val(dato['direccion']);
					$('#correoP').val(dato['email']);
					$('#celularP').val(dato['celular']);
					$('#usuarioP').val(dato['usuario']);
				}
			});
		}
</script>

<script type="text/javascript">
	function btnActualizaUsuarioP() {
			datos=$('#frmActualizaUsuarioP').serialize();
			$.ajax({
				type:"POST",
				data:$('#frmActualizaUsuarioP').serialize(),
				url:"../procesos/usuario/registro/actualizaUsuarioP.php",

				success:function(respuesta){
					//console.log(respuesta);
					respuesta = respuesta.trim();

					if (respuesta == 1) {
						$('#btnCerrarUpdateUsuarioP').click();
						$('#tablaUsuario').load("usuario/tablaUsuario.php");
						swal(":D", "Actualizado con exito!", "success");
						
					} else {
						swal(":(", "Fallo al actualizar!", "error");
					}
				}
			})

			return false;
		}

</script>

<script type="text/javascript">
		function agregaAsistencia(idusuario){
			$.ajax({
				type:"POST",
				data:"idUsuarioA=" + idusuario,
				url:"../procesos/usuario/registro/obtenDatosUsuarioA.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					$('#idUsuarioA').val(dato['idUsuario']);
					$('#nombreA').val(dato['nombre']);
					$('#apellidoA').val(dato['apellido']);
					$('#carnetA').val(dato['carnet']);
					$('#fechaA').val(dato['fecha']);
				}
			});
		}
</script>

<script type="text/javascript">
	function btnAsistencia() {
			datos=$('#frmAsistencia').serialize();
			$.ajax({
				type:"POST",
				data:$('#frmAsistencia').serialize(),
				url:"../procesos/usuario/registro/asistencia.php",

				success:function(respuesta){
					//console.log(respuesta);
					respuesta = respuesta.trim();

					if (respuesta == 1) {

						swal(":D", "Registrado con exito!", "success");
					} else {
						swal(":(", "Fallo al registrar!", "error");
					}
				}
			})

			return false;
		}

</script>