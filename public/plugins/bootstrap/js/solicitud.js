$(document).ready(function(){

	$('.enviar').attr("disabled",true);
	$('#enviare').attr("onclick","enviar();");

	//function containTable(value){} 
	var tabla = $('#TablaInsumo').DataTable({
		"processing": true,
        "serverSide": true,
        "language":{
        	"url": urlconfiglenguageDatatables
        },

        "ajax": {
        	"url": urlsolicitar,
        	},

        "columns": [
        	{data: 'idpartida', name: 'idpartida'},
        	{data: 'descripcion', name: 'descripcion'},
        	{data: 'unidad_medida', name: 'unidad_medida'},
        	{data: 'precio', name: 'precio'},
        	{data: 'devolver', name: 'devolver'}
        ]
	});

	$('#TablaInsumo tbody').on('click','tr', function() {
		var data = tabla .row(this) .data();
		//console.log(data.idpartida);
		//var i=1;
		var fila = '<tr id="'+data.idproducto+'">'
				+'<td><button type="button" name="eliminar" id="'+ data.idproducto +'" class="btn btn-danger btn-xs btn_eliminar"><span class="glyphicon glyphicon-remove"></span></button></td>'
				+'<td><input type="hidden" class="idproducto" value="'+data.idproducto+'"><input type="text" class="idpartida" name="idpartida[]" value="'+ data.idpartida +'" size="4" readonly></td>'
				+'<td><input type="text" name="descripcion[]" value="'+ data.descripcion +'" size="90" readonly></td>'
				+'<td><input class="form-control cantidades" id="cantidad_'+data.idproducto+'" type="number" min="0" required></td>'
				+'<td><input type="text" name="unidad_medida[]" value="'+ data.unidad_medida +'" size="10" readonly></td>'
				+'<td><input id="precio_'+ data.idproducto +'" value="'+ data.precio+'" size="10" readonly></td>'
				+'<td><input type="text" value="0" id="import" class="importe_' + data.idproducto +' suma" style="text-align:right" readonly></td></tr>';
		//i++;

		$('#Tablalista tr:first').after(fila);
		tabla .row(this) .data();

		var nfilas  = $("#Tablalista tr").length;
		if(nfilas > 1){
			$('.enviar').attr("disabled",false);	
		}

		$(document).on('click','.btn_eliminar', function(){
			var button_id = $(this).parents().get(1);
			$(button_id).remove();//elimina la fila de Tablalista

			calculo();
			
			var nfilas  = $("#Tablalista tr").length;
			//console.log(nfilas);
			if (nfilas <= 1) {
				$('.enviar').attr("disabled",true);		
			}
		});

			$("#Tablalista thead").on("keyup" ,"tr", function(){
			var id = $(this).get(0).id;
			var timporte = ".importe_"+ id;
			var tcantidad = "#cantidad_"+ id;
			var tprecio = "#precio_"+ id;
			var importe = $(tcantidad).val() * Number($(tprecio).val());
			$(timporte).val(importe.toFixed(2));
			calculo(); 

		});

		function calculo(){//calculo del iva subtotal y total
			var sum=0;
			var iva=16;

			$(".suma").each(function() {
				sum += parseFloat($(this).val());
				//console.log(sum);
			});
			//console.log(sum);
			$('#stotal').val(sum.toFixed(2));

			var monto= $('#stotal').val();

			//////
			var ivas=(monto * iva)/100;

			$("input[id=iva]").val(ivas);
			$('#totaltotal').val((parseFloat(monto)+parseFloat(ivas)).toFixed(2));
			//$("input[id=totaltotal]").val(parseFloat(monto)+parseFloat(ivas));

			$('#iva').val(ivas.toFixed(2));
		}

	});


	/*$('#partida').change(function(event){
		$('#TablaInsumo').DataTable().destroy();
		containTable(event.target.value);
		//console.log(event.target.value);
	});*/
});

function enviar(){
var idproductos=[];
var cantidades=[];


	$('.idproducto').each(function (){
		var idproducto=$(this).val();
		idproductos.push(idproducto);
	}); 

		//console.log(idproductos);

	$('.cantidades').each(function(){
		var cantidad=$(this).val();
		cantidades.push(cantidad);
	});

	var total = $('#totaltotal').val();
	var idresidencia=$('#idresidencia').val();
	//var id = $('#idpartida').val();
	
	$.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		type:'POST',
		url: 'enviarSolicitud',
		data: {
			idproductos: idproductos,
			cantidades: cantidades,
			total: total,
			idresidencia:idresidencia
		},

		success: function(data) {
			$('.errorCantidad').addClass('hidden');
			$('.errorTotal').addClass('hidden');
			//alert('activo');
			//console.log(responde);
			//console.log(idproductos);

			if ((data.errors)) {
                setTimeout(function () {
                    toastr.error('Error de validación!', 'Error', {closeButton:true ,timeOut: 6000});
                }, 500);
                if (data.errors.cantidad_pedida) {
                	$('.errorCantidad').removeClass('hidden');
                	$('.errorCantidad').text(data.errors.cantidades);
                }
                if (data.errors.total) {
                	$('.errorTotal').removeClass('hidden');
                	$('.errorTotal').text(data.errors.total);
                }
            }

            if ((data.mensaje1)) {

            	alert(""+data.mensaje1);

            }
            if((data.mensaje2)){
            	toastr.success('El pedido se agrago a su lista de pedidos','Pedido enviado',{closeButton:true ,timeOut: 6000});
    
            	location.reload();
            }
            if ((data.mensaje3)) {

            	alert(""+data.mensaje3);

            }
			
		}

		/*error: function(){
		 	console.log('Error');
		}*/

	});
}
/*
$(document).ready(function(){
	$(":reset");
});
*/