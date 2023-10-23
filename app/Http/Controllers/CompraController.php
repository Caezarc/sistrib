<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\cliente;
use App\Models\codigo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\controllers\ClienteController;
use Illuminate\Support\Facades\Auth;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario=Auth::user()->id;
        //return response()->json($usuario);
       if ($request)
        {
            
           $query=trim($request->get('texto'));
            $dcompras=DB::table('compras')->where('com_proveedor','LIKE','%'.$query.'%')
           ->where('user_id', $usuario) 
           ->orderBy('id','asc')
           ->paginate(31);
          return view('compras.index',["compras"=>$dcompras,"texto"=>$query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $query=trim($request->get('texto'));
        $customer = cliente::Select('id','clien_ruc','clien_nombre')->where('clien_ruc', $query)->first(); 
        //return response()->json($customer);
        $codigos=codigo::all();
        //return view('compras.create',compact('customer','codigos'));
        
        //$clientes=cliente::all();
        //$codigos=codigo::all();
        //return response()->json($customer);
        return view('compras.create',compact('customer','codigos'));

               
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datoscompra = request()->except('_token');
        compra::insert($datoscompra);
        //return response()->json($datoscompra);
        return redirect('compras')->with('mensaje','Compra Agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recuperado=compra::findOrFail($id);
        return view('compras.edit', compact('recuperado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosCompra=request()->except(['_token','_method']);
        compra::where('id','=',$id)->update($datosCompra);
        $recuperado=compra::findOrFail($id);
        return view('compras.edit', compact('recuperado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        compra::destroy($id);
        return redirect('compras')->with('mensaje','Registro borrado con Exito');
    }
}
