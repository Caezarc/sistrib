@extends('adminlte::page')

@section('title', 'ventas')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
@stop

@section('content_header')
   
@stop

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <form action="{{ route('ivaventas.index') }}" method="get">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="input-group mb-6">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                      <input type="date" class="form-control" name="fechainicial" placeholder="fechainicial" value="" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <input type="date" class="form-control" name="fechafinal" placeholder="fechafinal" value="" aria-label="Recipient's username" aria-describedby="button-addon2">  
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="input-group mb-6">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                      <a href="{{url('/ventas/create') }}" class="btn btn-success"> REGISTRAR VENTAS</a>
                  </div>
                </div>
              </div> 
            </form> 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!--para mandar mensaje-->
            @if (Session::has('mensaje'))
            {{ Session::get('mensaje')}};
            @endif
            <a href="{{url('/ventas/create') }}"> REGISTRAR VENTA</a>
            <table id="example1" class="table table-striped table-bordered nowrap">
              <thead>
              <tr>
                <th>Numero Ruc</th>
                <th>Cliente</th>
                <th>Numero Documento</th>
                <th>Descripcion del pago</th>
                <th>Fecha Documento</th>
                <th>Ingreso sin IVA</th>
                <th>Monto IVA </th>
                <th>Total</th>

              </tr>
              </thead>
              <tbody>
              @foreach ($ivaVentas as $venta)  
              <tr>
                     
                <td>{{$venta->ven_ruc}}</td>
                <td>{{$venta->ven_cliente}}</td>
                <td>{{$venta->ven_factura}}</td>
                <td>{{$venta->ven_formadepago}}</td>
                <td>{{$venta->ven_fecha}}</td>
                <td>{{$venta->ven_subtotal}}</td>
                <td>{{$venta->ven_iva}}</td>
                <td>{{$venta->ven_total}}</td>
  

              </tr>
              @endforeach
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
@stop



@section('js')
  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    <!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, 
      "language": {
        "search": "buscar:","paginate":{"previous":"anterior","next":"siguiente"},"info": "Mostrando la página _PAGE_ de _PAGES_"},
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
           
 

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".js-example-theme-single").select2({
         theme: "classic"
        });
     });
    </script>
@stop



     