$(document).ready(function(){
	$('#productosTabla').DataTable({

		"language": {
            "url": urlconfiglenguageDatatables 
        },
	});
});

$(document).ready(function () {
	ObtenerPartidas();
    $('[data-toggle="tooltip"]').tooltip();
});


// modal agregar nuevo
$(document).on('click', '.addp-modal', function(){
    $('.modal-title').text('Agregar nuevo insumo');
    $('#addpModal').modal('show');
});

$('.modal-footer').on('click', '.addp', function() {
    $.ajax({
        type: 'POST',
        url: 'producto',
        data: {
            '_token': $('input[name=_token]').val(),
            'idpartida': $('#partida').val(),
            'cucop': $('#cucop_add').val(),
            'cambs': $('#cambs_add').val(),
            'descripcion': $('#descripcion_add').val(),
            'cantidad': $('#cantidad_add').val(),
            'unidad_medida': $('#medida_add').val(),
            'precio': $('#precio_add').val(),
            'devolver': $('#devolver_add').val()
        },

        success: function(data) {
            $('.errorPartida').addClass('hidden');
            $('.errorCucop').addClass('hidden');
            $('.errorCambs').addClass('hidden');
            $('.errorDescripcion').addClass('hidden');
            $('.errorMedida').addClass('hidden');
            $('.errorCantidad').addClass('hidden');
            $('.errorPrecio').addClass('hidden');
            $('.errorDevolver').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#addpModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 8000});
                }, 500);
                if (data.errors.idpartida) {
                    $('.errorPartida').removeClass('hidden');
                    $('.errorPartida').text(data.errors.idpartida);
                }
                if (data.errors.cucop) {
                    $('.errorCucop').removeClass('hidden');
                    $('.errorCucop').text(data.errors.cucop);
                }
                if (data.errors.cambs) {
                    $('.errorCambs').removeClass('hidden');
                    $('.errorCambs').text(data.errors.cambs);
                }
                if (data.errors.descripcion) {
                    $('.errorDescripcion').removeClass('hidden');
                    $('.errorDescripcion').text(data.errors.descripcion);
                }
                if (data.errors.unidad_medida) {
                    $('.errorMedida').removeClass('hidden');
                    $('.errorMedida').text(data.errors.unidad_medida);
                }
                if (data.errors.cantidad) {
                    $('.errorCantidad').removeClass('hidden');
                    $('.errorCantidad').text(data.errors.cantidad);
                }
                if (data.errors.precio) {
                    $('.errorPrecio').removeClass('hidden');
                    $('.errorPrecio').text(data.errors.precio);
                }
                if (data.errors.devolver) {
                    $('.errorDevolver').removeClass('hidden');
                    $('.errorDevolver').text(data.errors.devolver);
                }
            } else {
                toastr.success('El insumo se agrego exitosamente!!', 'Insumo nuevo', {closeButton:true ,timeOut: 8000});
                $('#productosTabla').append(
                            "<tr class='item"+data.idproducto +"'>"+
                            "<td>"+ data.idpartida +"</td>"+
                            "<td>"+ data.cucop +"</td>"+
                            "<td>"+ data.cambs +"</td>"+
                            "<td>"+ data.descripcion +"</td>"+
                            "<td>"+ data.cantidad +"</td>"+
                            "<td>"+ data.unidad_medida +"</td>"+
                            "<td>$ "+ data.precio +"</td>"+
                            "<td>"+ data.devolver +"</td>"+
                            "<td> <button class='editp-modal btn btn-info btn-sm' data-partida='"+ data.idpartida + "'data-cucop='"+data.cucop+ "'data-cambs='"+data.cambs+"'data-desc='"+ data.descripcion +
                                "'data-cant='"+ data.cantidad +"'data-medida='"+ data.unidad_medida +"'data-precio='"+ data.precio +
                                "'data-devolver='"+ data.devolver +"'> "+
                                "<span class='glyphicon glyphicon-edit'></span></button> "+
                                "<button class='deleteu-modal btn btn-danger btn-sm' data-partida='"+ data.idpartida + "'data-cucop='"+data.cucop+ "'data-cambs='"+data.cambs + "'data-desc='"+ data.descripcion +"'data-cant='"+ data.cantidad +
                                "'data-medida='"+ data.unidad_medida +"'data-precio='"+ data.precio +"'data-devolver='"+ data.devolver +"'> "+
                                "<span class='glyphicon glyphicon-trash'></span></button>"+
                            "</td></tr>");

                location.reload();
            }
        }
        
    }); //ajax

});//modal-footer

