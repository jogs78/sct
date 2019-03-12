<!-- modal eliminar -->
<div id="deleteuModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3 class="text-center">¿Desea eliminar al siguiente usuario?</h3>
                <br />
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="iduserd">ID</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="iduserd" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('name_delet', 'Nombre Completo') !!}
                            {!! Form::text('name_delet', null, ['class' => 'form-control', 'placeholder' => 'Ingresa nombre completo','disabled']) !!}
                            <p class="errorName text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('email_delet', 'Email') !!}
                            {!! Form::text('email_delet', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo@correo.com', 'disabled']) !!}
                            <p class="errorEmail text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <!--<div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('password_delet', 'Contraseña') !!}
                            {!! Form::password('password_delet', ['class' => 'form-control', 'placeholder' => '*********', 'disabled']) !!}
                            <p class="errorPassword text-center alert alert-danger hidden"></p>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('puesto_delet', 'Puesto') !!}
                            {!! Form::select('puesto_delet', ['' => 'Seleccione un puesto', 
                            'Administrador' => 'Administrador', 
                            'Delegado_administrativo' => 'Delegado Administrativo', 
                            'Delegado_obra' => 'Delegado de Obra',
                            'Auxiliar_administrativo' => 'Auxiliar Administrativo'], null, ['class' => 'form-control', 'disabled']) !!}
                            <p class="errorPuesto text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="residencias_delete">Residencia de obra:</label>
                            <div id="residencias_delete"></div>
                            <p class="errorResidencia text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="deleteu btn btn-danger" data-dismiss="modal">
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