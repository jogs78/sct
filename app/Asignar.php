<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
    protected $table = 'asignaciones';

    protected $primaryKey='idasignar';

    protected $fillable = ['total','mes','idresidencia'];
}