$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('#residenciaTabla').DataTable({
        //"precessing": true,
        //"serverSide": true,

        "language": {
            "url": urlconfiglenguageDatatables 
        },

        //"ajax": urlcontainTable,

        /*"columns":[
            
        ]*/

    });
});


// modal agregar nuevo
$(document).on('click', '.addr-modal', function(){
    $('.modal-title').text('Agregar nueva residencia');
    $('#addrModal').modal('show');
});

$('.modal-footer').on('click', '.addr', function() {
    $.ajax({
        type: 'POST',
        url: 'residencia',
        data: {
            '_token': $('input[name=_token]').val(),
            'idresidencia': $('#residencia_add').val(),
            'encargado': $('#encargado_add').val(),
            'puesto': $('#puesto_adds').val(),
            'ubicacion': $('#ubicacion_add').val()
        },

        success: function(data) {
            $('.errorResidencia').addClass('hidden');
            $('.errorEncargado').addClass('hidden');
            $('.errorPuesto').addClass('hidden');
            $('.errorUbicacion').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#addrModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 6000});
                }, 500);
                if (data.errors.idresidencia) {
                    $('.errorResidencia').removeClass('hidden');
                    $('.errorResidencia').text(data.errors.idresidencia);
                }
                if (data.errors.encargado) {
                    $('.errorEncargado').removeClass('hidden');
                    $('.errorEncargado').text(data.errors.encargado);
                }
                if (data.errors.puesto) {
                    $('.errorPuesto').removeClass('hidden');
                    $('.errorPuesto').text(data.errors.puesto);
                }
                if (data.errors.ubicacion) {
                    $('.errorUbicacion').removeClass('hidden');
                    $('.errorUbicacion').text(data.errors.ubicacion);
                }
            } else {
            	toastr.success('La residencia '+ data.ubicacion +' se agrego exitosamente!!', 'Residencia de obra nueva', {closeButton:true ,timeOut: 6000});
                $('#residenciaTabla').append(
                            "<tr class='item"+data.idresidencia +"'>"+
                            "<td>"+ data.idresidencia +"</td>"+
                            "<td>"+ data.encargado +"</td>"+
                            "<td>"+ data.puesto +"</td>"+
                            "<td>"+ data.ubicacion +"</td>"+
                            "<td>"+ data.created_at +"</td>"+
                            "<td><button class='editr-modal btn btn-info btn-sm' data-idresc='"+ data.idresidencia + "'data-encarg='"+ data.encargado +"'data-puesto='"+ data.puesto +
                                "'data-ubicacion='"+ data.ubicacion +"'data-created='"+ data.created_at +"'>"+
                                "<span class='glyphicon glyphicon-edit'></span></button> "+
                                "<button class='deleteu-modal btn btn-danger btn-sm' data-idresc='"+ data.idresidencia + "'data-encarg='"+ data.encargado +"'data-puesto='"+ data.puesto +
                                "'data-ubicacion='"+ data.ubicacion +"'data-created='"+ data.created_at +"'>"+
                                "<span class='glyphicon glyphicon-trash'></span></button>"+
                            "</td></tr>");

                location.reload();
            }
        }
        
    }); //ajax

});//modal-footer

//  --------modal editar
$(document).on('click', '.editr-modal', function(){
    $('.modal-title').text('Editar residencia');
    $('#residencia_edit').val($(this).data('idresc'));
    idres = $(this).data('idresc');

    $('#encargado_edit').val($(this).data('encarg'));
    $('#puesto_edits').val($(this).data('puesto'));
    $('#ubicacion_edit').val($(this).data('ubicacion'));
    
    $('#editrModal').modal('show');
});

$('.modal-footer').on('click', '.editr', function() {
    $.ajax({
        type: 'PUT',
        url: 'residencia/' + idres,
        data: {
            '_token': $('input[name=_token]').val(),
            'idresidencia': $('#residencia_edit').val(),
            'encargado': $('#encargado_edit').val(),
            'puesto': $('#puesto_edits').val(),
            'ubicacion': $('#ubicacion_edit').val()
        },

        success: function(data) {
            $('.errorResidencia').addClass('hidden');
            $('.errorEncargado').addClass('hidden');
            $('.errorPuesto').addClass('hidden');
            $('.errorUbicacion').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#addrModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 6000});
                }, 500);
                if (data.errors.idresidencia) {
                    $('.errorResidencia').removeClass('hidden');
                    $('.errorResidencia').text(data.errors.idresidencia);
                }
                if (data.errors.encargado) {
                    $('.errorEncargado').removeClass('hidden');
                    $('.errorEncargado').text(data.errors.encargado);
                }
                if (data.errors.puesto) {
                    $('.errorPuesto').removeClass('hidden');
                    $('.errorPuesto').text(data.errors.puesto);
                }
                if (data.errors.ubicacion) {
                    $('.errorUbicacion').removeClass('hidden');
                    $('.errorUbicacion').text(data.errors.ubicacion);
                }
            } else {
                toastr.info('La residencia de obra '+ data.ubicacion +' se actualizo.', 'Residencia de obra actualizada', {closeButton:true ,timeOut: 6000});
                $('.item'+data.idresidencia).replaceWith(
                            "<tr class='item"+data.idresidencia +"'>"+
                            "<td>"+ data.idresidencia +"</td>"+
                            "<td>"+ data.encargado +"</td>"+
                            "<td>"+ data.puesto +"</td>"+
                            "<td>"+ data.ubicacion +"</td>"+
                            "<td>"+ data.created_at +"</td>"+
                            "<td><button class='editr-modal btn btn-info btn-sm' data-idresc='"+ data.idresidencia + "'data-encarg='"+ data.encargado +"'data-puesto='"+ data.puesto +
                                "'data-ubicacion='"+ data.ubicacion +"'data-created='"+ data.created_at +"'>"+
                                "<span class='glyphicon glyphicon-edit'></span></button> "+
                                "<button class='deleter-modal btn btn-danger btn-sm' data-idresc='"+ data.idresidencia + "'data-encarg='"+ data.encargado +"'data-puesto='"+ data.puesto +
                                "'data-ubicacion='"+ data.ubicacion +"'data-created='"+ data.created_at +"'>"+
                                "<span class='glyphicon glyphicon-trash'></span></button>"+
                            "</td></tr>");

                location.reload();
            }
        }
        
    }); //ajax

});//modal-footer

$(document).on('click', '.deleter-modal', function(){
    $('.modal-title').text('Eliminar residencia');
    $('#residencia_delete').val($(this).data('idresc'));
    idres = $(this).data('idresc');

    $('#encargado_delete').val($(this).data('encarg'));
    $('#puesto_deletes').val($(this).data('puesto'));
    $('#ubicacion_delete').val($(this).data('ubicacion'));

    $('#deleterModal').modal('show');
});

$('.modal-footer').on('click','.deleter',function(){
    $.ajax({
        type: 'DELETE',
        url: 'residencia/'+ idres,
        data:{
            '_token': $('input[name=_token]').val(),
        },

        success: function(data){
            toastr.warning('Se ha eliminado la Residencia de obra '+ data.ubicacion +' !','Residencia eliminada',{closeButton:true, timeOut: 6000});
            $('.item' + data['idresidencia']).remove();

            location.reload();
        }
    });
});

$('.modal').on('hidden.bs.modal', function(){ 
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
});