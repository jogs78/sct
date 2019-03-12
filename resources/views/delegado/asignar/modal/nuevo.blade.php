<!-- modal agregar nuevo -->
<div id="AsignarModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Nueva asignación</h4>
            </div>

            <div class="modal-body">
                <form id="AsignarFormulario" class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="partidas">Residencia de obra</label>
                            <div id="residencias"></div>
                            <p class="errorResidecnia text-center alert alert-danger hidden"></p>
                        </div>
                
                        <div class="col-md-6">
                            <label for="partidas">Mes</label>
                            <input class="form-control" type="month" name="mes" id="mes">
                            <p class="errorMes text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>
                    

                    <button class="AgregarFila btn btn-success btn-sm pull-right">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>

                    <table class="table table-hover table-bordered table-striped table-condensed" id="Asignar">
                        <thead>
                            <tr>
                                <th style="width: 5%;"></th>
                                <th class="text-center">Partida</th>
                                <th class="text-center" style="width: 30%;">Monto</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-right">Total: $ </td>
                                <td class="text-right"><input type="number" id="TotalMontos" size="12" style="text-align:right" readonly></td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td><input type="button" class="EliminarFila btn btn-danger btn-sm" value="X"></td>
                                <td><div id="partidas"></div></td>
                                <td><input type="text" id="monto" class="monto form-control" name="monto" min="0" value="0" onkeyup="calcular_total();"></td>
                            </tr>
                        </tbody>
                    </table>

                <div class="modal-footer">
                    <button type="button" id="agregar" class="addp btn btn-success" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-check'> </span> Agregar
                    </button>

                    <button id="btnCerrar" type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>