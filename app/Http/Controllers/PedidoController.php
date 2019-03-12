<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Almacen\Http\Requests\PedidoFormRequest;
use Almacen\Pedido;
use Almacen\DesglocePedido;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PedidoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	if ($request)
    	{
    		$pedidos = Pedido::all();
			/*$pedidos = ('pedidos as p')
			->join('residencias as r','p.idresidencia','=','r.idresidencia')
			->join('desglocePedidos as dp','p.idpedido','=','dp.idpedido')
			->select('p.idpedido','p.fecha_pedido','r.ubicacion','p.total','p.estado');*/

			return view('campamento.pedidos.index',['pedidos'=>$pedidos]); 		
    	}
    }

    public function create()
    {
    	$residencias = DB::table('residencias')->get();
    	$productos = DB::tabla('productos as pro')
			->join('desglocePedidos as de','pro.idproducto')
    			->select('pro.idproducto','pro.idpartida','pro.descripcion','pro.unidad_medida','pro.precio','pro.devolver')
    			->get();
		return view('campamento.pedidos.create',['residencias'=>$residencias, 'productos'=>$productos]);
    }

    public function store(PedidoFormRequest $request)
    {
    	try{
    		DB::beginTransaction();
    		$pedido=new Pedido;
    		$pedido->idresidencia=$request->get('idresidencia');
    		$pedido->total=$request->get('total');

    		$mytime = Carbon::now('America/Mexico_City');
    		$pedido->fecha_pedido=$mytime->toDateTimeString();
    		$pedido->impuesto='16';
    		$pedido->estado='En_espera';
    		$pedido->save();

    		$idproducto = $request->get('idproducto');
    		$cantidad_pedida = $request->get('cantidad_pedida');
    		$cantidad_autorizada = $request->get('cantidad_autorizada');
    		$fecha_autorizado = $request->get('fecha_autorizado');
    		$fecha_entrega = $request->get('fecha_entrega');
    		//precio

    		$cont = 0;

    		while ($cont < cont($idproducto)) {
    			$desgloce = new DesglocePedido();
    			$desgloce->idpedido = $pedido->idpedido;
    			$desgloce->idproducto = $idproducto[$cont];
    			$desgloce->cantidad_pedida =$cantidad_pedida[$cont];
    			$desgloce->cantidad_autorizada =$cantidad_autorizada[$cont];
    			$desgloce->fecha_autorizado =$fecha_autorizado[$cont];
    			$desgloce->fecha_entrega =$fecha_entrega[$cont];
    			$desgloce->save();
    			$cont=$cont+1;
    		}

    		DB::commit();
    	} catch(\Exception $e)
    	{
    		DB::rollback();
    	}
    	return Redirect::to('campamento/pedidos');
    }

    public function show($id)
    {
    	{
	        $pedido=DB::table('pedidos as p')
	            ->join('residencias as r','p.idresidencia','=','r.idresidencia')
	            ->join('desglocePedidos as dp','p.idpedido','=','dp.idpedido')
	            ->select('p.idpedido','p.fecha_pedido','r.ubicacion','p.total','p.estado')

	            ->where('p.idpedido','=',$id)
	            ->first();

	        $desgloces=DB::table('desglocePedidos as d')
	             ->join('productos as pr','d.idproducto','=','pr.idproducto')
	             ->select('pr.descripcion as producto','d.cantidad_pedida','d.cantidad_autorizada','d.fecha_autorizado','d.fecha_entrega')
	             ->where('d.idpedido','=',$id)
	             ->get();
	        return view("campamento.pedidos.show",["pedidos"=>$pedido,"desgloces"=>$desgloces]);
	    }

    }

    public function destroy($id)
    {
     $pedido=Pedido::findOrFail($id);
        $pedido->Estado='No_autorizado';
        $pedido->update();
        return Redirect::to('campamento/pedidos');
    }


}
