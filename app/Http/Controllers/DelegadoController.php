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
use Almacen\Asignar;
use Almacen\DesgloceAsignar;
use Almacen\Estado;
use DB;
use Almacen\Http\Requests\AsignarFormRequest;

use Illuminate\Support\Collection;

use Yajra\DataTables\Facades\DataTables;

use PDF;

use Excel;

class DelegadoController extends Controller
{ 
    public function __construct(){
        $valor=0;
    }

    protected $rules =
    [
        'idresidencia' => 'required',
        'monto_partida' => 'required',
        'idpartida' => 'required',
        'mes' => 'required'
    ];

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


        return view('delegado.pedidos.reporte',["pedidos"=>$pedidos,"residencias"=>$residencias,"estados"=>$estados]);
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

    /*public function desgloce($id)
    {
    	$pedidos = DB::table('pedidos as p')
            ->join('residencias as r','p.idresidencia','=','r.idresidencia')
            ->join('desglocePedidos as dp','p.idpedido','=','dp.idpedido')
            ->select('p.idpedido','p.fecha_pedido','r.ubicacion','p.estado')
            ->where('p.idpedido','=',$id)
            ->first();

        $desgloce = DB::table('desglocePedidos as d')
            ->join('productos as p','d.idproducto','=','p.idproducto')//
            ->select('p.descripcion as producto','p.unidad_medida as medida','p.idpartida as partida','d.cantidad_pedida','d.cantidad_autorizada')
            ->where('d.idpedido','=',$id)
            ->get();    
       
        return view('delegado.pedidos.desgloce',["pedidos"=>$pedidos,"desgloce"=>$desgloce]);
    }*/

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
       
        return view('delegado.pedidos.desgloce',["pedidos"=>$pedidos,"desgloce"=>$desgloce]);   
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

        return $pdf->download('Vale_Material.pdf');


    }
///
    public function Estado($pedidoid)
    {
        
            $pedido=Pedido::where('idpedido', '=', $pedidoid)->first();
            if (count($pedido)>=1) {
                $pedido->idestado=2;
                $pedido->save();
                
                 return response()->json(["msg"=>"El pedido cambio a estado surtido"]);

            
        }
               
    }

    public function asignar()
    {
        $asignaciones = DB::table('asignaciones as a')
            ->join('residencias as re','a.idresidencia','=','re.idresidencia')
            ->select('re.idresidencia','re.ubicacion','a.mes','a.total','a.idasignar')
            ->get();
            
        return view('delegado.asignar.asignar',["asignaciones"=>$asignaciones]);
    }

    public function DesgloceAsignar($id)
    {
        $asignar = DB::table('asignaciones as a')
            ->join('residencias as r','a.idresidencia','=','r.idresidencia')
            ->join('desgloceAsignaciones as da','a.idasignar','=','da.idasignar')
            ->select('a.idasignar','a.total','a.mes','r.ubicacion')
            ->where('a.idasignar','=',$id)
            ->first();

        $desgloce = DB::table('desgloceAsignaciones as da')
            ->join('partidas as pa','da.idpartida','=','pa.idpartida')
            ->select('pa.idpartida','pa.nombre_partida','da.monto_partida')
            ->where('da.idasignar','=',$id)
            ->get();

        return view('delegado.asignar.desgloce',["asignar"=>$asignar,"desgloce"=>$desgloce]);
    }

    public function EliminarAsignacion($idasignar)
    {
        $asignar = Asignar::findOrFail($idasignar);
        $asignar->delete();

        return response()->json($asignar);
    }

    public function NuevaAsignacion(Request $request)
    {
       /* $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {*/
            if ($request->ajax()) {
                $id = DB::table('asignaciones')->insertGetId(
                    ['total'=> $request->total,
                    'mes'=> $request->mes,
                    'idresidencia'=>$request->idresidencia]
                );

                for ($i=0; $i <count($request->idpartidas) ; $i++) { 
                    DB::table('desgloceAsignaciones')->insert([
                        ['idasignar'=>$id,
                        'monto_partida'=>$request->montos[$i],
                        'idpartida'=>$request->idpartidas[$i]
                        ],
                    ]);
                }
            }
        //}


    }

    public function ObtenerResidencias()
    {
        $residencias = DB::table('residencias')->get();

        return json_encode($residencias);
    }

    public function ObtenerListaPartidas()
    {
        $partidas = DB::table('partidas')->get();

        return json_encode($partidas);
    }
    

    public function Consolidado()//es este
    {
        $consolidado=DB::table('pedidos as pe')
                    ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
                    ->select(DB::raw('SUM(pe.total) as total'),DB::raw('MONTH(pe.fecha_pedido) as mes'))
                    ->groupBy('mes')
                    ->orderBy('mes','asc')
                    ->get();
                    //hagamos que te imprima lo q lleva los valores
        /*$consolidado = DB::table('pedidos as pe')
            ->join('residencias as re','pe.idresidencia','=','re.idresidencia')
            ->select('pe.total','pe.fecha_pedido') 
            ->get();*/
        //el mes en fecha o letra ?
        //que sea en fecha pero como? mes-año, se puede? o si no D-M-A lo sigo pensado jaja esperam, 
        // pero como va aparecer en la vista?? ,con numero 3-2018 p,or eso yo te decia si con letra
        // a pues esta bien asi,asi como? 3-2018, como tu me dices
        //no bro creo q no se me ocurre ahorita, chequemos a ver como , te digo mañana


        return view('delegado.consolidado.consolidado',["consolidado"=>$consolidado]);
    }

    public function DesgloceConsolidado()
    {
        $desgloce = DB::table('desglocePedidos as d')
            ->join('productos as pr','d.idproducto','=','pr.idproducto')//
            ->select('pr.descripcion as producto','pr.unidad_medida as medida','pr.idpartida as partida','d.cantidad_pedida as cantidad','pr.cucop','pr.cambs','pr.precio')
            //aqui verdad??
            ->get();         

        return view('delegado.consolidado.desgloce');
    }
