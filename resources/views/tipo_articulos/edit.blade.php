@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Articulo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoArticulo, ['route' => ['tipoArticulos.update', $tipoArticulo->id], 'method' => 'patch']) !!}

                        @include('tipo_articulos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection