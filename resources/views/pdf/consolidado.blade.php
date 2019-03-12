<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Requisicón</title>

    {!! Html::style('plugins/bootstrap/css/TablaExcel.css') !!}
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<tr>
				<td>Nombre de la dependencia o entidad: CENTRO SCT CHIAPAS</td>
			</tr>
			<tr></tr>
			<tr>
				<td>Fecha de elaboración:</td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td>No. de requisición:</td>
			</tr>
			<tr></tr>
			<tr>
				<td>Lugar de entrega: ALMACEN CENTRAL (KM 5+500 DE LA CARRETERA TUXTLA-CHIAPA DE CORZO)</td>
			</tr>
			<tr></tr>	
		</div>

		<div class="col-md-12">
			<table id="desglocesgloce_consolidado">
               	<thead>
                 	<tr>
                    	<td style="font-weight: bold; border: 1px solid #000000;">No. de partida</td>
                    	<td style="font-weight: bold; border: 1px solid #000000;">CUCOP</td>
                       	<td></td>
                       	<td style="font-weight: bold; border: 1px solid #000000;">Descripción</td>
                       	<td></td>
                       	<td></td>
                       	<td></td>
                       	<td></td>
                       	<td style="font-weight: bold; border: 1px solid #000000;">Cantidad solicitada</td>
                       	<td style="font-weight: bold; border: 1px solid #000000;">Unidad de medida</td>
                      	<td style="font-weight: bold; border: 1px solid #000000;">Precio unitario</td>
                      	<td style="font-weight: bold; border: 1px solid #000000;">Importe</td>
                   	</tr>
               	</thead>
              	<tbody>
          
           		@for ($i = 0; $i < count($consolidado); $i++) 
       	            <tr>
                    	<td style="text-align:center; border: 1px solid #000000;">{{$consolidado[$i]->partida}}</td>
                    	<td colspan="2" style="text-align:center; border: 1px solid #000000;">{{$consolidado[$i]->cucop}}</td>
                        <td colspan="5" style="border: 1px solid #000000;">({{$consolidado[$i]->cambs}}) {{$consolidado[$i]->producto}}</td>
                       	<td style="text-align:center; border: 1px solid #000000;">{{$consolidado[$i]->cantidad}}</td>
                	    <td style="text-align:center; border: 1px solid #000000;">{{$consolidado[$i]->medida}}</td>
             	        <td style="text-align:right; border: 1px solid #000000;">$ {{$consolidado[$i]->precio}}</td>
                        <td style="text-align:right; border: 1px solid #000000;">$ {{$consolidado[$i]->importe}}</td>
                    </tr>
                @endfor

            	</tbody>
            </table>
		</div>
	</div>
</div>

</body>
</html>