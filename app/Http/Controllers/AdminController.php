<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        //return $request->session()->all();
        return view('layouts.admin');                                                                                 
    }
}
