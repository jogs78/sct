<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;
use Almacen\Partida;
use Almacen\Producto;
use Yajra\DataTables\Facades\DataTables;

class RealizarController extends Controller
{
	public function partida(){
		$partidas = Partida::pluck('nombre_partida','num_partida','idpartida');
		//var_dump($partidas);
		return view('campamento.realizarp', compact('partidas'));
	}


	/*public function getProductos(Request $request, $id){
		if($request->ajax()){
			$productos = Producto::productos($id);
			return response()->json($productos);
		}
	}*/


	/*public function realizarp(){
		return view('campamento.realizarp');
	}*/

	public function getRealizar(Request $request){
		if($request->ajax()){

			$productos = Producto::select(['idproducto', 'descripcion', 'unidad_medida', 'precio', 'devolver'])->where('idpartida',$request->input('idpartida'))->get();
			return Datatables::of($productos)->make(true);
		}
		
	}

	
}


