<h1>{{$modo}}</h1>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Formulario de Gastos</h3>
  </div>
  <div class="card-body">

    <div class="row">
      
    <div class="row">

      <div class="col-4" hidden>
        <label for="id" class="control-label" >USUARIO</label>
        <input type="text" value="{{Auth::user()->id}}" name="user_id" class="form-control" id="user_id" >
      </div> 

      <div class="col-4" hidden>
        <label for="clien_id" class="control-label">CLIEN ID</label>
        <input type="text" value="{{isset($customer->id)?$customer->id:''}}" name="clien_id" class="form-control" placeholder="" id="clien_id"> 
      </div>

      <div class="col-4">
        <label for="com_ruc" class="control-label" ruc>RUC</label>
        <input type="text" value="{{isset($customer->clien_ruc)?$customer->clien_ruc:''}}" name="com_ruc" class="form-control is-warning" placeholder="" id="com_ruc">
      </div>
      
      <div class="col-4">
        <label for="com_proveedor" class="control-label">PROVEEDOR</label>
        <input type="text" value="{{isset($customer->clien_nombre)?$customer->clien_nombre:''}}" name="com_proveedor" class="form-control is-warning" placeholder="" id="com_proveedor">
      </div>

      <div class="col-4">
        <label for="com_fecha" class="control-label">FECHA_FACTURA</label>
        <input type="date" value="{{isset($recuperado->com_fecha)?$recuperado->com_fecha:''}}" name="com_fecha" class="form-control is-warning" placeholder="" id="com_fecha" required="">
      </div>
      <div class="col-4">
        <label for="com_factura" class="control-label">NU_FACTURA</label>
        <input type="text" style="text-transform:uppercase;" value="{{isset($recuperado->com_factura)?$recuperado->com_factura:''}}" name="com_factura" class="form-control is-warning" placeholder="" id="com_factura" required="">
      </div>
      <div class="form-group col-4">
        <label>CONCEPTO</label>
        <select value="{{isset($recuperado->com_concepto)?$recuperado->com_concepto:''}}" name="com_concepto" class="form-control is-warning">
          <option >COMPRAS VARIAS</option>
          <option >PRESTACION DE SERVICIOS</option>
          <option >ALQUILERES</option>
         
          
        </select>
      </div>
      <div class="col-4">
        <label for="com_decuento" class="control-label">DESCUENTO</label>
        <input type="number" step="0.01" min="0"  value="{{isset($recuperado->com_descuento)?$recuperado->com_descuento:''}}" name="com_decuento" class="form-control" placeholder="c$.00" id="com_decuento">
      </div>

      <div class="col-4">
        <label for="com_subtotal" class="control-label">C$ SUBTOTAL</label>
        <input type="number" step="0.01" min="0" value="{{isset($recuperado->com_subtotal)?$recuperado->com_subtotal:''}}" name="com_subtotal" class="form-control is-warning" placeholder="c$.00" id="com_subtotal" required="">
      </div>

      <div class="col-4">
        <label for="com_iva" class="control-label">IVA</label>
        <input type="number" step="0.01" min="0" value="{{isset($recuperado->com_iva)?$recuperado->com_iva:''}}" name="com_iva" class="form-control" placeholder="c$.00" id="com_iva" >
      </div>

      <div class="col-4">
        <label for="com_noretdgi" class="control-label">NU_RETENCION DGI</label>
        <input type="number" value="{{isset($recuperado->com_noretdgi)?$recuperado->com_noretdgi:''}}" name="com_noretdgi" class="form-control" placeholder="#" id="com_noretdgi" >
      </div>

      <div class="col-4">
        <label for="com_retgdi" class="control-label">c$ MONTO RET DGI</label>
        <input type="number" step="0.01" min="0" value="{{isset($recuperado->com_retgdi)?$recuperado->com_retgdi:'0'}}" name="com_retgdi" class="form-control" placeholder="c$.00" id="com_retgdi" >
      </div>

      <div class="col-4">
        <label for="com_noretalma" class="control-label">Nu_RETENCION ALMA</label>
        <input type="number" value="{{isset($recuperado->com_noretalma)?$recuperado->com_noretalma:''}}" name="com_noretalma" class="form-control" placeholder="#" id="com_noretalma">
      </div>

      <div class="col-4">
        <label for="com_retalma" class="control-label">C$ MONTO RET ALMA</label>
        <input type="number" step="0.01" min="0" value="{{isset($recuperado->com_retalma)?$recuperado->com_retalma:'0'}}" name="com_retalma" class="form-control" placeholder="c$.00" id="com_retalma" >
      </div>

      <div class="col-4">
        <label for="com_tipo_ret" class="control-label">TIPO RETENCION</label>
        <select class="form-control js-example-theme-single" data-live-search="true" name="com_tipo_ret" id="com_tipo_ret">
        <option value=""></option>  
        @foreach ($codigos as $codigo)  
        <option value=""></option>
        <option value="{{$codigo->cod_codigo}}">{{$codigo->cod_codigo}} {{$codigo->cod_tipo_retencion}} </option>
        @endforeach 
        </select>
      </div>

 

      <div class="col-4">
        <label for="com_total" class="control-label">c$ TOTAL</label>
        <span>El resultado es: </span> <span id="spTotal"></span>
        <input type="text" onmousemove="sumar()" value="{{isset($recuperado->com_total)?$recuperado->com_total:''}}" name="com_total" class="form-control is-invalid" placeholder="c$.00" id="com_total" required="">
      </div>

      <div class="form-group col-4">
        <label>FORMA DE PAGO</label>
        <select value="{{isset($recuperado->com_formadepago)?$recuperado->com_formadepago:''}}" name="com_formadepago" class="form-control is-warning">
          <option>EFECTIVO</option>
          <option>TRANSFERENCIA</option>
          <option>TARJETA</option>
          <option>CHEQUE</option>
          
        </select>
      </div>

      <div class="col-4">
        <label for="com_nodocpago" class="control-label">NU_DOCUMENTO</label>
        <input type="text" style="text-transform:uppercase;" value="{{isset($recuperado->com_nodocpago)?$recuperado->com_nodocpago:''}}" name="com_nodocpago" class="form-control is-warning" placeholder="N°" id="com_nodocpago">
      </div>

      <div class="col-4" hidden>
        <label for="com_empresa" class="control-label">EMPRESA</label>
        <input type="text" value="{{Auth::user()->name}}" name="com_empresa" class="form-control" placeholder="" id="com_empresa">
      </div>

      <div class="col-4">
        <label for="com_periodo" class="control-label">PERIODO</label>
        <input type="date" value="{{isset($recuperado->com_periodo)?$recuperado->com_periodo:''}}" name="com_periodo" class="form-control is-warning" placeholder="" id="com_periodo" >
      </div>

      <div class="col-12">
        <label for="com_observacion" class="control-label">OBSERVACIONES</label>
        <textarea class="form-control" style="text-transform:uppercase;" rows="3" placeholder="Enter ..." value="{{isset($recuperado->com_observacion)?$recuperado->com_observacion:''}}" name="com_observacion" id="com_observacion"></textarea>
      </div>

      <div class="col-4">
        <input type="submit" value="Guardar Datos">
      </div>


    </div>
  </div>
</div>
<a href="{{url('/compras/') }}"> REGRESAR</a>