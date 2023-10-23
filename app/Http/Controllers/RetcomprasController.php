<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compras;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RetcomprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario=Auth::user()->id;
        $fi=$request->fechainicial;
        $ff=$request->fechafinal;
        $retCompras=DB::table('compras')->whereBetween('com_periodo',[$fi,$ff])
        ->where('com_retgdi', '>', 0) 
        ->where('user_id', $usuario)                             
        ->get();      

            
            //return response()->json($fi);
            return view('retcompras.index',compact('retCompras'));
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
