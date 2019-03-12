<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Almacén General SCT | Vale de material</title>

    {!! Html::style('plugins/bootstrap/css/TablaPdf.css') !!}
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="fila0">
                    <div class="row">
                        <div class="uno">SECRETARIA DE COMUNICACIONES Y TRANSPORTES</div>
                        <div class="dos">RESIDENCIA GENERAL DE CONSERVACION DE CARRETERAS</div>
                        <div class="tres">VALE DE MATERIAL</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="num_vale">
                            <label for="numpedido"><strong>VALE - {{ $pedidos->idpedido }}</strong></label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div><strong>LUGAR Y FECHA: </strong> Tuxtla Gutiérrez, Chiapas a, {{ $pedidos->fecha_pedido }}</div>
                        <div><strong>RECIBI: </strong> DE LA OFICINA ADMINISTRATIVA</div>
                        <div><strong>PARA UTILIZARSE EN: </strong> RESIDENCIA DE OBRA {{ $pedidos->ubicacion }}</div>
                    </div>
                    <br>
                    <div class="row">
                        <table id="desgloce">
                            <thead>
                                <tr>
                                    <th>CANTIDAD</th>
                                    <th>UNIDAD DE MEDIDA</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($desgloce as $des)
                                <tr>
                                    <td>{{ $des->cantidad_pedida }}</td>
                                    <td>{{ $des->medida}}</td>
                                    <td class="descripcion">{{ $des->producto }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="entrego">
                            <div>ENTREGO</div>
                            <div>JEFE DE LA OFICINA ADMVA.</div>
                            <br>
                            <hr>
                            <div>C.GUSTAVO LIEVANO CRUZ</div>
                        </div>

                        <div class="recibi">
                            <div>RECIBI</div>
                            <br>
                            <br>
                            <hr>
                            <div></div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <br>
                </div>
                <br>
                <div class="fila1">
                <br>
                    <div class="row">
                        <div class="uno">SECRETARIA DE COMUNICACIONES Y TRANSPORTES</div>
                        <div class="dos">RESIDENCIA GENERAL DE CONSERVACION DE CARRETERAS</div>
                        <div class="tres">VALE DE MATERIAL</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="num_vale">
                            <label for="numpedido"><strong>VALE - {{ $pedidos->idpedido }}</strong></label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div><strong>LUGAR Y FECHA: </strong> Tuxtla Gutiérrez, Chiapas a, {{ $pedidos->fecha_pedido }}</div>
                        <div><strong>RECIBI: </strong> DE LA OFICINA ADMINISTRATIVA</div>
                        <div><strong>PARA UTILIZARSE EN: </strong> RESIDENCIA DE OBRA {{ $pedidos->ubicacion }}</div>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-hover table-bordered table-striped" id="desgloce">
                            <thead>
                                <tr>
                                    <th>CANTIDAD</th>
                                    <th>UNIDAD DE MEDIDA</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($desgloce as $des)
                                <tr>
                                    <td>{{ $des->cantidad_pedida }}</td>
                                    <td>{{ $des->medida}}</td>
                                    <td class="descripcion">{{ $des->producto }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="entrego">
                            <div>ENTREGO</div>
                            <div>JEFE DE LA OFICINA ADMVA.</div>
                            <br>
                            <hr>
                            <div>C.GUSTAVO LIEVANO CRUZ</div>
                        </div>
                        <div class="recibi">
                            <div>RECIBI</div>
                            <br>
                            <br>
                            <hr>
                            <div></div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="copia">COPIA SIN VALOR</div>
                    <br>
                </div>
            </div>
		</div>
	</div>

</body>
</html>