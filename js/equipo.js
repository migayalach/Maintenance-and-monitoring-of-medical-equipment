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

function agregarEquipo() 
{	
	vacios=validarFormVacio('frmEquipo');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}

	else 
	{
		datos=$('#frmEquipo').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/equipo/agregarEquipo.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#frmEquipo')[0].reset();
					$('#tablaEquipo').load("equipo/tablaEquipo.php");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar!", "error");
				}
			}
		});
	}
}

function eliminarEquipo(idEquipo) {
	idEquipo = parseInt(idEquipo);
	if (idEquipo < 1) {
		swal("No tienes id equipo!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar este equipo?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idEquipo=" + idEquipo,
		   			url:"../procesos/equipo/eliminarEquipo.php",
		   			success:function(respuesta){
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1) {
		   					$('#tablaEquipo').load("equipo/tablaEquipo.php");
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

function obtenerDatosEquipo(idEquipo) {
	$.ajax({
		type:"POST",
		data:"idEquipo=" + idEquipo,
		url:"../procesos/equipo/obtenerEquipo.php",
		success:function(respuesta) {
			//console.log(respuesta);
			respuesta = jQuery.parseJSON(respuesta);

			$('#idEquipoU').val(respuesta['idEquipo']);
			$('#estadoU').val(respuesta['idTipoEstado']);
			$('#nombreU').val(respuesta['nombre']);
			$('#marcaU').val(respuesta['marca']);
			$('#modeloU').val(respuesta['modelo']);
			$('#serieU').val(respuesta['nroSerie']);
			$('#inventarioU').val(respuesta['nroInventario']);
		}
	})
}

function actualizaEquipo() 
{
	vacios=validarFormVacio('frmActualizaEquipo');

	if(vacios > 0){
		swal("Debes llenar todos los campos");
		return false;
	}
	else {
		$.ajax({
			type:"POST",
			data:$('#frmActualizaEquipo').serialize(),
			url:"../procesos/equipo/actualizaEquipo.php",
			success:function(respuesta){
				//console.log(respuesta);
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#btnCerrarUpdateEquipo').click();
					$('#tablaEquipo').load("equipo/tablaEquipo.php");
					swal(":D", "Actualizado con exito!", "success");
					
				} else {
					swal(":(", "Fallo al actualizar!", "error");
				}
			}
		})
	}
}