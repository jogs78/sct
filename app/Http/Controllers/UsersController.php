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

class UsersController extends Controller
{
    protected $rules = 
    [ 
        'name' => 'min:4|max:120|required',
        'email' => 'required|email|unique:users',
        'password' => 'min:4',
        'puesto' => 'required|required', 
    ];

    public function index(Request $request)
    {
    	//$users = User::all();
        $users = DB::table('users as us')
            ->join('residencias as re','us.idresidencia','=','re.idresidencia')
            ->select('us.iduser','us.name','us.email','us.puesto','re.ubicacion')
            ->get();

        return view('admin.users.index',['users'=>$users]);
    }

    public function ObtenerResidencias(){

        $residencias=DB::table('residencias')->get();

        return json_encode($residencias);       
    }
    
    public function create()
    {
    	//return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $user = new User();
            $user->iduser = $request->iduser;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            //$user->password = $request->password;
            $user->puesto = $request->puesto;
            $user->idresidencia = $request->idresidencia;
            $user->save();

            return response()->json($user);
        }
    }

    public function show($id)
    {
    	//
    }

    public function edit($id)
    {
    	//$user = User::find($id); 
        //return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $user = User::findOrFail($id);
            $user->iduser = $request->iduser;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->puesto = $request->puesto;
            $user->idresidencia = $request->idresidencia;
            $user->save();

            return response()->json($user);
        }

    }
    
    public function destroy($iduser)
    {
        $user = User::findOrFail($iduser);
        $user->delete();

        return response()->json($user);
    }

    /*public function getPartida()
    {
        $user = Partida::all();
        return Datatables::of($user)->make(true);
    }*/
}
