@extends('adminlte::page')

@section('title', 'Clientes')

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
                <!--<form action="{{ route('clientes.index') }}" method="get">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="input-group mb-6">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                          <input type="text" class="form-control" name="texto" placeholder="Buscar Ruc" value="" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="input-group mb-6">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                          <a href="{{url('/clientes/create') }}" class="btn btn-success"> REGISTRAR CLIENTE</a>
                      </div>
                    </div>
                  </div> 
                </form> -->
                </div><!-- /.card-header -->
                <div class="card-body">
                  @if (Session::has('mensaje'))
                  {{ Session::get('mensaje')}};
                  @endif

                     <table id="tclientes" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>CLIENTE_RUC</th>
                          <th>CLIENTE_NOMBRE</th>
                          <th>CLIENTE_DIRECCION</th>
                          <th>CLIENTE_CONCEPTO</th>
                          <th>EDITAR</th>
                          <th>ELIMINAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($datos as $cliente)                              
                         
                        <tr>
                          <td>{{$cliente->id}}</td>
                          <td>{{$cliente->clien_ruc}}</td>
                          <td>{{$cliente->clien_nombre}}</td>
                          <td> {{$cliente->clien_direccion}}</td>
                          <td>{{$cliente->clien_concepto}}</td>
                          <td><a href="{{url('/clientes/'.$cliente->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a></td>
                            
                          <td>  <form action="{{url('/clientes/'.$cliente->id) }}", method="post">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="button" onclick="return confirm('¿Deseas Borrar este registro')" class="btn btn-outline-danger btn-sm">
                              <i class="fas fa-trash-alt"></i></button>
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
    </section> <!-- /.content -->

@stop

@section('js')
  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
           
    <script>
    new DataTable('#tclientes', {
    responsive: true,
    autoWidth:false,
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontró nada - lo siento",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': 'buscar:',
            'paginate':{'previous':'anterior','next':'siguiente'}}
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