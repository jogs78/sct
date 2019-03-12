var idpartida=0;

$(document).ready(function() {
    $('#partidaTabla').DataTable({
        //"precessing": true,
        //"serverSide": true,

        "language": {
            "url": urlconfiglenguageDatatables 
        },

        //"ajax": urlcontainTable,

        /*"columns":[
            {"data": "idpartida"},
            {"data": "num_partida"},
            {"data": "nombre_partida"},
            {"defaultContent":"<button class='edit-modal btn btn-info' data-idpartida='idpartida' data-numero='num_partida' data-nombre='nombre_partida'><span class='glyphicon glyphicon-edit'></span> Editar</button><button class='delete-modal btn btn-danger' data-idpartida='idpartida' data-numero='num_partida' data-nombre='nombre_partida''><span class='glyphicon glyphicon-trash'></span> </button>"}
        ]*/

    });
});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip(); 
});

//partidaTabla

// modal agregar nuevo
$(document).on('click', '.add-modal', function(){
    $('.modal-title').text('Agregar partida');
    $('#addModal').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajax({
        type: 'POST',
        url: 'partida',
        data: {
            '_token': $('input[name=_token]').val(),
            'idpartida': $('#numero_add').val(),
            'nombre_partida': $('#nombre_add').val()
        },

        success: function(data) {
            $('.errorNum_partida').addClass('hidden');
            $('.errorNombre_partida').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 8000});
                }, 500);
                if (data.errors.num_partida) {
                    $('.errorNum_partida').removeClass('hidden');
                    $('.errorNum_partida').text(data.errors.num_partida);
                }
                if (data.errors.nombre_partida) {
                    $('.errorNombre_partida').removeClass('hidden');
                    $('.errorNombre_partida').text(data.errors.nombre_partida);
                }
            } else {
                toastr.success('La partida '+data.nombre_partida+' se agrego exitosamente!!', 'Partida Nueva', {closeButton:true ,timeOut: 8000});
                $('#partidaTabla').append(
                            "<tr class='item"+data.idpartida +"'>"+ "<td>"+ data.idpartida +"</td>"+
                            "<td>"+ data.nombre_partida +"</td>"+
                            "<td> <button class='edit-modal btn btn-info btn-sm' data-idpartida='"+data.idpartida+
                                "'data-nombre='"+ data.nombre_partida +"'>"+
                                "<span class='glyphicon glyphicon-edit'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-idpartida='"+ data.idpartida +
                                "'data-nombre='"+ data.nombre_partida +"'><span class='glyphicon glyphicon-trash'></span> </button>"+
                            "</td></tr>");

                location.reload();
            }
        }
        
    }); //ajax

});//modal-footer

/*modal editar*/
$(document).on('click', '.edit-modal', function(){
    $('.modal-title').text('Editar');
    //$('#id_edit').val($(this).data('idpartida'));
    idpartida=$(this).data('idpartida');

    $('#numero_edit').val($(this).data('idpartida'));
    $('#nombre_edit').val($(this).data('nombre'));

    $('#editModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'PATCH',
        url: 'partida/'+ idpartida,
        data: {
            '_token': $('input[name=_token]').val(),
            'idpartida': $('#numero_edit').val(),
            'nombre_partida': $('#nombre_edit').val()
        },

        success: function(data) {
            $('.errorNum_partida').addClass('hidden');
            $('.errorNombre_partida').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#editModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 8000});
                }, 500);
                if (data.errors.idpartida) {
                    $('.errorNum_partida').removeClass('hidden');
                    $('.errorNum_partida').text(data.errors.idpartida);
                }
                if (data.errors.nombre_partida) {
                    $('.errorNombre_partida').removeClass('hidden');
                    $('.errorNombre_partida').text(data.errors.nombre_partida);
                }
            } else {
                toastr.info('Se actualizo una partida', 'Partida actualizada', {closeButton:true, timeOut: 8000});
                $('.item'+data.idpartida).replaceWith(
                            "<tr class='item"+data.idpartida +"'>"+ "<td>"+ data.idpartida +"</td>"+
                            "<td>"+ data.nombre_partida +"</td>"+
                            "<td> <button class='edit-modal btn btn-info btn-sm' data-idpartida='"+data.idpartida+
                                "'data-nombre='"+ data.nombre_partida +"'>"+
                                "<span class='glyphicon glyphicon-edit'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-idpartida='"+ data.idpartida +
                                "'data-nombre='"+ data.nombre_partida +"'><span class='glyphicon glyphicon-trash'></span> </button>"+
                            "</td></tr>");

                location.reload();
            }
        }
        
    }); //ajax

});

//Modal Eliminar
$(document).on('click', '.delete-modal', function(){
    $('.modal-title').text('Eliminar partida');

    //$('#id_delete').val($(this).data('idpartida'));
    idpartida=$(this).data('idpartida');

    $('#numero_delete').val($(this).data('idpartida'));
    $('#nombre_delete').val($(this).data('nombre'));

    $('#deleteModal').modal('show');
});

$('.modal-footer').on('click','.delete',function(){
    $.ajax({
        type: 'DELETE',
        url: 'partida/'+ idpartida,
        data:{
            '_token': $('input[name=_token]').val(),
        },
        success: function(data){
            toastr.warning('La partida se elimino!','Partida Eliminada',{closeButton:true, timeOut: 8000});
            $('.item' + data['idpartida']).remove();

            location.reload();
        }
    });
});