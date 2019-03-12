var iduser=0;

$(document).ready(function() {
    $('#usersTabla').DataTable({
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

$(document).ready(function () {
    ObtenerResidencias();
});

// modal agregar nuevo
$(document).on('click', '.addu-modal', function(){
    $('.modal-title').text('Agregar nuevo usuario');
    $('#adduModal').modal('show');
});

$('.modal-footer').on('click', '.addu', function() {
    $.ajax({
        type: 'POST',
        url: 'users',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('#name_add').val(),
            'email': $('#email_add').val(),
            'password': $('#password_add').val(),
            'puesto': $('#puesto_add').val(),
            'idresidencia': $('#residencia_add').val() 
        },

        success: function(data) {
            $('.errorName').addClass('hidden');
            $('.errorEmail').addClass('hidden');
            $('.errorPassword').addClass('hidden');
            $('.errorPuesto').addClass('hidden');
            $('.errorResidencia').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#adduModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 6000});
                }, 500);
                if (data.errors.name) {
                    $('.errorName').removeClass('hidden');
                    $('.errorName').text(data.errors.name);
                }
                if (data.errors.email) {
                    $('.errorEmail').removeClass('hidden');
                    $('.errorEmail').text(data.errors.email);
                }
                if (data.errors.password) {
                    $('.errorPassword').removeClass('hidden');
                    $('.errorPassword').text(data.errors.password);
                }
                if (data.errors.puesto) {
                    $('.errorPuesto').removeClass('hidden');
                    $('.errorPuesto').text(data.errors.puesto);
                }
                if (data.errors.idresidencia) {
                    $('.errorResidencia').removeClass('hidden');
                    $('.errorResidencia').text(data.errors.idresidencia);
                }
            } else {
                toastr.success('El usuario '+ data.name +' se agrego exitosamente!!', 'Usuario Nuevo', {closeButton:true ,timeOut: 6000});
                $('#usersTabla').append(
                            "<tr class='item"+data.iduser +"'>"+ "<td>"+ data.iduser +"</td>"+
                            "<td>"+ data.name +"</td>"+
                            "<td>"+ data.email +"</td>"+
                            "<td>"+ data.puesto +"</td>"+
                            "<td>"+ data.ubicacion +"</td>"+
                            "<td> <button class='editu-modal btn btn-info btn-sm' data-idusers='"+ data.iduser +
                                "'data-names='"+ data.name + "'data-emails='"+ data.email +"'data-passwords='"+ data.password +
                                "'data-puestos='"+ data.puesto +"'data-idresidencia='"+ data.ubicacion +"'> "+
                                "<span class='glyphicon glyphicon-edit'></span></button> "+
                                "<button class='deleteu-modal btn btn-danger btn-sm' data-iduser='"+ data.iduser + "' data-names='"+ data.name +
                                "'data-emails='"+ data.email +"' data-passwords='"+ data.password +
                                "'data-puestos='"+ data.puesto + "'data-idresidencia='"+ data.ubicacion +"'>"+
                                "<span class='glyphicon glyphicon-trash'></span></button>"+
                            "</td></tr>");

                location.reload();
            }
        }
        
    }); //ajax

});//modal-footer

//  --------modal editar
$(document).on('click', '.editu-modal', function(){
    $('.modal-title').text('Editar usuario');
    $('#iduser').val($(this).data('idusers'));
    iduser = $(this).data('idusers');

    $('#name_edit').val($(this).data('names'));
    $('#email_edit').val($(this).data('emails'));
    $('#puesto_edit').val($(this).data('puestos'));
    $('#residencia_edit').val($(this).data('idresidencia'));
    
    $('#edituModal').modal('show');
});


