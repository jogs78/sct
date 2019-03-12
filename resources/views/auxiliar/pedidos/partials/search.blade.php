<div class="row">
        <div class="panel panel-info">
            <div class="panel-heading"><strong>Buscar por</strong></div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="col-md-4">
                        <h5>Residencia</h5>
                        <div class="col-md-9">
                            <select class="form-control" id="residencias" name="residenciasid">
                                <option value='0'> - Todos - </option>
                                @foreach($residencias as $bc)
                                    <option value='{{$bc->idresidencia}}'> {{ $bc->ubicacion }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h5>Estado</h5>
                        <div class="col-md-9">
                            <select class="form-control" id="estados" name="estadosid">
                                <option value='0'> - Todos - </option>
                                @foreach($estados as $es)
                                    <option value='{{$es->idestado}}'> {{ $es->descripcion }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h5>Rango de fecha</h5>

                        <div class="col-md-2">
                            <h6>De</h6>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="date" name="fecha1" id="fecha1">
                        </div>
                            
                        <div class="col-md-2">
                            <h6>Hasta</h6>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="date" name="fecha2" id="fecha2">
                        </div>
                        <div class="col-md-4">
                            <input class=" btn btn-primary btn-sm" type="button" name="btnfiltrar" id="btnfiltrar" value="Buscar">
                        </div>
                        <div class="col-md-4">
                            <input class=" btn btn-info btn-sm" type="button" name="btnlimpiar" id="btnlimpiar" value="Todos">
                        </div>


                    </div>
                </div>
            </div>
        </div>    
    </div>