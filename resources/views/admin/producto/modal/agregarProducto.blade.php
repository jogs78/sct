<!-- modal agregar nuevo -->
<div id="addpModal" class="modal fade" role="dialog">
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
                        <label class="control-label col-sm-2" for="idprod">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_add" disabled>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="partidas">Partida</label>
                            <div id="partidas"></div>
                            <p class="errorPartida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="descripcion_add">Descripcion</label>
                            <input type="text" id="descripcion_add" class="form-control" placeholder="Descripcion del insumo...">
                            <p class="errorDescripcion text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="medida_add">Unidad de medida</label>
                            <input type="text" id="medida_add" class="form-control" placeholder="Unidad de medida del insumo...">
                            <p class="errorMedida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="cantidad_add">Cantidad</label>
                            <input type="text" id="cantidad_add" class="form-control" placeholder="Cantidad...">
                            <p class="errorCantidad text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="precio_add">Precio unitario ($)</label>
                            <input type="text" id="precio_add" class="form-control" placeholder="Precio del insumo...">
                            <p class="errorPrecio text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="devolver_add">Devolver</label>
                            <input type="text" id="devolver_add" class="form-control" placeholder="si o no...">
                            <p class="errorDevolver text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                </form>

                <div class="modal-footer">
                    <button type="button" class="addp btn btn-success" data-dismiss="modal">
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