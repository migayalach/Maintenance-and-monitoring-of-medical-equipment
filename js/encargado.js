function agregarEncargado() {
	var encargado = $('#nombreEncargado').val();

	if (encargado == "") {
		swal("Debes agregar un nuevo encargado");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:"encargado=" + encargado,
			url:"../procesos/encargado/agregarEncargado.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#tablaEncargado').load("encargado/tablaEncargado.php");
					$('#nombreEncargado').val("");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar!", "error");
				}
			}
		});
	}
}

function eliminarEncargado(idEncargado) {
	idEncargado = parseInt(idEncargado);
	if (idEncargado < 1) {
		swal("No tienes datos del encargado!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar este encargado?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idEncargado=" + idEncargado,
		   			url:"../procesos/encargado/eliminarEncargado.php",
		   			success:function(respuesta){
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1) {
		   					$('#tablaEncargado').load("encargado/tablaEncargado.php");
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

function obtenerDatosEncargado(idEncargado) {
	$.ajax({
		type:"POST",
		data:"idEncargado=" + idEncargado,
		url:"../procesos/encargado/obtenerEncargado.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			$('#idEncargado').val(respuesta['idEncargado']);
			$('#nombreU').val(respuesta['nombre']);
		}
	})
}

function actualizaEncargado() {
	if ($('#nombreU').val() == "") {
		swal("No hay categoria!!");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:$('#frmActualizaEncargado').serialize(),
			url:"../procesos/encargado/actualizaEncargado.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#btnCerrarUpdateEncargado').click();
					$('#tablaEncargado').load("encargado/tablaEncargado.php");
					swal(":D", "Actualizado con exito!", "success");
					
				} else {
					swal(":(", "Fallo al actualizar!", "error");
				}
			}
		})
	}
}