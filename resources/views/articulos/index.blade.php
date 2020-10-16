@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Articulos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('articulos.create') }}">Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
      
            <div class="box box-primary">  
                    <div class="box-body">
                            <div class="form-group col-md-4">
                                <label >Fecha Desde</label>
                                <input type="datetime-local" class="form-control" id="start_date">
                            </div>
                            <div class="form-group col-md-4">
                                <label >Fecha hasta</label>
                                <input type="datetime-local" class="form-control" id="end_date">
                            </div>
                            <br>
                            <div class="form-group col-md-2">
                                <button type="button" class="btn btn-primary" id="filtrar">Filtrar</button>
                                <button type="button" class="btn btn-danger" id="reset">Reiniciar</button>
                            </div>
                            
                    </div>       
            <div class="box-body">
                    @include('articulos.table')
            </div>
            
        </div>
        
    </div>
@endsection
@section('page_scripts')
    <script>
      let articuloUrl = '{{url('/articulos')}}/'
    </script>
    <script src="{{ asset('assets/articulos/articulo.js') }}"></script>

     <script>
        
        $('#dataTableBuilder').on('preXhr.dt',function(e,settings,data){

            data.start_date =  $('#start_date').val();
            data.end_date   =  $('#end_date').val();     
        });

        $('#filtrar').on('click',function(){

            $('#dataTableBuilder').DataTable().ajax.reload();

            return false;
        });

        $('#reset').on('click',function(){

                $('#dataTableBuilder').on('preXhr.dt',function(e,settings,data){

                    data.start_date = ' ';
                    data.end_date   = ' ';     
                });

                $('#dataTableBuilder').DataTable().ajax.reload();
                return false;
        });

    </script>
@endsection