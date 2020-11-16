<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $tipoArticulo->nombre }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de Creacion:') !!}
    <p>{{ $tipoArticulo->created_at->format('d/m/yy')}}</p>
</div>



