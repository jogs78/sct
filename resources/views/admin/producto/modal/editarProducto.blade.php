<!-- Modal editar -->
<div id="editpModal" class="modal fade" role="dialog">
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
                        <label class="control-label col-sm-1" for="id_editp">ID</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="id_editp" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="partidas">Partida</label>
                            <div id="partidas_edit"></div>
                            <p class="errorPartida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="descripcion_edit">Descripcion</label>
                            <input type="text" id="descripcion_edit" class="form-control">
                            <p class="errorDescripcion text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="medida_edit">Unidad de medida</label>
                            <input type="text" id="medida_edit" class="form-control" placeholder="Unidad de medida del insumo...">
                            <p class="errorMedida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="cantidad_edit">Cantidad</label>
                            <input type="text" id="cantidad_edit" class="form-control" placeholder="Cantidad...">
                            <p class="errorCantidad text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="precio_edit">Precio unitario ($)</label>
                            <input type="text" id="precio_edit" class="form-control" placeholder="Precio del insumo...">
                            <p class="errorPrecio text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="devolver_edit">Devolver</label>
                            <input type="text" id="devolver_edit" class="form-control" placeholder="si o no...">
                            <p class="errorDevolver text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="editp btn btn-success" data-dismiss="modal">
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
