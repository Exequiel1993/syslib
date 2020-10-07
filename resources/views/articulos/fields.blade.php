<!-- Codigounico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigoUnico', 'Codigounico:') !!}
    {!! Form::text('codigoUnico', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::file('imagen') !!}
</div>
<div class="clearfix"></div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Precioventa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precioVenta', 'Precioventa:') !!}
    {!! Form::text('precioVenta', null, ['class' => 'form-control']) !!}
</div>

<!-- Stockminimo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stockMinimo', 'Stockminimo:') !!}
    {!! Form::text('stockMinimo', null, ['class' => 'form-control']) !!}
</div>

<!-- Stockmaximo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stockMaximo', 'Stockmaximo:') !!}
    {!! Form::text('stockMaximo', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipoarticulo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoArticulo_id', 'Tipoarticulo:') !!}
    {!! Form::select('tipoArticulo_id', $tipo_articuloItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Marca Id:') !!}
    {!! Form::select('marca_id', $marcaItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articulos.index') }}" class="btn btn-default">Cancelar</a>
</div>
