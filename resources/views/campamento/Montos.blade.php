<div class="row">
        <div class="col-md-4 col-md-offset-8 col-sm-4 col-sm-offset-8">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped table-condensed" id="MontosPartida">
                    <caption class="text-center">Montos asignados</caption>
                    <thead>
                        <tr>
                            <th class="text-center">Partida</th>
                            <th class="text-center">Monto</th>
                        </tr>
                        {{ csrf_field() }}
                    </thead>
                    <!--<tfoot>
                        <tr>
                            <td colspan="1" class="text-right">Total: $ </td>
                            <td class="text-right"> </td>
                        </tr>
                    </tfoot>-->
                    <tbody>
                        @foreach($montos as $m)
                            <tr>
                                <td>{{ $m->idpartida }}</td>
                                <td class="text-right">$ {{ $m->monto_partida }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>