//  --------modal editar
$(document).on('click', '.editp-modal', function(){
    $('.modal-title').text('Editar insumo');
    $('#id_editp').val($(this).data('idpro'));
    idproducto = $(this).data('idpro');

    $('#partida_edit').val($(this).data('partida'));
    $('#cucop_edit').val($(this).data('cucop'));
    $('#cambs_edit').val($(this).data('cambs'));
    $('#descripcion_edit').val($(this).data('desc'));
    $('#cantidad_edit').val($(this).data('cant'));
    $('#medida_edit').val($(this).data('medida'));
    $('#precio_edit').val($(this).data('precio'));
    $('#devolver_edit').val($(this).data('devolver'));
    
    $('#editpModal').modal('show');
});

$('.modal-footer').on('click', '.editp', function() {
    $.ajax({
        type: 'PUT',
        url: 'producto/' + idproducto,
        data: {
            'idproducto': $("#id_editp").val(),
            'idpartida': $('#partida_edit').val(),
            'cucop': $('#cucop_edit').val(),
            'cambs': $('#cambs_edit').val(),
            'descripcion': $('#descripcion_edit').val(),
            'cantidad': $('#cantidad_edit').val(),
            'unidad_medida': $('#medida_edit').val(),
            'precio': $('#precio_edit').val(),
            'devolver': $('#devolver_edit').val(),
            '_token': $('input[name=_token]').val()
        },

        success: function(data) {
        	$('.errorPartida').addClass('hidden');
            $('.errorCucop').addClass('hidden');
            $('.errorCambs').addClass('hidden');
            $('.errorDescripcion').addClass('hidden');
            $('.errorMedida').addClass('hidden');
            $('.errorCantidad').addClass('hidden');
            $('.errorPrecio').addClass('hidden');
            $('.errorDevolver').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#editpModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 8000});
                }, 500);
                if (data.errors.idpartida) {
                    $('.errorPartida').removeClass('hidden');
                    $('.errorPartida').text(data.errors.idpartida);
                }
                if (data.errors.cucop) {
                    $('.errorCucop').removeClass('hidden');
                    $('.errorCucop').text(data.errors.cucop);
                }
                if (data.errors.cambs) {
                    $('.errorCambs').removeClass('hidden');
                    $('.errorCambs').text(data.errors.cambs);
                }
                if (data.errors.descripcion) {
                    $('.errorDescripcion').removeClass('hidden');
                    $('.errorDescripcion').text(data.errors.descripcion);
                }
                if (data.errors.unidad_medida) {
                    $('.errorMedida').removeClass('hidden');
                    $('.errorMedida').text(data.errors.unidad_medida);
                }
                if (data.errors.cantidad) {
                    $('.errorCantidad').removeClass('hidden');
                    $('.errorCantidad').text(data.errors.cantidad);
                }
                if (data.errors.precio) {
                    $('.errorPrecio').removeClass('hidden');
                    $('.errorPrecio').text(data.errors.precio);
                }
                if (data.errors.devolver) {
                    $('.errorDevolver').removeClass('hidden');
                    $('.errorDevolver').text(data.errors.devolver);
                }
            } else {
                toastr.info('El insumo se actualizo exitosamente!!', 'Insumo actualizo', {closeButton:true ,timeOut: 8000});
                $('.item'+data.idproducto).replaceWith(
                            "<tr class='item"+data.idproducto +"'>"+
                            "<td>"+ data.idpartida +"</td>"+
                            "<td>"+ data.cucop +"</td>"+
                            "<td>"+ data.cambs +"</td>"+
                            "<td>"+ data.descripcion +"</td>"+
                            "<td>"+ data.cantidad +"</td>"+
                            "<td>"+ data.unidad_medida +"</td>"+
                            "<td>"+ data.precio +"</td>"+
                            "<td>"+ data.devolver +"</td>"+
                            "<td> <button class='editp-modal btn btn-info btn-sm' data-partida='"+ data.idpartida+ "'data-cucop='"+data.cucop+ "'data-cambs='"+data.cambs + "'data-desc='"+ data.descripcion +"'data-cant='"+ data.cantidad +
                                "'data-medida='"+ data.unidad_medida +"'data-precio='"+ data.precio +"'data-devolver='"+ data.devolver +"'> "+
                                "<span class='glyphicon glyphicon-edit'></span></button> "+
                                "<button class='deleteu-modal btn btn-danger btn-sm' data-idpro='"+ data.idproducto +"'data-partida='"+ data.idpartida+ "'data-cucop='"+data.cucop+ "'data-cambs='"+data.cambs + "'data-desc='"+ data.descripcion +"'data-cant='"+ data.cantidad +
                                "'data-medida='"+ data.unidad_medida +"'data-precio='"+ data.precio +"'data-devolver='"+ data.devolver +"'> "+
                                "<span class='glyphicon glyphicon-trash'></span></button>"+
                            "</td></tr>");

                location.reload();
            }
        }
        
    }); //ajax

});//modal-footer

