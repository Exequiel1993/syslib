<!-- Articulo Id Field -->
<div class="form-group">
    {!! Form::label('articulo_id', 'Articulo Id:') !!}
    <p>{{ $detalle->articulo_id }}</p>
</div>

<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $detalle->cantidad }}</p>
</div>

<!-- Preciocompra Field -->
<div class="form-group">
    {!! Form::label('precioCompra', 'Preciocompra:') !!}
    <p>{{ $detalle->precioCompra }}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $detalle->subtotal }}</p>
</div>

<!-- Compra Id Field -->
<div class="form-group">
    {!! Form::label('compra_id', 'Compra Id:') !!}
    <p>{{ $detalle->compra_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $detalle->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $detalle->updated_at }}</p>
</div>

