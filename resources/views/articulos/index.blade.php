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

    <div class="box box-primary">

            <!-- Filtro -->  
            <div class="box-body" style="text-align: center; flex-direction: row-reverse;">
                    
                    {!! Form::open(array('url'=>'/articulos','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

                    <div class="form-group col-md-3" >
                                    <label >Fecha Desde</label>
                                    <input type="date" name="desde" class="form-control" id="start_date" value="{{$desde}}">
                    </div>

                    <div class="form-group col-md-3" >
                                    <label >Fecha hasta</label>
                                    <input type="date" name="hasta" class="form-control" id="end_date" value="{{$hasta}}">
                    </div>

                    <div class="form-group col-md-2 pull-left" style="margin-top: 25px;margin-right: -5px">
                          <button type="submit" class="btn btn-primary" name="filtrar" id="filtrar"><i class="fas fa-filter"></i></button>

                          <a href="/articulos"><button type="button" class="btn btn-danger" id="reset " style="background:#ff6600 "><i class="fas fa-redo"></i></button></a>

                          <button type="submit" class="btn btn-danger" name="pdf" ><i class="far fa-file-pdf"></i></button>
                    </div>

                    <div class="form-group col-md-3 pull-right row" style="margin-top: 25px;margin-right: -5px" >
                       <div class="input-group">
                           <input type="text" class="form-control" name="buscarTexto" placeholder="Buscar..." >
                           <span class="input-group-btn">
                               <button type="submit" class="btn btn-primary" >Buscar</button>
                           </span>
                       </div>
                    </div>
                {!! Form::close() !!}    
                    
            </div>
            
            <!-- Tabla Articulos -->
            <div class="box-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="table-responsive">
                               <table id="articulo" class="table table-striped table-bordered table-condensend table-sm table-dark" >

                                  <thead class="bg-primary">
                                      <th >Codigo</th>
                                      <th>TipoArticulo</th>
                                      <th>Marca</th>
                                      <th>Descripcion</th>
                                     
                                      <th style="width: 15%">Opciones</th>
                                  </thead>
                                  @foreach ($articulo as $articulos)
                                      <tr class="bg-success">
                                          <td>{{$articulos->codigoUnico}}</td>
                                          <td>{{$articulos->tipoArticulo}}</td>
                                          <td>{{$articulos->marca}}</td>
                                          <td>{{$articulos->descripcion}}</td>
                                          
                                          <td>

                                              {!! Form::open(['route' => ['articulos.destroy',$articulos->id], 'method' => 'delete']) !!}

                                              <div class='btn-group'>
                                                  <a  href="{{ route('articulos.show',$articulos->id) }}" class='btn btn-default ' style="color: green">
                                                      <i class="fas fa-eye"></i>
                                                  </a>
                                                  <a href="{{ route('articulos.edit',$articulos->id) }}" class='btn btn-default' style="color: blue">
                                                      <i class="fas fa-edit"></i>
                                                  </a>
                                                  {!! Form::button('<i class="fas fa-trash-alt"></i>', [
                                                      'type' => 'submit',
                                                      'class' => 'btn btn-default',
                                                      'style' => 'color:red',
                                                      'onclick' => "return confirm('Estas seguro?')"
                                                  ]) !!}
                                              </div>

                                              {!! Form::close() !!}
                                              


                                          </td>
                                      </tr>
                                  @endforeach
                               </table>
                          </div>
                      

                    </div>
            </div>
            <div>
                
            </div>
            
        </div>
        
    </div>
@endsection
@section('page_scripts')
    <script>
      let articuloUrl = '{{url('/articulos')}}/'
    </script>
    <script src="{{ asset('assets/articulos/articulo.js') }}"></script>

    <script type="text/javascript">
        
        


    </script>

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

                    data.start_date = $('#start_date').val(" ");
                    data.end_date   = $('#end_date').val(" ");

                });

                $('#dataTableBuilder').DataTable().ajax.reload();

                return false;

        });

        

    </script>
@endsection