<?php

namespace Almacen\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use View;
use Almacen\Capitulo;
use Yajra\DataTables\Facades\DataTables;
use DB;

class CapituloController extends Controller
{
    protected $rules = 
    [
        'capitulo' => 'required',
        'nombre_cap' => 'required'  
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $capitulos = DB::table('capitulos as ca')
            ->select('ca.idcap','ca.capitulo','ca.nombre_cap')
            ->get();
            
        return view('delegado.capitulo.index',['capitulos'=>$capitulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $capitulo=new Capitulo();
            $capitulo->idcap = $request->idcap;
            $capitulo->capitulo = $request->capitulo;
            $capitulo->nombre_cap = $request->nombre_cap;
            $capitulo->save();

            return response()->json($capitulo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $capitulo = Capitulo::findOrFail($id);
            $capitulo->idcap = $request->idcap;
            $capitulo->capitulo = $request->capitulo;
            $capitulo->nombre_cap = $request->nombre_cap;
            $capitulo->save();

            return response()->json($capitulo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capitulo = Capitulo::findOrFail($idcap);
        $capitulo->delete();

        return response()->json($capitulo);
    }
}
