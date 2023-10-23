@extends('adminlte::page')

@section('title', 'Dashboard')

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
                <h3 class="card-title">Compras del mes</h3>

                  
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form method="post" action="{{url('/clientes') }}" enctype="multipart/form-data">
                  @csrf
                  @include('clientes.form',['modo'=>'Crear'])
                    
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".js-example-theme-single").select2({
         theme: "classic"
        });
     });
    </script>
@stop