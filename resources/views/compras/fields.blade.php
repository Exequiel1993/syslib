<div class="row">
			<!-- Proveedor Id Field -->
			<div class="form-group col-sm-12">
			    {!! Form::label('proveedor_id', 'Proveedor:') !!}
			    {!! Form::select('proveedor_id', $proveedorItems, null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-sm-6">
			    {!! Form::label('numeroComprobante', 'Numero Comprobante:') !!}
			    {!! Form::number('numeroComprobante', null, ['class' => 'form-control']) !!}
			</div>
</div>


<div class="row">

	<div class="panel panel-primay" style="border-color: #A9DFBF">
		
			<div class="panel-body">
				
				<!-- Articulo Id Field -->
				<div class="form-group col-sm-4">
				    {!! Form::label('articulo_id', 'Articulo:') !!}
				    {!! Form::select('articulo_id', $articuloItems, null, ['id'=>'idarticulo','class' => 'form-control']) !!}
				</div>
				<!-- Cantidad Field -->
				<div class="form-group col-sm-2">
				    {!! Form::label('cantidad', 'Cantidad:') !!}
				    {!! Form::number('cantidad', null, ['id'=>'cantidad','class' => 'form-control']) !!}
				</div>

				<div class="form-group col-sm-2">
				    {!! Form::label('precioCompra', 'Precio Compra:') !!}
				    {!! Form::number('precioCompra', null, ['id'=>'preciocompra','class' => 'form-control']) !!}
				</div>

				
				{!! Form::hidden('total', null, ['id'=>'total','class' => 'form-control']) !!}
				

				<div class="form-group col-sm-2" >
			    {!! Form::button('Agregar', ['id'=>'bt_add','class' => 'btn btn-primary']) !!}

				</div>

				<div class="form-group col-sm-12">
							    <table id="detalle" class="table table-striped table-bordered table-condensed table-hover" >
							    	<thead style="background-color: #A9D0F5">
							    		<th>Aciones</th>
							    		<th>Articulo</th>
							    		<th>Cantidad</th>
							    		<th>Precio Compra</th>
							    		<th>SubTotal</th>
							    		
							    	</thead>
							    	<tfoot>
							    		<th>Total</th>
							    		<th></th>
							    		<th></th>
							    		<th></th>
							    		<th><h4 id="resultado">$0.00</h4></th>
							    	</tfoot>
							    </table>
				</div>
	</div>
			
			
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12" id="guardar">
	<br>
	{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	<a href="{{ route('compras.index') }}" class="btn btn-danger">Cancel</a>
</div>


