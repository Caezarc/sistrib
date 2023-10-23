@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <form method="post" action="{{url('/ventas/'.$recuperado->id) }}" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        
        
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Formulario de Ventas</h3>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="col-4" >
        <label for="id" class="control-label" >USUARIO</label>
        <input type="text" value="{{Auth::user()->id}}" name="user_id" class="form-control" id="user_id" >
      </div>

      <div class="col-4">
        <label for="ven_ruc" class="control-label">RUC</label>
        <select class="form-control js-example-theme-single" name="ven_ruc">
        <option value="{{$recuperado->ven_ruc}}">{{$recuperado->ven_ruc}}</option>
        </select> 
      </div>

      <div class="col-4">
        <label for="ven_cliente" class="control-label">CLIENTE</label>
        <select class="form-control js-example-theme-single" name="ven_cliente">
        <option value="{{$recuperado->ven_cliente}}"> {{$recuperado->ven_cliente}}</option>
        </select> 
      </div>
      <div class="col-4">
        <label for="ven_fecha" class="control-label">FECHA_FACTURA</label>
        <input type="date" class="form-control" placeholder="" value="{{isset($recuperado->ven_fecha)?$recuperado->ven_fecha:''}}" name="ven_fecha" id="ven_fecha">
      </div>
      <div class="col-4">
        <label for="ven_factura" class="control-label">NO_FACTURA</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_factura)?:''}}" name="ven_factura" id="ven_factura">
      </div>
      <div class="col-4">
        <label for="ven_exento" class="control-label">EXENTO</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_exento)?:''}}" name="ven_exento" id="ven_exento">
      </div>
      <div class="col-4">
        <label for="ven_exonerado" class="control-label">EXONERADO</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_exonerado)?$recuperado->ven_exonerado:''}}" name="ven_exonerado" id="ven_exonerado">
      </div>

      <div class="col-4">
        <label for="ven_descuento" class="control-label">DESCUENTO</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_descuento)?$recuperado->ven_descuento:''}}" name="ven_descuento" id="ven_descuento">
      </div>

      <div class="col-4">
        <label for="ven_subtotal" class="control-label">SUBTOTAL</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_subtotal)?$recuperado->ven_subtotal:''}}" name="ven_subtotal" id="ven_subtotal">
      </div>

      <div class="col-4">
        <label for="ven_iva" class="control-label">IVA</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_iva)?$recuperado->ven_iva:''}}" name="ven_iva" id="ven_iva">
      </div>

      <div class="col-4">
        <label for="ven_noretdgi" class="control-label">NO_RETENCION DGI</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_noretdgi)?$recuperado->ven_noretdgi:''}}" name="ven_noretdgi" id="ven_noretdgi">
      </div>

      <div class="col-4">
        <label for="ven_retgdi" class="control-label">MONTO RET DGI</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_retgdi)?$recuperado->ven_retgdi:''}}" name="ven_retgdi" id="ven_retgdi">
      </div>

      <div class="col-4">
        <label for="ven_noretalma" class="control-label">NO_RETENCION ALMA</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_noretalma)?$recuperado->ven_noretalma:''}}" name="ven_noretalma" id="ven_noretalma">
      </div>

      <div class="col-4">
        <label for="ven_retalma" class="control-label">MONTO RET ALMA</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_retalma)?$recuperado->ven_retalma:''}}" name="ven_retalma" id="ven_retalma">
      </div>

      <div class="col-4">
        <label for="ven_tipo_ret" class="control-label">TIPO RETENCION</label>
        <select class="form-control" name="ven_tipo_ret">
        <option value="{{$recuperado->ven_id}}">{{$recuperado->ven_tipo_ret}} </option>
      
        </select>
      </div>

      <div class="col-4">
        <label for="ven_total" class="control-label">TOTAL</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_total)?$recuperado->ven_total:''}}" name="ven_total" id="ven_total">
      </div>

      <div class="form-group col-4">
        <label>FORMA DE PAGO</label>
        <select name="ven_formadepago" class="form-control ">
          <option>EFECTIVO</option>
          <option>TRANSFERENCIA</option>
          <option>TARJETA</option>
          <option>CHEQUE</option>
          
        </select>
      </div>

      <div class="col-4">
        <label for="ven_empresa" class="control-label">EMPRESA</label>
        <input type="text" value="{{Auth::user()->name}}" name="ven_empresa" class="form-control" placeholder="" id="ven_empresa">
      </div>

      <div class="col-4">
        <label for="ven_nodocpago" class="control-label">DOC PAGO</label>
        <input type="text" class="form-control" placeholder="" value="{{isset($recuperado->ven_nodocpago)?$recuperado->ven_nodocpago:''}}" name="ven_nodocpago" id="ven_nodocpago">
      </div>

      <div class="col-4">
        <label for="ven_periodo" class="control-label">PERIODO</label>
        <input type="date" class="form-control" placeholder="" value="{{isset($recuperado->ven_periodo)?$recuperado->ven_periodo:''}}" name="ven_periodo" id="ven_periodo">
      </div>

      <div class="col-12">
        <label for="ven_observacion" class="control-label">OBSERVACIONES</label>
        <textarea class="form-control" rows="3" placeholder="Enter ..." value="{{isset($recuperado->ven_observacion)?$recuperado->ven_observacion:''}}" name="ven_observacion" id="ven_observacion"></textarea>
      </div>

      <div class="col-4">
        <input type="submit" value="Guardar Datos">
      </div>


    </div>
  </div>
</div>
<a href="{{url('/ventas/') }}"> REGRESAR</a>
          
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

      
