<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    protected $table = 'residencias';

    protected $primaryKey = 'idresidencia';

    protected $fillable = ['encargado','puesto','ubicacion'];



   
}
