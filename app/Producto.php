<?php

namespace Almacen;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey='idproducto';

    protected $fillable = ['idpartida','cucop','cambs','descripcion','unidad_medida','precio', 'devolver','cantidad'];

    /*public static function productos($id){
    	return Producto::where('idpartida','=',$id)
    	->get();
    }*/
}
