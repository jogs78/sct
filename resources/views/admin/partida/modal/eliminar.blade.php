<!-- modal eliminar -->
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h3 class="text-center">¿Esta seguro de eliminar la siguiente partida?</h3>
                <br />
                <form class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="num_partida">Partida</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="numero_delete" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_partida">Nombre de la partida</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="nombre_delete" disabled>
                            <p class="errorNombre_partida text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="delete btn btn-danger" data-dismiss="modal">
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