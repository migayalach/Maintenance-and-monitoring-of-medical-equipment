function agregarEstado() {
	var nombreTipoE = $('#nombreEstado').val();

	if (nombreTipoE == "") {
		swal("Debes agregar un nuevo tipo de mantenimiento");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:"nombreTipoE=" + nombreTipoE,
			url:"../procesos/estado/agregarEstado.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#tablaEstado').load("estado/tablaEstado.php");
					$('#nombreEstado').val("");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar!", "error");
				}
			}
		});
	}
}

function eliminarTipoE(idTipoE) {
	idTipoE = parseInt(idTipoE);
	if (idTipoE < 1) {
		swal("No tienes id de estado!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar este estado?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idTipoE=" + idTipoE,
		   			url:"../procesos/estado/eliminarEstado.php",
		   			success:function(respuesta){
		   				respuesta = respuesta.trim();
						//console.log("respuesta");
		   				if (respuesta == 1) {
		   					$('#tablaEstado').load("estado/tablaEstado.php");
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

function obtenerDatosEstado(idTipoE) {
	$.ajax({
		type:"POST",
		data:"idTipoE=" + idTipoE,
		url:"../procesos/estado/obtenerEstado.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);

			$('#idTipoE').val(respuesta['idTipoE']);
			$('#estadoU').val(respuesta['nombreTipoE']);
		}
	})
}

function actualizaEstado() {
	if ($('#estadoU').val() == "") {
		swal("No hay Tipo de mantenimiento de estado!!");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:$('#frmActualizaEstadoU').serialize(),
			url:"../procesos/estado/actualizaEstado.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#btnCerrarUpdateTipoE').click();
					$('#tablaEstado').load("estado/tablaEstado.php");

					swal(":D", "Actualizado con exito!", "success");
					
				} else {
					swal(":(", "Fallo al actualizar!", "error");
				}
			}
		})
	}
}