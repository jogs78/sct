<!-- modal eliminar -->
<div id="deletepModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3 class="text-center">¿Desea eliminar el siguiente insumo?</h3>
                <br />
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="id_deletep">ID</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="id_deletep" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="partidas">Partida</label>
                            <div id="partidas_delete" disabled></div>
                            <p class="errorPartida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="descripcion_delete">Descripcion</label>
                            <input type="text" id="descripcion_delete" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="medida_delete">Unidad de medida</label>
                            <input type="text" id="medida_delete" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="cantidad_delete">Cantidad</label>
                            <input type="text" id="cantidad_delete" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="precio_delete">Precio unitario ($)</label>
                            <input type="text" id="precio_delete" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="devolver_delete">Devolver</label>
                            <input type="text" id="devolver_delete" class="form-control" disabled="">
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="deletep btn btn-danger" data-dismiss="modal">
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