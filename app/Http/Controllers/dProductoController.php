<?php

namespace Almacen\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use View;
use Almacen\Producto;
use Almacen\Partida;
use DB;
use Yajra\DataTables\Facades\DataTables;

class dProductoController extends Controller
{
    protected $rules =
    [
        'idpartida' => 'required',
        'cucop' => 'required',
        'cambs' => 'required', 
        'descripcion' => 'max:512|required', 
        'unidad_medida' => 'required', 
        'precio' => 'required|numeric', 
        'cantidad' => 'numeric',
        'devolver' => 'max:5',
    ];

    public function index(Request $request)
    {
        $productos = Producto::all();

        /*$productos = DB::table('productos as pr')
        ->join('partidas as pa','pr.idpartida','=','pa.idpartida')
		->select('pr.idproducto','pa.num_partida as partida','pr.descripcion','pr.cantidad','pr.unidad_medida','pr.precio','pr.devolver');*/

        return view('delegado.producto.index',["productos"=>$productos]);
        
    }
    
    public function ObtenerPartidas(){

        $partidas=DB::table('partidas')->get();

        return json_encode($partidas);       
 
    }

    public function create()
    {
        //
    }

    public function store (Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $producto=new Producto();
            $producto->idpartida = $request->idpartida;
            $producto->cucop = $request->cucop;
            $producto->cambs = $request->cambs;
            $producto->descripcion = $request->descripcion;
            $producto->unidad_medida = $request->unidad_medida;
            $producto->precio = $request->precio;
            $producto->cantidad = $request->cantidad;
            $producto->devolver = $request->devolver;
            $producto->save();

            return response()->json($producto);
        }
    }

    public function show($id)
    {
        //return view("admin.producto.show",["producto"=>Producto::findOrFail($id)]);
    }

    public function edit($id)
    {
    	/*$producto=Producto::findOrFail($id);
    	$partidas=DB::table('partidas')->get();
        return view("admin.producto.edit",["producto"=>$producto,"partidas"=>$partidas]);*/
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $producto=Producto::findOrFail($id);
            $producto->idpartida = $request->idpartida;
            $producto->cucop = $request->cucop;
            $producto->cambs = $request->cambs;
            $producto->descripcion = $request->descripcion;
            $producto->unidad_medida = $request->unidad_medida;
            $producto->precio = $request->precio;
            $producto->cantidad = $request->cantidad;
            $producto->devolver = $request->devolver;
            $producto->save();

            return response()->json($producto);
        }
    }

    public function destroy($idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        $producto->delete();

        return response()->json($producto);
    }


    //Datatables

}
