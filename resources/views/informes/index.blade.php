@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Informes</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('informes.create') }}">Nuevo</a>
        </h1>
    </section>

    <div class="row box-body">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="table-responsive">
                               <table id="tipoArticulo" class="table table-striped table-bordered table-condensend table-sm table-dark" >

                                  <thead class="bg-primary">
                                      <th >Logo</th>
                                      <th>Empresa</th>
                                      <th>Direccion</th> 
                                      <th>Telefono</th>
                                      <th >Opciones</th>
                                  </thead>
                                  @foreach ($informe as $repo)
                                      <tr class="bg-success">
                                          
                                          <td  ><p><img src="{!!$repo->imagen!!}" name="imagen" class="img-responsive" width="150" height="150"></p></td>
                                          <td>{{$repo->empresa}}</td>
                                          <td>{{$repo->direccion}}</td>
                                          <td>{{$repo->telefono}}</td>
                                          <td>

                                              {!! Form::open(['route' => ['informes.destroy',$repo->id], 'method' => 'delete']) !!}

                                              <div class='btn-group'>
                                                  <a  href="{{ route('informes.show',$repo->id) }}" class='btn btn-default ' style="color: green">
                                                      <i class="fas fa-eye"></i>
                                                  </a>
                                                  <a href="{{ route('informes.edit',$repo->id) }}" class='btn btn-default' style="color: blue">
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




    

    

    
@endsection

