<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class DesgloceAsignar extends Model
{
    protected $table = 'desgloceAsignaciones';

    protected $primaryKey='iddesglocea';

    protected $fillable = ['idasignar','monto_partida','idpartida'];
}
