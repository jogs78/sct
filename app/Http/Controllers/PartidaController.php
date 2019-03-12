<?php

namespace Almacen\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use View;
use Almacen\Partida;
use Yajra\DataTables\Facades\DataTables;


class PartidaController extends Controller
{
    protected $rules = 
    [
        'idpartida' => 'required|numeric',
        'nombre_partida' => 'required'  
    ];
    
    public function index(Request $request)
    {
            $partidas = Partida::all();
            
            return view('admin.partida.index',['partidas'=>$partidas]);
    }

    public function create()
    {
        //return view("admin.partida.create");
    }

    public function store (Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $partida=new Partida();
            $partida->idpartida = $request->idpartida;
            $partida->nombre_partida = $request->nombre_partida;

            //Flash::success("Se ha registrado la partida " . $partida->num_partida." - ".$partida->nombre_partida. " de forma exitosa!!");
            
            $partida->save();
            return response()->json($partida);
        }
    }

    public function show($id)
    {
        /*$partida = Partida::findOrFail($id);

        return view("admin.partida.show",["partida"=>$partida]);*/
    }

    public function edit($id)
    {
        //return view("admin.partida.edit",["partida"=>Partida::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $partida = Partida::findOrFail($id);
            $partida->idpartida = $request->idpartida;
            $partida->nombre_partida = $request->nombre_partida;
            $partida->save();
            return response()->json($partida);
        }
    }

    public function destroy($idpartida)
    {
   
        $partida = Partida::findOrFail($idpartida);
        $partida->delete();

        return response()->json($partida);
    
    }

    public function getPartida()
    {
        $partida = Partida::all();
        return Datatables::of($partida)->make(true);
    }

}

