@extends('adminlte::page')

@section('title', 'Dashboard')

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
        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-header">
                
                <form action="{{ route('ventas.create') }}" method="get">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="input-group mb-6">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                          <input type="text" class="form-control" name="texto" placeholder="Buscar ruc" value="" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="input-group mb-6">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                          <a href="{{url('/compras/create') }}" class="btn btn-success"> REGISTRAR COMPRA</a>
                      </div>
                    </div>
                  </div> 
                </form> 
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{url('/ventas') }}" enctype="multipart/form-data">
                  @csrf
                  @include('ventas.form',['modo'=>'Crear'])
                    
                </form>
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
    <!-- /.content -->
@stop




@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".js-example-theme-single").select2({
         
        });
     });
    </script>


@stop




