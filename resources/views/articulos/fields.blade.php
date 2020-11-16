<div class="box-body">
    
            <!-- Codigounico Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('codigoUnico', 'Codigounico:') !!} 
            {!! Form::text('codigoUnico', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Imagen Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('imagen', 'Imagen:') !!}
            {!! Form::file('imagen') !!}
        </div>
        <div class="clearfix"></div>
        <!-- Tipoarticulo Id Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('tipoArticulo_id', 'Tipoarticulo:') !!}
            {!! Form::select('tipoArticulo_id', $tipo_articuloItems, null, ['class' => 'form-control', 'required']) !!}
        </div>
        <!-- Marca Id Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('marca_id', 'Marca:') !!}
            {!! Form::select('marca_id', $marcaItems, null, ['class' => 'form-control','required']) !!}
        </div>

        <!-- Cantidad  Field -->
         
            {!! Form::hidden('cantidad',0, ['class' => 'form-control']) !!}
        
</div>

<div class="box-body" >
    <!-- Descripcion Field -->
    <div class="form-group col-sm-6 ">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control','required']) !!}
    </div>
</div>
<div class="box-body" >
        <!-- Stockminimo Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('stockMinimo', 'Stockminimo:') !!}
            {!! Form::number('stockMinimo', null, ['class' => 'form-control','required','min'=>'0']) !!}
        </div>
        <!-- Stockmaximo Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('stockMaximo', 'Stockmaximo:') !!}
            {!! Form::number('stockMaximo', null, ['class' => 'form-control','required','min'=>'0']) !!}
        </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articulos.index') }}" class="btn btn-default">Cancelar</a>
</div>
