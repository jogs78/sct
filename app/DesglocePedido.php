<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class DesglocePedido extends Model
{
    protected $table = 'desglocePedidos';

    protected $primaryKey='iddesgloce';

    protected $fillable = ['idpedido', 'idproducto', 'cantidad_pedida', 'cantidad_autorizada', 'fecha_autorizo','fecha_entrega'];
}
