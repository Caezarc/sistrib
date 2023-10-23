<?php

namespace App\Http\Controllers;
use App\Models\venta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IvaventasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario=Auth::user()->id;
        $fi=$request->fechainicial;
        $ff=$request->fechafinal;
        $ivaVentas=DB::table('ventas')->whereBetween('ven_periodo',[$fi,$ff])
        ->where('ven_iva', '>', 0)
        ->where('user_id', $usuario)                              
        ->get();
                                        

            
            //return response()->json($fi);
            return view('ivaventas.index',compact('ivaVentas'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
