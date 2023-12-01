function validarFormVacio(formulario){
	datos=$('#' + formulario).serialize();
	d=datos.split('&');
	vacios=0;
	for(i=0;i< d.length;i++){
			controles=d[i].split("=");
			if(controles[1]=="A" || controles[1]==""){
				vacios++;
			}
	}
	return vacios;
}

function agregarUsuario() 
{	
	vacios=validarFormVacio('frmUsuario');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}

	else 
	{
		datos=$('#frmUsuario').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/usuario/registro/agregarUsuarios.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();
					//console.log(respuesta);
					if (respuesta == 1) {
						$('#frmUsuario')[0].reset();
						$('#tablaUsuario').load("usuario/tablaUsuario.php");
						swal(":D", "Agregado con exito!", "success");
					} 
					else if(respuesta == 2){
						swal("Este usuario ya existe, por favor escribe otro !!!");
					} 
					else {
						swal(":(", "Fallo al agregar!", "error");
					}
			}
		});
	}
}

function eliminarUsuario(idUsuario) {
	idUsuario = parseInt(idUsuario);
	if (idUsuario < 1) {
		swal("No tienes id usuario!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar este Usuario?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idUsuario=" + idUsuario,
		   			url:"../procesos/usuario/registro/eliminarUsuario.php",
		   			success:function(respuesta){
						//console.log(respuesta);
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1) {
		   					$('#tablaUsuario').load("usuario/tablaUsuario.php");
		   					swal("Eliminado con exito!", {
		      					icon: "success",
		    				});
		   				} else {
		   					swal(":(", "Fallo al eliminar!", "error");
		   				}
		   			}
		   		});	
		  } 
		});
		//*****************************************
	}
}

function obtenerDatosUsuario(idUsuario) {
	$.ajax({
		type:"POST",
		data:"idUsuario=" + idUsuario,
		url:"../procesos/usuario/registro/obtenerUsuario.php",
		success:function(respuesta) {
			//console.log(respuesta);
			respuesta = jQuery.parseJSON(respuesta);

			$('#idUsuarioU').val(respuesta['idUsuario']);
			$('#nivelU').val(respuesta['idNivel']);
			$('#nombreU').val(respuesta['nombre']);
			$('#apellidoU').val(respuesta['apellido']);
			$('#carnetU').val(respuesta['carnet']);
			$('#direccionU').val(respuesta['direccion']);
			$('#correoU').val(respuesta['email']);
			$('#celularU').val(respuesta['celular']);
		}
	})
}

function actualizaUsuario() 
{
	vacios=validarFormVacio('frmActualizaUsuario');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}
	else {
		$.ajax({
			type:"POST",
			data:$('#frmActualizaUsuario').serialize(),
			url:"../procesos/usuario/registro/actualizaUsuario.php",

			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#btnCerrarUpdateUsuario').click();
					$('#tablaUsuario').load("usuario/tablaUsuario.php");
					swal(":D", "Actualizado con exito!", "success");
					
				} else {
					swal(":(", "Fallo al actualizar!", "error");
				}
			}
		})
	}
}