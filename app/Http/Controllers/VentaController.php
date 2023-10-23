<?php

namespace App\Http\Controllers;

use App\Models\venta;
use App\Models\cliente;
use App\Models\codigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\controllers\ClienteController;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario=Auth::user()->id;
        if ($request)
        {
            $query=trim($request->get('texto'));
            $dventas=DB::table('ventas')->where('ven_cliente','LIKE','%'.$query.'%')
            ->where('user_id', $usuario)
            ->orderBy('id')
            ->paginate(7);
            return view('ventas.index',["ventas"=>$dventas,"texto"=>$query]);
        }else
        $datos['ventas']=venta::paginate(5);
        return view('ventas.index',$datos);
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
        //return response()->json($clientes);
        return view('ventas.create',compact('customer','codigos'));

               
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosventa = request()->except('_token');
        venta::insert($datosventa);
        //return response()->json($datosventa);
        return redirect('ventas')->with('mensaje','Venta agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recuperado=venta::findOrFail($id);
        return view('ventas.edit', compact('recuperado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosVenta=request()->except(['_token','_method']);
        venta::where('id','=',$id)->update($datosVenta);
        $recuperado=venta::findOrFail($id);
        return view('ventas.edit', compact('recuperado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        venta::destroy($id);
        return redirect('ventas')->with('mensaje','Registro borrado con Exito');
    }
}
