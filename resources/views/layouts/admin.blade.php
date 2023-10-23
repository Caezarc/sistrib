@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <div class="container text-center">
        <h5><p>Bienvenidos a su sistema tributario: <b>{{Auth::user()->name}}</b></p>
        <img src="{{Auth::user()->photo ? asset('storage/'.Auth::user()->photo): asset('img/user-default.png')}}" width='100' heigh='150' class='rounded-circle'></h5>
    
    </div>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h2>GESTIONAR USUARIOS</h2>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary"><i class='far fa-address-book' style='font-size:36px'></i></a>
                            
                        </div>    
                    </div>
                </div>
            </div>    
        </div>

        <div class="col-md-4">
            <div class="card">
            <div class="card-header text-center">
                    <h2>GESTIONAR INGRESOS</h2>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('ventas.index') }}" class="btn btn-primary"><i class='far fa-arrow-alt-circle-up' style='font-size:36px'></i></a>
                            
                        </div>    
                    </div>
                </div>
            </div> 
        </div>

        <div class="col-md-4">
            <div class="card">
            <div class="card-header text-center">
                    <h2>GESTIONAR GASTOS</h2>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('compras.index') }}" class="btn btn-primary"><i class='fas fa-arrow-circle-down' style='font-size:36px'></i></a>
                            
                        </div>    
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@stop

