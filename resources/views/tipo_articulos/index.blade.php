@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Tipo Articulos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 2px;margin-right: 2px" href="{{ route('tipoArticulos.create') }}">Nuevo</a>
        </h1>
    </section>

    <div class="content">
    <div class="clearfix"></div>
    <div class="box box-primary">
    <div class="row box-body">

        {!! Form::open(array('url'=>'/tipoArticulos','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

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

                          <a href="/tipoArticulos"><button type="button" class="btn btn-danger" id="reset " style="background:#ff6600 "><i class="fas fa-redo"></i></button></a>

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

        
                    <div class="row box-body">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="table-responsive">
                               <table id="tipoArticulo" class="table table-striped table-bordered table-condensend table-sm table-dark" >

                                  <thead class="bg-primary">
                                      <th >Nombre</th>
                                      <th style="width: 15%">Opciones</th>
                                  </thead>
                                  @foreach ($tipoArticulo as $tipo)
                                      <tr class="bg-success">
                                          <td>{{$tipo->nombre}}</td>
                                          <td>

                                              {!! Form::open(['route' => ['tipoArticulos.destroy',$tipo->id], 'method' => 'delete']) !!}

                                              <div class='btn-group'>
                                                  <a  href="{{ route('tipoArticulos.show',$tipo->id) }}" class='btn btn-default ' style="color: green">
                                                      <i class="fas fa-eye"></i>
                                                  </a>
                                                  <a href="{{ route('tipoArticulos.edit',$tipo->id) }}" class='btn btn-default' style="color: blue">
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
                   </div>
                </div>
                
    </div>    
@endsection