//Modal Eliminar
$(document).on('click', '.deletep-modal', function(){
    $('.modal-title').text('Eliminar insumo');

    $('#id_deletep').val($(this).data('idpro'));
    idproducto = $(this).data('idpro');

    $('#partida_delete').val($(this).data('partida'));
    $('#cucop_delete').val($(this).data('cucop'));
    $('#cambs_delete').val($(this).data('cambs'));
    $('#descripcion_delete').val($(this).data('desc'));
    $('#medida_delete').val($(this).data('medida'));
    $('#cantidad_delete').val($(this).data('cant'));
    $('#precio_delete').val($(this).data('precio'));
    $('#devolver_delete').val($(this).data('devolver'));

    $('#deletepModal').modal('show');
});

$('.modal-footer').on('click','.deletep',function(){
    $.ajax({
        type: 'DELETE',
        url: 'producto/' + idproducto,
        data:{
            '_token': $('input[name=_token]').val(),
        },
        success: function(data){
            toastr.warning('Se ha eliminado '+data.descripcion+'.','Insumo eliminado',{closeButton:true, timeOut: 8000});
            $('.item' + data['idproducto']).remove();

            location.reload();
        }
    });
});


//select partidas
function ObtenerPartidas(){

	var url='Obtenerpartidas';

	$.ajax({
		type:'get',
		url:url,
		dataType:"JSON",
			
		success:function (respuesta) {
			//console.log(respuesta);
			pintarPartidas(respuesta);
		},

		error:function () {
			alert("error de las partida");
		}

	});
}

function pintarPartidas(partidas){

	var html='<select name="partida" id="partida" class="form-control">';
        html+='<option value selected="selected"> - Seleccione una partida - </option>';
	for (var i =0; i < partidas.length; i++) {
		html+='<option value="'+partidas[i].idpartida+'">'+partidas[i].idpartida+'-'+partidas[i].nombre_partida+'</option>';
	}

	html+='</select>';

	$("#partidas").html(html);

    var html='<select name="partida_edit" id="partida_edit" class="form-control">';
        html+='<option value selected="selected"> - Seleccione una partida - </option>';
    for (var i =0; i < partidas.length; i++) {
        html+='<option value="'+partidas[i].idpartida+'">'+partidas[i].idpartida+'-'+partidas[i].nombre_partida+'</option>';
    }

    html+='</select>';

    $("#partidas_edit").html(html);


    var html='<select name="partida_delete" id="partida_delete" class="form-control" disabled>';
        html+='<option value selected="selected"> - Seleccione una partida - </option>';
    for (var i =0; i < partidas.length; i++) {
        html+='<option value="'+partidas[i].idpartida+'">'+partidas[i].idpartida+'-'+partidas[i].nombre_partida+'</option>';
    }

    html+='</select>';

    $("#partidas_delete").html(html);
}

$('.modal').on('hidden.bs.modal', function(){ 
        $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
        $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
    });