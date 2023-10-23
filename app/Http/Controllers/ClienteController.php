<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\codigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\compraController;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        if ($request)
        {
            $query=trim($request->get('texto'));
            $dclientes=DB::table('clientes')->where('clien_ruc','LIKE','%'.$query.'%')
            
            ->orderBy('id', 'asc')
            ->paginate(100);
            return view('clientes.index',["datos"=>$dclientes,"texto"=>$query]);
        }else
        $datos=cliente::all();
        return view('clientes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $query=trim($request->get('texto'));
        $customer = cliente::Select('clien_ruc','clien_nombre')->where('clien_ruc', $query)->first(); 
        //$this->order->id_customer_id = $customer->id;
        //return response()->json($customer);
        $codigos=codigo::all();
        return view('clientes.create',compact('customer','codigos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosCliente = request()->except('_token');
        //if($request->hasFile('clien_foto')){
           // $datosCliente['clien_foto']=$request->file('clien_foto')->store('uploads','public');
       // }
        cliente::insert($datosCliente);
        //return view('clientes');
        //return response()->json($datosCliente);
        return redirect('clientes')->with('mensaje','Cliente agregado');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recuperado=cliente::findOrFail($id);
        return view('clientes.edit', compact('recuperado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosCliente=request()->except(['_token','_method']);
        cliente::where('id','=',$id)->update($datosCliente);
        $recuperado=cliente::findOrFail($id);
        return view('clientes.edit', compact('recuperado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        cliente::destroy($id);
        return redirect('clientes')->with('mensaje','Registro borrado con Exito');
    }
}
