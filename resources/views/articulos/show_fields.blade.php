<!-- Codigounico Field -->
<div class="form-group">
    {!! Form::label('codigoUnico', 'Codigounico:') !!}
    <p>{{ $articulo->codigoUnico }}</p>
</div>

<!-- Imagen Field -->
<div class="form-group">
    <p><img src="{!!$articulo->imagen !!}" name="imagen" class="img-responsive" width="150" height="150"></p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!} 
    <p>{{ $articulo->descripcion }}</p>
</div>

<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $articulo->cantidad }}</p>
</div>

<!-- Precioventa Field -->
<div class="form-group">
    {!! Form::label('precioVenta', 'Precioventa:') !!}
    <p>{{ $articulo->precioVenta }}</p>
</div>

<!-- Stockminimo Field -->
<div class="form-group">
    {!! Form::label('stockMinimo', 'Stockminimo:') !!}
    <p>{{ $articulo->stockMinimo }}</p>
</div>

<!-- Stockmaximo Field -->
<div class="form-group">
    {!! Form::label('stockMaximo', 'Stockmaximo:') !!}
    <p>{{ $articulo->stockMaximo }}</p>
</div>

<!-- Tipoarticulo Id Field -->
<div class="form-group">
    {!! Form::label('tipoArticulo_id', 'Tipoarticulo Id:') !!}
    <p>{{ $articulo->tipoArticulo_id}}</p>
</div>

<!-- Marca Id Field -->
<div class="form-group">
    {!! Form::label('marca_id', 'Marca Id:') !!}
    <p>{{ $articulo->marca_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $articulo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $articulo->updated_at }}</p>
</div>

