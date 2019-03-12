<?php

namespace Almacen\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use View;

use Illuminate\Http\Request;
use Almacen\Producto;
use Almacen\Partida;
use Almacen\Pedido;
use Almacen\User;
Use Almacen\DesglocePedido;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Collection;

use Yajra\DataTables\Facades\DataTables;

use PDF;

class AdminController extends Controller
{
	public function Inicio()
    {
        return view('admin.inicio');
    }

    public function ReportePedidos()
    {
    	$pedidos = DB::table('pedidos as pe')
            ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
            ->select('pe.idpedido','re.ubicacion','pe.total','pe.fecha_pedido','pe.estado')
            ->get();

        return view('admin.pedidos.reporte',["pedidos"=>$pedidos]); 
    }

    public function DesglocePedido($id)
    {
    	$pedidos = DB::table('pedidos as p')
            ->join('residencias as r','p.idresidencia','=','r.idresidencia')
            ->join('desglocePedidos as dp','p.idpedido','=','dp.idpedido')
            ->select('p.idpedido','p.fecha_pedido','r.ubicacion','p.estado')
            ->where('p.idpedido','=',$id)
            ->first();

        $desgloce = DB::table('desglocePedidos as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')
            ->select('p.descripcion as producto','p.unidad_medida as medida','p.idpartida as partida','d.cantidad_pedida','d.cantidad_autorizada')
            ->where('d.idpedido','=',$id)
            ->get();    
       
        return view('admin.pedidos.desgloces',["pedidos"=>$pedidos,"desgloce"=>$desgloce]);

    }
}
