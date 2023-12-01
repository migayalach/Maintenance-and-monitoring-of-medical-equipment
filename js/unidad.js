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

function agregarUnidad() 
{	
	vacios=validarFormVacio('frmUnidad');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}

	else 
	{
		datos=$('#frmUnidad').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/unidad/agregarUnidad.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#frmUnidad')[0].reset();
					$('#tablaUnidad').load("unidad/tablaUnidad.php");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar!", "error");
				}
			}
		});
	}
}

function eliminarUnidad(idUnidad) {
	idUnidad = parseInt(idUnidad);
	if (idUnidad < 1) {
		swal("No tienes id unidad!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar esta unidad?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idUnidad=" + idUnidad,
		   			url:"../procesos/unidad/eliminarUnidad.php",
		   			success:function(respuesta){
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1) {
		   					$('#tablaUnidad').load("unidad/tablaUnidad.php");
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

function obtenerDatosUnidad(idUnidad) {
	$.ajax({
		type:"POST",
		data:"idUnidad=" + idUnidad,
		url:"../procesos/unidad/obtenerUnidad.php",
		success:function(respuesta) {
			//console.log(respuesta);
			respuesta = jQuery.parseJSON(respuesta);

			$('#idUnidadU').val(respuesta['idUnidad']);
			$('#idEquipoU').val(respuesta['idEquipo']);
			$('#idEncargadoU').val(respuesta['idEncargado']);
			$('#nombreU').val(respuesta['nombre']);
			$('#marcaU').val(respuesta['marca']);
			$('#modeloU').val(respuesta['modelo']);
			$('#serieU').val(respuesta['nroSerie']);
			$('#inventarioU').val(respuesta['nroInventario']);
		}
	})
}

function actualizaUnidad() 
{
	vacios=validarFormVacio('frmActualizaUnidad');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}
	else {
		$.ajax({
			type:"POST",
			data:$('#frmActualizaUnidad').serialize(),
			url:"../procesos/unidad/actualizaUnidad.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#btnCerrarUpdateUnidad').click();
					$('#tablaUnidad').load("unidad/tablaUnidad.php");
					swal(":D", "Actualizado con exito!", "success");
					
				} else {
					swal(":(", "Fallo al actualizar!", "error");
				}
			}
		})
	}
}

function actualizarDatos() {
	$.ajax({
		type:"POST",
		data:"idEquipoU=" + $('#idEquipoU').val(),
		url:"../procesos/unidad/llenarUnidad.php",
		success:function(respuesta) {
			//console.log(respuesta);
			respuesta = jQuery.parseJSON(respuesta);
			$('#marcaU').val(respuesta['marca']);
			$('#modeloU').val(respuesta['modelo']);
			$('#serieU').val(respuesta['nroSerie']);
			$('#inventarioU').val(respuesta['nroInventario']);
		}
	})
}