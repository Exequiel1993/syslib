<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $compra->cantidad }}</p>
</div>

<!-- Proveedor Id Field -->
<div class="form-group">
    {!! Form::label('proveedor_id', 'Proveedor Id:') !!}
    <p>{{ $compra->proveedor_id }}</p>
</div>

<!-- Articulo Id Field -->
<div class="form-group">
    {!! Form::label('articulo_id', 'Articulo Id:') !!}
    <p>{{ $compra->articulo_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $compra->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $compra->updated_at }}</p>
</div>

