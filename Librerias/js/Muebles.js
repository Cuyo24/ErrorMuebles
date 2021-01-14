$(document).ready(function(){

	mostrarDatosTablaUsuarios();

	$('#btnAgregarUsuario').click(function(){
		$.ajax({
			type:"POST",
			data:$('#frmAgregaUsuario').serialize(),
			url:base_url + "/agregarUsuarios",
			success:function(respuesta){

				console.log(respuesta);
				if (respuesta > 0) {
					mostrarDatosTablaUsuarios();
					swal(":)", "Genial agregado con exito!", "success");
				} else {
					swal(":(", "No se pudo agregar!", "error");
				}
			}
		});

		return false;
	});
});

function mostrarDatosTablaUsuarios() {
	$.ajax({
			url:base_url + "/todosLosUsuario",
			dataType:"JSON",
			success:function(respuesta){

				cadena = '<table class="table table-bordered" id="tablaUsuarios">'+
							'<thead>'+
								'<tr>'+
									'<th>No. de registro</th>' +
									'<th>nombre</th>' +
									'<th>tipo</th>' +
									'<th>Costo de Venta</th>' +
									'<th>Costo de Compra</th>' +
									'<th>Fecha de ingreso</th>' +
									'<th>Editar</th>' +
									'<th>Eliminar</th>' +
								'</tr>'+
							'</thead>'+
							'<tbody>';
				$.each(respuesta, function(i, item) {
					cadena = cadena + "<tr>"+
											"<td>" + item.id_compra + "</td>" +
											"<td>" + item.nombre + "</td>" +
											"<td>" + item.tipo + "</td>" +
											"<td>" + item.costoVenta + "</td>" +
											"<td>" + item.CostoCompra + "</td>" +
											"<td>" + item.fecha + "</td>" +
											'<td>'+
												'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarUsuario" '+
												' onclick="obtenerIdUsuario(' + item.id_compra + ')">'+
													'<span class="fas fa-user-edit"></span>'+
												'<span>'+
											'</td>' +
											'<td>'+
												'<span class="btn btn-danger btn-sm" onclick="eliminarUsuario(' + item.id_compra + ')">'+
													'<span class="fas fa-user-times"></span>'+
												'</span></td>' +
									  "</tr>";
				});
				cadena = cadena + "</tbody></table>";
				$('#tablaCargadaUsuarios').html(cadena);
				$("#tablaUsuarios").DataTable();
			}
	});

	return false;
}

function eliminarUsuario(idCompra) {

	swal({
		title: "Estas seguro de esta accion?",
		text: "Una vez eliminado no podra ser recuperado!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				dataType:"JSON",
				data:"idCompra=" + idCompra, 
				url:base_url + "/eliminarUsuario",
				success:function(respuesta) {
					if (respuesta['status']) {
						mostrarDatosTablaUsuarios();
						swal(":)", "Genial agregado con exito!", "success");
					} else {
						
						swal(":(", "No se pudo eliminar!", "error");
					}
				}
			});
		} 
	});

}

function obtenerIdUsuario(idCompra) {
	$.ajax({
		type:"POST",
		data:"idCompra=" + idCompra,
		dataType:"JSON", 
		url:base_url + "/obtenerUsuarioId",
		success:function(respuesta) {

			$.each(respuesta, function(i, item) {
				$('#idComprau').val(item.id_compra);
				$('#nombreu').val(item.nombre);
				$('#tipou').val(item.tipo);
				$('#costoVentau').val(item.costoVenta);
				$('#CostoComprau').val(item.CostoCompra);
			});
		}
	});
}

function actualizarUsuario(){
	$.ajax({
			type:"POST",
			data:$('#frmAgregaUsuariou').serialize(),
			url:base_url + "/actualizarUsuario",
			success:function(respuesta){

				console.log(respuesta);
				if (respuesta) {
					mostrarDatosTablaUsuarios();
					swal(":)", "Genial actualizado con exito!", "success");
				} else {
					swal(":(", "No se pudo actualizar!", "error");
				}
			}
		});

		return false;
}