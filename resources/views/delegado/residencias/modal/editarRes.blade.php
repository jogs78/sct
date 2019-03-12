<!-- Modal editar -->
<div id="editrModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="residencia">Clave de Residencia de obra</label>
                            <input type="text" class="form-control" id="residencia_edit" >
                            <p class="errorResidencia text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="encargado">Nombre del encargado</label>
                            <input type="name" class="form-control" id="encargado_edit">
                            <p class="errorEncargado text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="puesto_edit">Puesto</label>
                            {!! Form::select('puesto_edit', ['' => 'Seleccione un puesto',  
                            'Delegado_obra' => 'Delegado de Obra'], null, ['class' => 'form-control','id'=>'puesto_edits']) !!}
                            <p class="errorPartida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('ubicacion_edit', 'Ubicación de la Residencia de obra:') !!}
                            {!! Form::select('ubicacion_edit', ['' => 'Selecciona una opción',  
                            'Bochil' => 'Bochil', 
                            'Sn_Cristobal' => 'Sn. Cristobal', 
                            'Nvo_Orizaba' => 'Nvo. Orizaba', 
                            'La_Trinitaria' => 'La Trinitaria', 
                            'Tapachula' => 'Tapachula', 
                            'Arriaga' => 'Arriaga',
                            'Tuxtla' => 'Tuxtla'], null, ['class' => 'form-control']) !!}
                            <p class="errorUbicacion text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    
                </form>

                <div class="modal-footer">
                    <button type="button" class="editr btn btn-success" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-ok-circle'></span> Actualizar
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Cerrar
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
