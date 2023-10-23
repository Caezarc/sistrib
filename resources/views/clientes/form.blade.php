<h1>{{$modo}}</h1>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Formulario de Gastos</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-4">
        <label for="clien_ruc" class="control-label">RUC</label>
        <input type="text" class="form-control"  name="clien_ruc" value="{{isset($recuperado->clien_ruc)?$recuperado->clien_ruc:''}}" id="clien_ruc" >
      </div>
      
      <div class="col-4">
        <label for="clien_nombre" class="control-label">CLIENTE PROVEEDOR</label>
        <input type="text" class="form-control" placeholder="" name="clien_nombre" value="{{isset($recuperado->clien_nombre)?$recuperado->clien_nombre:''}}" id="clien_nombre">
      </div>

      <div class="col-4">
        <label for="clien_direccion" class="control-label">direccion</label>
        <input type="text" class="form-control" placeholder="" name="clien_direccion" value="{{isset($recuperado->clien_direccion)?$recuperado->clien_direccion:''}}" id="clien_direccion">
      </div>

      <div class="form-group col-4">
        <label>CONCEPTO</label>
        <select value="{{isset($recuperado->clien_concepto)?$recuperado->clien_concepto:''}}" name="clien_concepto" class="form-control ">
          <option value="COMPRAS_VARIAS">COMPRAS VARIAS</option>
          <option value="PRESTACION_SERVICIOS">PRESTACION DE SERVICIOS</option>
          <option value="ALQUILERES">ALQUILERES</option>
         
          
         </select>
      </div>

      <div class="col-4">
        <input type="submit" value="{{$modo}} Datos">
      </div>

    </div>
  </div>
</div>
<a href="{{url('/clientes/') }}"> REGRESAR</a>