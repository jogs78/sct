$(document).ready(function() {

  $("#btnfiltrar").attr("onclick","filtrarporfechas();");
  $("#btnlimpiar").attr("onclick","limpiarfechas();");
  $('[data-toggle="tooltip"]').tooltip();

    $("select[name=residenciasid]").change(function(){

        //  alert($('select[name=residenciasid]').val());
        var residenciaid=$('select[name=residenciasid]').val();

        consultaporresidencia(residenciaid);

    });

    $("select[name=estadosid]").change(function(){
        //alert($('select[name=estadosid]').val());
        var estadoid=$('select[name=estadosid]').val();

        consultaporestado(estadoid);
    });


    $('#consultar_reporte').DataTable({

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

function consultaporresidencia(residenciaid){

    var url = 'ObtenerPedidosporResidencia';
    
         $.ajax({
             type: 'get',
             url: url ,
             dataType: "JSON",
             data:{idresidencia:residenciaid},
              success: function (vresponse){
               // console.log(vresponse);

                if (vresponse.length>0) {
                    $("#pedidos").empty();
                    pintarPedidos(vresponse);

                     }else{
                     var vhtml ='<p style="text-align:center" class="text-warning">';
                               vhtml+=' <strong>No existen pedidos registrados con esa residencia.</strong>';
                               vhtml+='</p>';
                  $("#pedidos").empty();

                    $("pedidos").html(vhtml);

                }

                  
             },
             error: function (vjqXHR, vtextStatus, verrorThrown){
                 alert("error");
                 //toastrAlert(verrorThrown, vtitle, 0);
             }
         });
   
}

function limpiarfechas(){
  $("#fecha1").val("");
  $("#fecha2").val("");
  filtrarporfechas();
}

function consultaporestado(estadoid){

    var url = 'ObtenerPedidosporEstado';
    var estado=$("#estados").val();
    
         $.ajax({
             type: 'get',
             url: url ,
             dataType: "JSON",
             data:{idestado:estadoid},
              success: function (vresponse){
               // console.log(vresponse);

                if (vresponse.length>0) {
                    $("#pedidos").empty();
                    pintarPedidos(vresponse);

                     }else{
                     var vhtml ='<p style="text-align:center" class="text-warning">';
                               vhtml+=' <strong>No existen pedidos registrados con este estado.</strong>';
                               vhtml+='</p>';
                  $("#pedidos").empty();

                    $("pedidos").html(vhtml);

                }

                  
             },
             error: function (vjqXHR, vtextStatus, verrorThrown){
                 alert("error");
                 //toastrAlert(verrorThrown, vtitle, 0);
             }
         });
}

function filtrarporfechas(){

     var url = 'ObtenerPedidosporFechas';
     var fecha1=$("#fecha1").val();
     var fecha2=$("#fecha2").val();
    
         $.ajax({
             type: 'get',
             url: url ,
             dataType: "JSON",
             data:{fecha1:fecha1,fecha2:fecha2},
              success: function (vresponse){
               // console.log(vresponse);

                if (vresponse.length>0) {
                    $("#pedidos").empty();
                    pintarPedidos(vresponse);

                     }else{
                     var vhtml ='<p style="text-align:center" class="text-warning">';
                               vhtml+=' <strong>No existen pedidos registrados con este estado.</strong>';
                               vhtml+='</p>';
                  $("#pedidos").empty();

                    $("pedidos").html(vhtml);

                }

                  
             },
             error: function (vjqXHR, vtextStatus, verrorThrown){
                 alert("error");
                 //toastrAlert(verrorThrown, vtitle, 0);
             }
         });


}



function pintarPedidos(pedidos){
    
var html=' <div class="col-md-12 col-sm-12">';
           html+=' <div class="table-responsive">';
             html+='<table class="table table-hover table-bordered table-striped table-condensed" id="consultar_reporte"> ';
             html+=' <thead>';
               html+='<tr>';
                      html+='<th class="text-center">No. de pedido</th>';
                    html+=' <th class="text-center">Residencia</th>';
                        html+='<th class="text-center">Total</th>';
                         html+='<th class="text-center">Fecha</th>';
                         html+='<th class="text-center">Estado</th>';
                           html+='<th></th>';
                        html+='</tr>';
                    html+='</thead>';
                    html+="<tbody>";
                       for (var i =0; i < pedidos.length; i++) {
                        
                       html+= '<tr class="item'+ pedidos[i].idpedido +'}}">';
                       html+= '<td>'+ pedidos[i].idpedido +'</td>';
                       html+= '<td>'+pedidos[i].ubicacion+' </td>';
                       html+= '<td>$ '+pedidos[i].total +'</td>';
                       html+= '<td>'+pedidos[i].fecha_pedido +'</td>';
                       html+= '<td>'+ pedidos[i].descripcion +'</td>';
                        html+= '<td>';
                        html+=    '<a data-toggle="tooltip" data-placement="top" title="Ver desgloce" class="btn btn-primary btn-sm" href="desgloces/'+pedidos[i].idpedido+'"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>';
                       //{{ URL::action("DelegadoController@desgloce", $pe->idpedido) }}
                        html+=  '</td>';
                    html+=    '</tr>';
                        
                       }
                                                  
            html+=  '</tbody>';
        html+=  '</table>';
    html+=   '</div>';
 html+=  '</div>';


$("#pedidos").html(html);
setTable();
}


/////
function setTable(){
    $('#consultar_reporte').DataTable({

        //"precessing": true,
        //"serverSide": true,

        "language": {
            "url": urlconfiglenguageDatatables 
        },

        //"ajax": urlcontainTable,

        /*"columns":[
            
        ]*/

    });
}