contador=0;

$(document).ready(function() {
    $('#MostrarAsignar').DataTable({
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

//NUEVA ASIGNACION

$(document).ready(function (){
    $('#agregar').attr("onclick","Asignar();");
    ObtenerResidencias();
    ObtenerListaPartidas();
    calcular_total();
});


$(document).on('click','.AgregarFila',function(){
   
    var nueva_fila ='<tr>'+
                    '<td><input type="button" class="EliminarFila btn btn-danger btn-sm" value="X"></td>'+
                    '<td><select id="partidaslist'+contador+'" class="form-control idpartida" name="partidaslist"></select></td>'+
                    '<td><input type="text" id="monto'+contador+'" class="form-control monto" onkeyup="calcular_total();" name="monto" min="0" value="0"></td>'+
                    '</tr>';
    var objTabla = $(this).parents().get(3);
    $(objTabla).find('tbody').append(nueva_fila);
    var partidaslist="partidaslist";
    ObtenerPartidas(partidaslist,contador);
     contador++;
     calcular_total();
});

$(document).on('click','.EliminarFila',function(){
    var objCuerpo = $(this).parents().get(2);
    if($(objCuerpo).find('tr').length==1){
        if(!confirm('Esta es el única fila de la lista ¿Desea eliminarla?')){
            return;
        }
    }

    var objFila = $(this).parents().get(1);
    $(objFila).remove();
    calcular_total();
});


function calcular_total() {
 
var total = 0;

  $(".monto").each(function() {
    if (isNaN(parseFloat($(this).val()))) {
      total += 0;
    } else {
      total += parseFloat($(this).val());
    }
  });


  //document.getElementById('TotalMontos').innerHTML = total;
    $("#TotalMontos").val(total);

}

//Modal Eliminar
$(document).on('click', '.delete-modal', function(){
    $('.modal-title').text('Eliminar asignación');

    //$('#id_delete').val($(this).data('idpartida'));
    idasignar=$(this).data('idasignar');

    $('#ubicacion_delete').val($(this).data('ubicacion'));
    $('#mes_delete').val($(this).data('mes'));
    $('#total_delete').val($(this).data('total'));

    $('#deleteModal').modal('show');
});

$('.modal-footer').on('click','.delete',function(){
    $.ajax({
        type: 'DELETE',
        url: 'asignar/'+ idasignar,
        data:{
            '_token': $('input[name=_token]').val(),
        },
        success: function(data){
            toastr.success('La asignación se elimino!','Asignación eliminada',{closeButton:true, timeOut: 6000});
            $('.item' + data['idasignar']).remove();
        }
    });
});

//modal agregar nuevo
$(document).on('click', '.add-modal', function(){
    $('#AsignarModal').modal('show');
});

//select de residencias
function ObtenerResidencias(){

    var url='ObtenerResidencias';

    $.ajax({
        type:'get',
        url:url,
        dataType:"JSON",
            
        success:function (respuesta) {
            //console.log(respuesta);
            pintarResidencias(respuesta);
        },

        error:function () {
            alert("error de las residencias");
        }

    });
}

function pintarResidencias(residencias){

    var html='<select name="residencia" id="residencia" class="form-control">';
        html+='<option value selected="selected"> - Seleccione una residencia - </option>';
    for (var i =0; i < residencias.length; i++) {
        html+='<option value="'+residencias[i].idresidencia+'">'+residencias[i].ubicacion+'</option>';
    }

    html+='</select>';

    $("#residencias").html(html);
}


//select de partidas en el modal agregar
function ObtenerListaPartidas(){
    var url='ObtenerListaPartidas';

    $.ajax({
        type:'get',
        url:url,
        dataType:"JSON",

        success:function (respuesta){
            pintarPartidas(respuesta);
        },

        error:function (){
            alert("error en partidas");
        }
    });
}

function pintarPartidas(partidas){
    var html ='<select name="listapartida" id="listapartida" class="form-control idpartida">';
    html+='<option value selected="selected"> - Seleccione una partida - </option>';
    for (var i =0; i < partidas.length; i++) {
        html+='<option value="'+partidas[i].idpartida+'">'+partidas[i].idpartida+'-'+partidas[i].nombre_partida+'</option>'; 
    }

    html+='</select>';
    $("#partidas").html(html);
}

function ObtenerPartidas(partidaslist,contador){
 var url='ObtenerListaPartidas';

    $.ajax({
        type:'get',
        url:url,
        dataType:"JSON",

        success:function (respuesta){
            pintarPartidas2(respuesta,partidaslist,contador);
        },

        error:function (){
            alert("error en partidas");
        }
    });

}

function pintarPartidas2(partidas,partidaslist,contador){

    var html="";
     html+='<option value selected="selected"> - Seleccione una partida - </option>';
    for (var i =0; i < partidas.length; i++) {
        html+='<option value="'+partidas[i].idpartida+'">'+partidas[i].idpartida+'-'+partidas[i].nombre_partida+'</option>'; 
    }
    html+="";
 
    $("#"+partidaslist+contador+"").html(html);

}

function Asignar(){
    var idpartidas=[];
    var montos=[];

    $('.idpartida').each(function (){
        var idpartida=$(this).val();
        idpartidas.push(idpartida);
    });

    $('.monto').each(function (){
        var monto=$(this).val();
        montos.push(monto); 
    });

    var total = $('#TotalMontos').val();
    var idresidencia=$('#residencia').val();
    var mes=$('#mes').val();
   

     $.ajax({
       headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        type:'POST',
        url: 'asignarMonto',
        data: {
            idpartidas: idpartidas,
            montos: montos,
            total: total,
            idresidencia:idresidencia,
            mes:mes
        },

        success: function(data) {
            $('.errorMonto').addClass('hidden');
            $('.errorPartida').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 6000});
                }, 500);
                if (data.errors.monto_partida) {
                    $('.errorMonto').removeClass('hidden');
                    $('.errorMonto').text(data.errors.monto_partida);
                }
                if (data.errors.idpartida) {
                    $('.errorPartida').removeClass('hidden');
                    $('.errorPartida').text(data.errors.idpartida);
                }
            } else {
                toastr.success('Realizo una nueva asignación','Nueva asignación',{closeButton:true ,timeOut: 6000});
                location.reload();
            }
        },

        error: function (vjqXHR, vtextStatus, verrorThrown){
                 alert(""+verrorThrown);
             }

    });


}
/*
$("#btnCerrar").click(function(event) {
       $("#AsignarFormulario")[0].reset();
   });*/

$('.modal').on('hidden.bs.modal', function(){ 
        $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
        $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
    });