//aqui que modificaria??,la variaable ya no la mandes, asi?si

    public function filtradopormesconsolidado(Request $request){
 
 
         $desgloce = DB::table('desglocePedidos as d')
            ->join('productos as pr','d.idproducto','=','pr.idproducto')//es en esta
            ->join('partidas as pa','pr.idpartida','=','pa.idpartida')

            ->join('pedidos as pe','d.idpedido','=','pe.idpedido')
            ->whereRaw('MONTH(pe.fecha_pedido) = ?', [$request->mes])
            ->whereRaw('YEAR(pe.fecha_pedido) = ?', [$request->ano])
            ->select('d.idproducto','pr.precio','pr.cucop','pr.cambs','pr.descripcion as producto','pr.unidad_medida as medida','pr.idpartida as partida',DB::raw('sum(d.cantidad_pedida) as cantidad'),DB::raw('sum(pr.precio) as importe'))
            ->groupBy('d.idproducto')
            ->get(); 
            return json_encode($desgloce);    
           
    }


    public function ConsolidadoPdf()
    {
        $pdf = PDF::loadView('pdf.consolidado');

        return $pdf->download('Consolidado.pdf');   
    }

    public function ExcelConsolidado($mes,$anio)
    {
        Excel::load('excel/consolidado.xlsx', function ($excel) use($mes,$anio){

                  $excel->sheet('Hoja1', function($sheet) use($mes,$anio){
                  $sheet->mergeCells('B9:G9');      

                 $desgloce = DB::table('desglocePedidos as d')
                    ->join('productos as pr','d.idproducto','=','pr.idproducto')//es en esta
                    ->join('partidas as pa','pr.idpartida','=','pa.idpartida')

                    ->join('pedidos as pe','d.idpedido','=','pe.idpedido')
                    ->whereRaw('MONTH(pe.fecha_pedido) = ?', $mes)
                    ->whereRaw('YEAR(pe.fecha_pedido) = ?', $anio)
                    ->select('d.idproducto','pr.precio','pr.cucop','pr.cambs','pr.descripcion as producto','pr.unidad_medida as medida','pr.idpartida as partida',DB::raw('sum(d.cantidad_pedida) as cantidad'),DB::raw('sum(pr.precio) as importe'))
                    ->groupBy('d.idproducto')
                    ->get(); 

                      $data=[];
                                   // dd($recorrido);

                    foreach ($desgloce as  $desglo) {
                          $datos=array($desglo->idproducto,
                                             $desglo->precio,
                                             $desglo->producto,
                                             $desglo->medida
                                                );

                                array_push($data,$datos);
                    }

                            $sheet->fromArray($data, null, 'A9', false,false);

                        $sheet->cell('A1', function($cell) {
                            $cell->setValue('Nombre de la entidad o recidensia:');
                        });



                  });

            
        })->export('xlsx');
    }

    public function Consolidado2($mes,$anio){

        $consolidado = DB::table('desglocePedidos as d')
            ->join('productos as pr','d.idproducto','=','pr.idproducto')//es en esta
            ->join('partidas as pa','pr.idpartida','=','pa.idpartida')

            ->join('pedidos as pe','d.idpedido','=','pe.idpedido')
            ->whereRaw('MONTH(pe.fecha_pedido) = ?', $mes)
            ->whereRaw('YEAR(pe.fecha_pedido) = ?', $anio)
            ->select('d.idproducto','pr.precio','pr.cucop','pr.cambs','pr.descripcion as producto','pr.unidad_medida as medida','pr.idpartida as partida',DB::raw('sum(d.cantidad_pedida) as cantidad'),DB::raw('sum(pr.precio) as importe'))
            ->groupBy('d.idproducto')
            ->get();


        Excel::create("Consolidado", function ($excel) use ($consolidado) {
            $excel->setTitle("Title");

            $excel->sheet("Hoja1", function ($sheet) use ($consolidado) {

                $sheet->mergeCells('A1:G1');
                $sheet->mergeCells('A3:B3');
                $sheet->mergeCells('C3:D3');
                $sheet->mergeCells('A5:J5');
                $sheet->mergeCells('B7:C7');
                $sheet->mergeCells('D7:H7');
                //$sheet->mergeCells('C8:D8');

                $sheet->cells('A7:K7', function($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                });

                $sheet->cell('G3', function($cell) {
                    $cell->setValignment('center');
                });

                $sheet->getStyle('A7:K7')->getAlignment()->setWrapText(true);

                $sheet->setBorder('A1', 'thin');
                //$sheet->setBorder('A3', 'thin');
                //$sheet->setBorder('C3', 'thin');
                $sheet->setBorder('A5', 'thin');
                $sheet->setBorder('A3:C3', 'thin');
                $sheet->setBorder('F3:G3', 'thin');

                $sheet->setWidth(array(
                    'A' =>  14,
                    'B' =>  5,
                    'C' =>  10,
                    'D' =>  10,
                    'E' =>  5,
                    'F' =>  20,
                    'G' =>  20,
                    'H' =>  40,
                    'I' =>  11,
                    'J' =>  14,
                    'K' =>  14,
                    'L' =>  15
                ));

                $sheet->setHeight(array(
                    2   =>  3,
                    4   =>  3,
                    6   =>  3,
                    7   =>  30
                ));

                $sheet->loadView('pdf/consolidado')->with('consolidado', $consolidado);

                $sheet->setOrientation('landscape');

            });

        })->download('xlsx');

        return back();
    
    }


}
