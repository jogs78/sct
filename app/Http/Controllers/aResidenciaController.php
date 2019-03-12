<?php

namespace Almacen\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use View;
use Almacen\User;
use Almacen\Residencia;
use DB;
use Yajra\DataTables\Facades\DataTables;

class aResidenciaController extends Controller
{
    protected $rules =
    [
        'idresidencia' => 'required|numeric',
        'encargado' => 'max:512|required',
        'puesto' => 'required',
        'ubicacion' => 'required'
    ];

    public function index(Request $request)
    {
        $residencias = Residencia::all();

        return view('auxiliar.residencias.index',['residencias'=>$residencias]);    
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $residencia = new Residencia();
            $residencia->idresidencia = $request->idresidencia;
            $residencia->encargado = $request->encargado;
            $residencia->puesto = $request->puesto;
            $residencia->ubicacion = $request->ubicacion;
            $residencia->save();

            return response()->json($residencia);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $residencia = Residencia::findOrFail($id);
            $residencia->idresidencia = $request->idresidencia;
            $residencia->encargado = $request->encargado;
            $residencia->puesto = $request->puesto;
            $residencia->ubicacion = $request->ubicacion;
            $residencia->save();

            return response()->json($residencia);
        }
    }

    public function destroy($idresidencia)
    {
        $residencia = Residencia::findOrFail($idresidencia);
        $residencia->delete();

        return response()->json($residencia);
    }
}
