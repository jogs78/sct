function calcular()
{
    $("#monto").val("hola2");
}

$(document).ready(function(){  

    function containTable (value)
    {
    	var tabla = $('#productosTabla').dataTable({

		"processing": true,
        "serverSide": true,

        "language": {
                    "url": urlconfiglenguageDatatables 
                    },

        "ajax": {
        	"url" : urlTableProductos,
            "type": "GET",
        	//"data" : value
        	
        },
            
        "columns": [
            {"data": "idpartida", name: "idpartida"},
            {"data": "descripcion", name: "descripcion"},
            {"data": "unidad_medida", name: "unidad_medida"},
            {"data": "precio", name: "precio"},
            {"data": "devolver", name: "devolver"}
        ]
        

    	});

        $("#listaTabla thead").on("keyup" ,"tr", function(){
            var id = $(this).get(0).id;
            var timporte = "#importe_" + id; 
            var tcantidad = "#cantidad_" + id; 
            var tprecio = "#precio_" + id; 
            var importe = $(tcantidad).val() * Number($(tprecio).text())
            $(timporte).text(importe);
//            alert("ok:" + importe );
        });   

        $('#productosTabla tbody').on('click','tr', function(){
            //$(this).toggleClass('selected'); //seleccion
			var data = tabla.row(this).data();   //<--
			//var row = tabla.row(data).data();
            //alert(data['descripcion']);
            //var cantidad = prompt('Seleccionaste: '+ data['descripcion']+'\n'+'Cantidad solicitada'+'('+data['unidad_medida']+')');
			//document.write(parseInt(cantidad));
			//console.log(data['descripcion']);  //<--
            var i = 1;
            var fila = '<tr id="'+ data['id'] +'">'
            + '<td>' + data['idpartida']+'</td> '
            + '<td>' + data['descripcion'] + '</td> ' 
            + '<td><input class="cantidades" id="cantidad_' + data['id'] +'" type="number" min="1" size="4" required></td>'
            + '<td>'+data['unidad_medida']+'</td>'
            + '<td id="precio_'+ data['id'] +'" >' + data['precio'] + '</td> '
            + '<td id="importe_'+ data['id'] + '"></td>'
            + '<td><button type="button" name="eliminar" id="' + data['id'] + '" class="btn btn-danger btn-md btn_eliminar"><span class="glyphicon glyphicon-remove"></span></button></td> </tr>';
                                
            i++;

            $('#listaTabla tr:first').after(fila);
            tabla.row(this).data();

            $(document).on('click', '.btn_eliminar', function(){  
                var button_id = $(this).parents().get(1);
                $(button_id).remove();///aqui me quede
                //var button_id = $(this).attr("id");
                //obtenemos el id al hacer click
            });

            
            var a = document.querySelectorAll("input[type='number']");
            if(a != undefined || a != null){
                a.forEach(function (x){
                    var precio = Number(x.parentElement.previousSibling.textContent);
//                    x.onkeyup = function(){
  //                      this.offsetParent.nextElementSibling.children[0].innerHTML = (precio * x.value);
    //                    generarImporte();
      //                  console.log(a);
        //            }
                }) //forEach
            } //if

            /*function generarImporte(){
                var a = document.querySelectorAll(".importe");
                if(a != undefined || a != null){
                    var total = new Number();
                    a.forEach(function (x){
                        total += Number(x.textContent);
                    });
                }
            }*/

		});   

    }

	$("#partidas").change(function(event){
		$('#productosTabla').DataTable().destroy();
        //console.log(event.target.value);
		containTable(event.target.value);
	});

});

