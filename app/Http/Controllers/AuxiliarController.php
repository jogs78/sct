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
use Almacen\Residencia;
use Almacen\Estado;
use DB;

use Illuminate\Support\Collection;

use Yajra\DataTables\Facades\DataTables;

class AuxiliarController extends Controller
{
    public function __construct(){
        $valor=0;
    }

    public function reporte(Request $request)
    {
        $query = ($request->get('idresidencia'));
        $query = ($request->get('idestado')); //estado

        $pedidos = DB::table('pedidos as pe')->where('pe.idresidencia','LIKE','%'.$query.'%')
            ->where('pe.idpedido','LIKE','%'.$query.'%') //estado
            ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
            ->join('estados as es','pe.idestado','=','es.idestado')
            ->select('pe.idpedido','re.idresidencia','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion') 
            ->get();   

        $residencias = DB::table('residencias')->get();

        $estados = DB::table('estados')->get();


        return view('auxiliar.pedidos.reporte',["pedidos"=>$pedidos,"residencias"=>$residencias,"estados"=>$estados]);
    }

    public function ObtenerPedidosporResidencia(Request $request)
    {

        if($request->idresidencia==0){

            $valor="";
            $pedidos = DB::table('pedidos as pe')->where('pe.idresidencia','LIKE','%'.$valor.'%')
                ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
                ->join('estados as es','pe.idestado','=','es.idestado')
                ->select('pe.idpedido','re.idresidencia','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion') 
                ->get();

            }else{

                $pedidos = DB::table('pedidos as pe')->where('pe.idresidencia','LIKE','%'.$request->idresidencia.'%')
                    ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
                    ->join('estados as es','pe.idestado','=','es.idestado')
                    ->select('pe.idpedido','re.idresidencia','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion') 
                    ->get();
                }

            return json_encode($pedidos);
    }

    public function ObtenerPedidosporEstado(Request $request)
    {

        
        if($request->idestado == 0){
            $valor="";
            $pedidos = DB::table('pedidos as pe')->where('pe.idestado','LIKE','%'.$valor.'%')
                ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
                ->join('estados as es','pe.idestado','=','es.idestado')
                ->select('pe.idpedido','re.idresidencia','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion') 
                ->get();

            } else{

                $pedidos = DB::table('pedidos as pe')->where('pe.idestado','LIKE','%'.$request->idestado.'%')
                    ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
                    ->join('estados as es','pe.idestado','=','es.idestado')
                    ->select('pe.idpedido','re.idresidencia','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion') 
                    ->get();

                }

            return json_encode($pedidos);
    }

    public function  ObtenerPedidosporFechas(Request $request){

        if (!empty($request->fecha1) && !empty($request->fecha2)) {
           
            $f1 = date("Y-m-d", strtotime(trim($request->fecha1)));
            $f2 = date("Y-m-d", strtotime(trim($request->fecha2)));
           $pedidos = DB::table('pedidos as pe')
                ->whereBetween('fecha_pedido', [$f1, $f2])
                ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
                ->join('estados as es','pe.idestado','=','es.idestado')
                ->select('pe.idpedido','re.idresidencia','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion') 
                ->get();
        }
        else{
              $valor="";
            $pedidos = DB::table('pedidos as pe')->where('pe.idpedido','LIKE','%'.$valor.'%')
                ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
                ->join('estados as es','pe.idestado','=','es.idestado')
                ->select('pe.idpedido','re.idresidencia','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion') 
                ->get();

        }

                    return json_encode($pedidos);
    }

    public function Desgloce($id)
    {
        $pedidos = DB::table('pedidos as p')
            ->join('residencias as r','p.idresidencia','=','r.idresidencia')
            ->join('desglocePedidos as dp','p.idpedido','=','dp.idpedido')
            ->join('estados as es','p.idestado','=','es.idestado')
            ->select('p.idpedido','p.fecha_pedido','r.ubicacion','es.descripcion')
            ->where('p.idpedido','=',$id)
            ->first();

        $desgloce = DB::table('desglocePedidos as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')//
            ->select('p.descripcion as producto','p.unidad_medida as medida','p.idpartida as partida','d.cantidad_pedida','d.cantidad_autorizada')
            ->where('d.idpedido','=',$id)
            ->get();    
       
        return view('auxiliar.pedidos.desgloce',["pedidos"=>$pedidos,"desgloce"=>$desgloce]);   
    }

    public function Estado($pedido_id)
    {
        
            $pedido=Pedido::where('idpedido', '=', $pedido_id)->first();
            if (count($pedido)>=1) {
                $pedido->idestado=3;
                $pedido->save();
                
                 return response()->json(["msg"=>"El pedido cambio a estado entregado"]);

            
        }
               
    }
}