$('.modal-footer').on('click', '.editu', function() {
    $.ajax({
        type: 'PUT',
        url: 'users/' + iduser,
        data: {
            'iduser': $("#iduser").val(),
            'name': $('#name_edit').val(),
            'email': $('#email_edit').val(),
            'puesto': $('#puesto_edit').val(),
            'idresidencia': $('#residencia_edit').val(),
            '_token': $('input[name=_token]').val()
        },

        success: function(data) {
        	$('.errorName').addClass('hidden');
            $('.errorEmail').addClass('hidden');
            $('.errorPuesto').addClass('hidden');
            $('.errorResidencia').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#edituModal').modal('show');
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 6000});
                }, 500);
                if (data.errors.name) {
                    $('.errorName').removeClass('hidden');
                    $('.errorName').text(data.errors.name);
                }
                if (data.errors.email) {
                    $('.errorEmail').removeClass('hidden');
                    $('.errorEmail').text(data.errors.email);
                }
                if (data.errors.puesto) {
                    $('.errorPuesto').removeClass('hidden');
                    $('.errorPuesto').text(data.errors.puesto);
                }
                if (data.errors.ubicacion) {
                    $('.errorResidencia').removeClass('hidden');
                    $('.errorResidencia').text(data.errors.ubicacion);
                }
            } else {
                toastr.info('El usuario '+ data.name +' se actualizo exitosamente!!', 'Usuario actualizado', {closeButton:true ,timeOut: 6000});
                $('.item'+data.iduser).replaceWith(
                            "<tr class='item"+data.iduser +"'>"+ "<td>"+ data.iduser +"</td>"+
                            "<td>"+ data.name +"</td>"+
                            "<td>"+ data.email +"</td>"+
                            "<td>"+ data.puesto +"</td>"+
                            "<td>"+ data.ubicacion +"</td>"+
                            "<td> <button class='editu-modal btn btn-info btn-sm' data-iduser='"+ data.iduser +
                                "'data-names='"+ data.name + "'data-emails='"+ data.email +
                                "'data-puestos='"+ data.puesto + "'data-idresidencia='"+ data.ubicacion +"'> "+
                                "<span class='glyphicon glyphicon-edit'></span></button> "+
                                "<button class='deleteu-modal btn btn-danger btn-sm' data-iduser='"+ data.iduser + "' data-names='"+ data.name +
                                "'data-emails='"+ data.email +
                                "'data-puestos='"+ data.puesto + "'data-idresidencia='"+ data.ubicacion +
                                "'>"+
                                "<span class='glyphicon glyphicon-trash'></span></button>"+
                            "</td></tr>");

                location.reload();
            }
        },
        
    }); //ajax

});

//Modal Eliminar
$(document).on('click', '.deleteu-modal', function(){
    $('.modal-title').text('Eliminar usuario');

    $('#iduserd').val($(this).data('idusers'));
    iduser = $(this).data('idusers');

    $('#name_delet').val($(this).data('names'));
    $('#email_delet').val($(this).data('emails'));
    //$('#password_delet').val($(this).data('passwords'));
    $('#puesto_delet').val($(this).data('puestos'));
    $('#residencia_delet').val($(this).data('idresidencia'));

    $('#deleteuModal').modal('show');
});

$('.modal-footer').on('click','.deleteu',function(){
    $.ajax({
        type: 'DELETE',
        url: 'users/'+ iduser,
        data:{
            '_token': $('input[name=_token]').val(),
        },
        success: function(data){
            toastr.warning('Se ha eliminado el usuario '+ data.name +'.','Usuario eliminado',{closeButton:true, timeOut: 6000});
            $('.item' + data['iduser']).remove();

            location.reload();
        }
    });
});

//select residencias
function ObtenerResidencias(){

    var url='Obtenerresidencias';

    $.ajax({
        type:'get',
        url:url,
        dataType:"JSON",
            
        success:function (respuesta) {
            //console.log(respuesta);
            pintarResidencias(respuesta);
        },

        error:function () {
            alert("error residencia");
        }

    });
}

function pintarResidencias(residencias){
//agregar
    var html='<select name="residencia_add" id="residencia_add" class="form-control">';
        html+='<option value selected="selected"> - Seleccione una residencia de obra - </option>';
    for (var i =0; i < residencias.length; i++) {
        html+='<option value="'+residencias[i].idresidencia+'">'+residencias[i].ubicacion+'</option>';
    }
    html+='</select>';
    $("#residencias").html(html);

//editar
    var html='<select name="residencia_edit" id="residencia_edit" class="form-control">';
        html+='<option value selected="selected"> - Seleccione una residencia de obra - </option>';
    for (var i =0; i < residencias.length; i++) {
        html+='<option value="'+residencias[i].idresidencia+'">'+residencias[i].ubicacion+'</option>';
    }
    html+='</select>';
    $("#residencias_edit").html(html);

//eliminar
    var html='<select name="residencia_delet" id="residencia_delet" class="form-control" disabled>';
    for (var i =0; i < residencias.length; i++) {
        html+='<option value="'+residencias[i].idresidencia+'">'+residencias[i].ubicacion+'</option>';
    }
    html+='</select>';
    $("#residencias_delete").html(html);
}
