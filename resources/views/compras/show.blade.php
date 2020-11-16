@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalle de ingreso
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">

                    @foreach($compra as $cabecera)
                            
                            <div class="row" style="margin-left: 15px">
                                <p><strong>Fecha: </strong>{{$cabecera->created_at}}</p>

                            </div>
                            <br>
                            <div class="row" style="margin-left: 15px">
                                <p><strong>Numero Comprobante: </strong>{{$cabecera->numeroComprobante}}</p>
                            </div>
                            <br>
                            <div class="row" style="margin-left: 15px">
                                <p><strong>Proveedor: </strong>{{$cabecera->proveedor}}</p>
                            </div>
                            <br>
                            

                    @endforeach
                </div>
                <div class="row" >
                    @include('compras.show_fields')
                    <a href="{{ route('compras.index') }}" class="btn btn-primary" style="margin-left: 15px">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
