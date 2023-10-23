@extends('adminlte::page')

@section('title', 'compras')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
@stop

@section('content_header')
    <div class="container text-center">
        <h5><p>Bienvenidos a su sistema tributario: <b>{{Auth::user()->name}}</b></p>
           
    </div>
@stop

@section('content')
<section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
  
              <div class="card">
                <div class="card-header">
                <div class="card-header">
                  <form action="{{ route('compras.index') }}" method="get">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group mb-6">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" name="texto" placeholder="Buscar" value=" " aria-label="Recipient's username" aria-describedby="button-addon2">
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
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <!--para mandar mensaje-->
                  @if (Session::has('mensaje'))
                  {{ Session::get('mensaje')}};
                  @endif
                  <a href="{{url('/compras/create') }}"> REGISTRAR COMPRA</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Fecha Compra</th>
                          <th>Factura</th>
                          <th>Ruc</th>
                          <th>Proveedor</th>
                          <th>Concepto</th>
                          <th>Subtotal</th>
                          <th>DGI</th>
                          <th>ALMA</th>
                          <th>Iva</th>
                          <th>Total</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($compras as $compra)  
                        <tr>
                          <td>{{$compra->id}}</td>
                          <td>{{$compra->com_fecha}}</td>
                          <td>{{$compra->com_factura}}</td>
                          <td>{{$compra->com_ruc}}</td>
                          <td>{{$compra->com_proveedor}}</td>
                          <td>{{$compra->com_concepto}}</td>
                          <td>{{$compra->com_subtotal}}</td>
                          <td>{{$compra->com_retgdi}}</td>
                          <td>{{$compra->com_retalma}}</td>
                          <td>{{$compra->com_iva}}</td>
                          <td>{{$compra->com_total}}</td>
                          <td>
                            <a href="{{url('/compras/'.$compra->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a></td>

                          <td>  
                            <form action="{{url('/compras/'.$compra->id) }}", method="post">
                            @csrf
                            {{method_field('DELETE')}}
                             <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Deseas Borrar este registro')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                          </td>
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
<script src="{{asset('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
           
@stop