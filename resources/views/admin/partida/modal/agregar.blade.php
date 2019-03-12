<!-- modal agregar nuevo -->
<div id="addModal" class="modal fade" role="dialog">
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
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="num_partida">Partida</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="numero_add">
                            <p class="errorNum_partida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nombre_partida">Nombre de la partida</label>
                        <div class="col-sm-9">
                            <input type="name" class="form-control" id="nombre_add">
                            <p class="errorNombre_partida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="add btn btn-success" data-dismiss="modal">
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