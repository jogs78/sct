<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $primaryKey='idestado';

    protected $fillable = ['descripcion'];
}
