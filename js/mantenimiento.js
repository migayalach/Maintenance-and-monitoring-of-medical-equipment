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

function agregarMantenimiento() 
{	
	vacios=validarFormVacio('frmMantenimiento');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}

	else 
	{
		datos=$('#frmMantenimiento').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/mantenimiento/agregarMantenimiento.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#frmMantenimiento')[0].reset();
					$('#tablaMantenimiento').load("mantenimiento/tablaMantenimiento.php");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar!", "error");
				}
			}
		});
	}
}

function eliminarMantenimiento(idMantenimiento) {
	idMantenimiento = parseInt(idMantenimiento);
	if (idMantenimiento < 1) {
		swal("No tienes id Mantenimiento!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar este mantenimiento programado?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idMantenimiento=" + idMantenimiento,
		   			url:"../procesos/mantenimiento/eliminarMantenimiento.php",
		   			success:function(respuesta){
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1) {
		   					$('#tablaMantenimiento').load("mantenimiento/tablaMantenimiento.php");
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

function obtenerDatosMantenimiento(idMantenimiento) {
	$.ajax({
		type:"POST",
		data:"idMantenimiento=" + idMantenimiento,
		url:"../procesos/mantenimiento/obtenerMantenimiento.php",
		success:function(respuesta) {
			//console.log(respuesta);
			respuesta = jQuery.parseJSON(respuesta);

			$('#idMantenimientoU').val(respuesta['idMantenimiento']);
			$('#idTipoMantenimientoU').val(respuesta['idTipoMantenimiento']);
			$('#idUnidadU').val(respuesta['idUnidad']);
			$('#marcaU').val(respuesta['marca']);
			$('#modeloU').val(respuesta['modelo']);
			$('#serieU').val(respuesta['nroSerie']);
			$('#inventarioU').val(respuesta['nroInventario']);
			$('#fechaU').val(respuesta['fechaMantenimiento']);
			$('#documentoU').val(respuesta['nroDocumento']);
		}
	})
}

function actualizaMantenimiento() 
{
	vacios=validarFormVacio('frmActualizaManteniniemtoU');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}
	
	else {
		datos=$('#frmActualizaManteniniemtoU').serialize();

		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/mantenimiento/actualizaMantenimiento.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#btnCerrarUpdateMantenimiento').click();
					$('#tablaMantenimiento').load("mantenimiento/tablaMantenimiento.php");
					swal(":D", "Actualizado con exito!", "success");
					
				} else {
					swal(":(", "Fallo al actualizar!", "error");
				}
			}
		});
	}
}

function mostrar()
{
	$.ajax({
		type:"POST",
		data:"idEquipo=" + $('#idEquipoM').val(),
		url:"../procesos/mantenimiento/actualizaEquipoU.php",
		success:function(respuesta){
		//console.log(respuesta);
		respuesta = jQuery.parseJSON(respuesta);
			$('#marca').val(respuesta['marca']);
			$('#modelo').val(respuesta['modelo']);
			$('#serie').val(respuesta['nroSerie']);
			$('#inventario').val(respuesta['nroInventario']);
		}
	});
}


function mostrarU()
{
	$.ajax({
		type:"POST",
		data:"idUnidadU=" + $('#idUnidadU').val(),
		url:"../procesos/mantenimiento/actualizaEquipoFm.php",
		success:function(respuesta){
		//console.log(respuesta);
		respuesta = jQuery.parseJSON(respuesta);
			$('#marcaU').val(respuesta['marca']);
			$('#modeloU').val(respuesta['modelo']);
			$('#serieU').val(respuesta['nroSerie']);
			$('#inventarioU').val(respuesta['nroInventario']);
		}
	});
}