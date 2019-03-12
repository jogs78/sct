<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $primaryKey='idpedido';

    protected $fillable = ['idresidencia','total','fecha_pedido','idestado'];
}
