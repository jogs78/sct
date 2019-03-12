<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = 'partidas';

    protected $primaryKey='idpartida';

    protected $fillable = ['nombre_partida'];
}
