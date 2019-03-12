<!-- modal editar -->
<div id="edituModal" class="modal fade" role="dialog">
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
                        <label class="control-label col-sm-1" for="iduser">ID</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="iduser" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('name_edit', 'Nombre Completo') !!}
                            {!! Form::text('name_edit', null, ['class' => 'form-control', 'placeholder' => 'Ingresa nombre completo']) !!}
                            <p class="errorName text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('email_edit', 'Email') !!}
                            {!! Form::text('email_edit', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo@correo.com']) !!}
                            <p class="errorEmail text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('puesto_edit', 'Puesto') !!}
                            {!! Form::select('puesto_edit', ['' => 'Seleccione un puesto', 
                            'Administrador' => 'Administrador', 
                            'Delegado_administrativo' => 'Delegado Administrativo', 
                            'Delegado_obra' => 'Delegado de Obra',
                            'Auxiliar_administrativo' => 'Auxiliar Administrativo'], null, ['class' => 'form-control']) !!}
                            <p class="errorPuesto text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="residencias">Residencia de obra:</label>
                            <div id="residencias_edit"></div>
                            <p class="errorResidencia text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="editu btn btn-success" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-ok-circle'></span> Editar
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Cerrar
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>