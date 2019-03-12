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
use Almacen\Estado;
use Almacen\Asignar;
use Almacen\DesgloceAsignar;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Collection;

use Yajra\DataTables\Facades\DataTables;

use PDF;

class SolicitudController extends Controller
{
    protected $rules =
    [
        'cantida_pedida' => 'requires|numeric'/// <---
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        return view('campamento.iniciocamp');
    }

    public function seleccionPartida()
    {
    	$partidas = Partida::pluck('nombre_partida','idpartida');
    	return view('campamento.realizarPedido', compact('partidas'));
    }


    public function getSolicitud(Request $request)
    {
        if ($request->ajax()) {

    	$productos = Producto::select(['idproducto','idpartida','descripcion','unidad_medida','precio','devolver']);

        //->where('idpartida', $request->input('idpartida'))->get();
    	
        return Datatables::of($productos)->make(true);

        }
    }

    public function enviarSolicitud(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);//
        if ($validator->fails()){ //
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));//
        } else {//
            //return json_encode($request->ajax());
    
            if ($request->ajax()) {
                $user = Auth::user();

                $fecha= date("Y-m-d");
                DB::beginTransaction();
                $id = DB::table('pedidos')->insertGetId(
                    ['idresidencia' =>  $request->idresidencia, 
                    'total' => $request->total,
                    'idestado'=>"1",
                    'fecha_pedido'=>$fecha]
                    );
                $numeropartida=0;
                for ($i=0; $i <count($request->idproductos) ; $i++) {
 
                    $producto=Producto::find($request->idproductos[$i]);
                
                    $partida=Partida::find($producto->idpartida);
                    $numeropartida=$producto->idpartida;

                    $montos = DB::table('desgloceAsignaciones as da')
                        ->join('partidas as pa','da.idpartida','=','pa.idpartida')
                        ->join('asignaciones as a','da.idasignar','=','a.idasignar')
                        ->where([
                            ['a.idresidencia', '=', $request->idresidencia],
                            ['pa.idpartida', '=', $producto->idpartida]
                            ])
                        //->where('a.idresidencia','=',$request->idresidencia)
                        //->where('pa.idpartida','=',$partida->idpartida)
                        ->select('da.monto_partida','pa.idpartida','a.idresidencia','a.idasignar','a.total')
                        ->get();


                  $importeproducto=$producto->precio*$request->cantidades[$i];//checalo de nuevo,ok
                  if(empty($montos->first()->monto_partida)){
                    DB::rollBack();
                     return response()->json(["mensaje3"=>"No existe monto asignado en partida ".$numeropartida]);

                  }

                  if($montos->first()->monto_partida>$importeproducto){//va de nuevo,ook

                    $resta=(double)$montos->first()->monto_partida-(double)$importeproducto;
                    

                    //y despues de restarlo ?
                    //que vuelva mostrrlo en la tabla de la vista, ah q actualize el monto en la 
                    $desgloce=DesgloceAsignar::where('idpartida','=',$producto->idpartida)
                                               ->where('idasignar','=',$montos->first()->idasignar) 
                                               ->first();

                    //oce tengo q salir ahi en desgloce no me encuentra hay q hacer un where por el id asignar y obtener el desgloce para q con su id buscarlo y ya poner el monto
                    //lo checamos alrato si quieres, si esta bien Alex, sale nos vemos alrato,va bro
                    $desgloce->monto_partida=$resta;
                    $desgloce->save();

                         DB::table('desglocePedidos')->insert([
                        ['idpedido' => $id, 
                        'idproducto'=>$request->idproductos[$i],
                        'cantidad_pedida' => $request->cantidades[$i]
                        ],

                    ]);


                  }else{
                    DB::rollBack();
                     return response()->json(["mensaje1"=>"Importe insuficiente en partida ".$numeropartida]);

                  }

                }
                DB::commit();
                return response()->json(["mensaje2"=>"Se agrego Pedido"]);

            }
        
        } //

        

    }

    public function Monto()
    {
        $useridresidencia = Auth::user()->residencia()->first()->idresidencia;

        $montos = DB::table('desgloceAsignaciones as da')
            ->join('partidas as pa','da.idpartida','=','pa.idpartida')
            ->join('asignaciones as a','da.idasignar','=','a.idasignar')
            ->where('a.idresidencia','=',$useridresidencia)
            ->select('da.monto_partida','pa.idpartida','a.idresidencia','a.total')
            ->get();

        return view('campamento.realizarPedido',["montos"=>$montos]);
    }

    public function listaPedido()
    {
        $useridresidencia = Auth::user()->residencia()->first()->idresidencia;

        $pedidos = DB::table('pedidos as pe')
            ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
            ->join('estados as es','pe.idestado','=','es.idestado')
            ->where('pe.idresidencia','=',$useridresidencia)
            ->select('pe.idpedido','re.ubicacion','pe.total','pe.fecha_pedido','es.descripcion')
            ->get();

        $montos = DB::table('desgloceAsignaciones as da')
            ->join('partidas as pa','da.idpartida','=','pa.idpartida')
            ->join('asignaciones as a','da.idasignar','=','a.idasignar')
            ->where('a.idresidencia','=',$useridresidencia)
            ->select('da.monto_partida','pa.idpartida','a.idresidencia','a.total')
            ->get();

        return view('campamento.consultar',["pedidos"=>$pedidos,"montos"=>$montos]);                 
    }

    public function desglocePedido($id)
    {
        $pedidos = DB::table('pedidos as p')
            ->join('residencias as r','p.idresidencia','=','r.idresidencia')
            ->join('estados as es','p.idestado','=','es.idestado')
            ->join('desglocePedidos as dp','p.idpedido','=','dp.idpedido')
            ->select('p.idpedido','p.fecha_pedido','r.ubicacion','es.descripcion')
            ->where('p.idpedido','=',$id)
            ->first();

        $desgloce = DB::table('desglocePedidos as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')
            ->select('p.descripcion as producto','p.unidad_medida as medida','p.idpartida as partida','d.cantidad_pedida','d.cantidad_autorizada')
            ->where('d.idpedido','=',$id)
            ->get();    
       
        return view('campamento.desgloce',["pedidos"=>$pedidos,"desgloce"=>$desgloce]);   
    }

    public function pdf(Request $request, $id)
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

        $pdf = PDF::loadView('pdf.pedido',["pedidos"=>$pedidos,"desgloce"=>$desgloce]);

        return $pdf->download('vale.pdf');


    }

}
