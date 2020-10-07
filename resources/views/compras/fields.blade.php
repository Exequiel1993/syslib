<!-- Proveedor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proveedor_id', 'Proveedor Id:') !!}
    {!! Form::select('proveedor_id', $proveedorItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Articulo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('articulo_id', 'Articulo Id:') !!}
    {!! Form::select('articulo_id', $articuloItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('compras.index') }}" class="btn btn-default">Cancel</a>
</div>
