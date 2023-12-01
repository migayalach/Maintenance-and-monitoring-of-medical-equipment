function agregarTipoM() {
	var nombreTipoM = $('#nombreTipoM').val();

	if (nombreTipoM == "") {
		swal("Debes agregar un nuevo tipo de mantenimiento");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:"nombreTipoM=" + nombreTipoM,
			url:"../procesos/tipoMantenimiento/agregarTipoMantenimiento.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#tablaTipoM').load("tipoMantenimiento/tablaTipoM.php");
					$('#nombreTipoM').val("");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar!", "error");
				}
			}
		});
	}
}

function eliminarTipoM(idTipoM) {
	idTipoM = parseInt(idTipoM);
	if (idTipoM < 1) {
		swal("No tienes id de categoria!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar esta categoria?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idTipoM=" + idTipoM,
		   			url:"../procesos/tipoMantenimiento/eliminarTipoMantenimiento.php",
		   			success:function(respuesta){
		   				respuesta = respuesta.trim();
						//console.log("respuesta");
		   				if (respuesta == 1) {
		   					$('#tablaTipoM').load("tipoMantenimiento/tablaTipoM.php");
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

function obtenerDatosTipoM(idTipoM) {
	$.ajax({
		type:"POST",
		data:"idTipoM=" + idTipoM,
		url:"../procesos/tipoMantenimiento/obtenerTipoMantenimiento.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);

			$('#idTipoM').val(respuesta['idTipoM']);
			$('#tipoMU').val(respuesta['nombreTipoM']);
		}
	})
}

function actualizaTipoM() {
	if ($('#tipoMU').val() == "") {
		swal("No hay Tipo de mantenimiento!!");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:$('#frmActualizaTipoM').serialize(),
			url:"../procesos/tipoMantenimiento/actualizaTipoMantenimiento.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#btnCerrarUpdateTipoM').click();
					$('#tablaTipoM').load("tipoMantenimiento/tablaTipoM.php");

					swal(":D", "Actualizado con exito!", "success");
					
				} else {
					swal(":(", "Fallo al actualizar!", "error");
				}
			}
		})
	}
}

/*function obtenerDatosMantenimientoP(idMantenimientoP) {
	$.ajax({
		type:"POST",
		data:"idMantenimientoP=" + idMantenimientoP,
		url:"../procesos/tipoMantenimiento/obtenerTipoMantenimientoP.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);

			$('#idTipoM').val(respuesta['idTipoM']);
			$('#tipoMU').val(respuesta['nombreTipoM']);
		}
	})
}*/

