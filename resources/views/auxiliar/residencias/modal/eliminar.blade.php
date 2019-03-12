<!-- modal eliminar -->
<div id="deleterModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3 class="text-center">¿Desea eliminar la Residencia de obra?</h3>
                <br />
                <form class="form-horizontal" role="form">

                     <div class="form-group">
                        <div class="col-sm-12">
                            <label for="residencia">Clave de Residencia de obra</label>
                            <input type="text" class="form-control" id="residencia_delete" disabled>
                            <p class="errorResidencia text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="encargado">Nombre del encargado</label>
                            <input type="name" class="form-control" id="encargado_delete" disabled>
                            <p class="errorEncargado text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="puesto_delete">Puesto</label>
                            {!! Form::select('puesto_delete', ['' => 'Seleccione un puesto',  
                            'Delegado_obra' => 'Delegado de Obra'], null, ['class' => 'form-control','id'=>'puesto_deletes','disabled']) !!}
                            <p class="errorPartida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('ubicacion_delete', 'Ubicación de la Residencia de obra:') !!}
                            {!! Form::select('ubicacion_delete', ['' => 'Selecciona una opción',  
                            'Bochil' => 'Bochil', 
                            'Sn_Cristobal' => 'Sn. Cristobal', 
                            'Nvo_Orizaba' => 'Nvo. Orizaba', 
                            'La_Trinitaria' => 'La Trinitaria', 
                            'Tapachula' => 'Tapachula', 
                            'Arriaga' => 'Arriaga',
                            'Tuxtla' => 'Tuxtla'], null, ['class' => 'form-control','disabled']) !!}
                            <p class="errorUbicacion text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="deleter btn btn-danger" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-trash'></span> Eliminar
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Cerrar
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>