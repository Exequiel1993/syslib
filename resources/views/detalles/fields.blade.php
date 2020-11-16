<!-- Articulo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('articulo_id', 'Articulo Id:') !!}
    {!! Form::select('articulo_id', $articuloItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Preciocompra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precioCompra', 'Preciocompra:') !!}
    {!! Form::number('precioCompra', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Compra Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compra_id', 'Compra Id:') !!}
    {!! Form::select('compra_id', $compraItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detalles.index') }}" class="btn btn-default">Cancel</a>
</div>
