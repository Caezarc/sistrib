@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<form method="post" action="{{url('/clientes/'.$recuperado->id) }}" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('clientes.form',['modo'=>'Editar'])
            
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop