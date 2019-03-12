
$(document).ready(function () {

//se va accionar por un botton la busqueda ? o al cambio ? yo creo que con un boton ok
//tu vista cual es ?, donde es tu head para poner el js ? ya esta
    $("#filtrarmes").attr("onclick", "filtrarmes();");



});


function filtrarmes(){
	var url='filtradopormesconsolidado';

	var fecha=$("#mes").val();

	var array_fechasol = fecha.split("-")  //esta linea esta bien y te genera el arreglo
	var ano = parseInt(array_fechasol[0]); 
	var mes = parseInt(array_fechasol[1]); 
//var dia  = parseInt(array_fechasol[0]); 
	 $.ajax({
             type: 'get',
             url: url ,
             dataType: "JSON",
               data:{ano:ano,mes:mes},
              success: function (vresponse){

                if(vresponse.length>0){
                   // console.log(vresponse);
                 $("#tabla_consolidado").empty()
                	pintarConsolidado(vresponse);

                }else{
                     var vhtml ='<p style="text-align:center" class="text-warning">';
                               vhtml+=' <strong>No existen pedidos en el mes seleccionado.</strong>';
                               vhtml+='</p>';
                   $("#tabla_consolidado").empty()

                    $("#tabla_consolidado").html(vhtml);

                }

               
                  
             },
             error: function (vjqXHR, vtextStatus, verrorThrown){
                 alert("error: "+verrorThrown);
                 //toastrAlert(verrorThrown, vtitle, 0);
             }
         });




}

function pintarConsolidado(consolidado){

	var html='<div>';//oye aqui no lleva algo?, entre las comillas,lo q pasa esq no esta entrando al for
	html+='<table class="table table-hover table-bordered table-striped table-condensed" id="desglocesgloce_consolidado">';
               html+='<thead>';
                 html+='<tr>';
                       html+='<th class="text-center">No. de partida</th>';
                       html+=' <th class="text-center">CUCOP</th>';
                        html+='<th class="text-center">Descripción</th>';
                       html+=' <th class="text-center">Cantidad solicitada</th>';
                        html+='<th class="text-center">Unidad de medida</th>';
                       html+='<th class="text-center">Precio unitario</th>';
                       html+='<th class="text-center">Importe</th>';
                    html+='</tr>';
                html+='</thead>';
               html+='<tbody>';
          //console.log(consolidado);     
           	for (var i = 0; i < consolidado.length; i++) {
           	              html+="<tr>";

                          html+="<td style='text-align:center;>"+consolidado[i].partida+"</td>";

                           html+='<td>'+consolidado[i].cucop+'</td>';

                            html+='<td>('+consolidado[i].cambs+") "+ consolidado[i].producto+'</td>';
                            html+='<td>'+consolidado[i].cantidad+'</td>';
                            html+='<td>'+consolidado[i].medida+'</td>';
                            html+='<td>$ '+consolidado[i].precio+'</td>';
                            html+='<td>$ '+consolidado[i].importe+'</td>';
                        html+='</tr>';
                    }
               html+='</tbody>';
           html+='</table></div>';
           html+='<a class="btn btn-primary" href="">Descargar Excel</a>';//ExcelConsolidado/'+consolidado[i].mes+'/'+consolidado[i].anio+'

            $("#tabla_consolidado").html(html);

}
