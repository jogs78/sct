<!-- modal agregar nuevo usuario -->
<div id="adduModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <!--<div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usid" disabled>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('name_add', 'Nombre Completo:') !!}
                            {!! Form::text('name_add', null, ['class' => 'form-control', 'placeholder' => 'Ingresa nombre completo']) !!}
                            <p class="errorName text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('email_add', 'Email:') !!}
                            {!! Form::text('email_add', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo@correo.com']) !!}
                            <p class="errorEmail text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('password_add', 'Contraseña:') !!}
                            {!! Form::password('password_add', ['class' => 'form-control', 'placeholder' => '*********']) !!}
                            <p class="errorPassword text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::label('puesto_add', 'Puesto:') !!}
                            {!! Form::select('puesto_add', ['' => 'Seleccione un puesto', 
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
                            <div id="residencias"></div>
                            <p class="errorResidencia text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="addu btn btn-success" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-check'> </span> Agregar
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Cerrar
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>