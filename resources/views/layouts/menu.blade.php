		<li class="{{ Request::is('users*') ? 'active' : '' }}" >
		    		<a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
		</li>

		<li class="dropdown">
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" style=" color:white"><i class="fas fa-pencil-ruler"></i>  Gestion Inventario <span class="caret"></span></a>
			
			 <ul class="dropdown-menu sidebar-menu tree smenu" data-widget="tree" style="width: 228px; background: #222d32; border:0;">

			 	<li class="{{ Request::is('compras*') ? 'active' : '' }}">
    				<a href="{{ route('compras.index') }}"><i class="fa fa-edit"></i><span>Compras</span></a>
				</li>

			 	<li class="{{ Request::is('articulos*') ? 'active' : '' }}">
		    		<a href="{{ route('articulos.index') }}"><i class="fa fa-edit"></i><span>Articulos</span></a>
				</li>

				<li class="{{ Request::is('marcas*') ? 'active' : '' }}">
		    		<a href="{{ route('marcas.index') }}"><i class="fa fa-edit"></i><span>Marcas</span></a>
				</li>

				<li class="{{ Request::is('tipoArticulos*') ? 'active' : '' }} " style="background: #222d32">
		    		<a href="{{ route('tipoArticulos.index') }}"><i class="fa fa-edit"></i><span>Tipo Articulos</span></a>
				</li>

				
			 </ul>
			
		</li>
			
<li class="{{ Request::is('proveedors*') ? 'active' : '' }}">
    <a href="{{ route('proveedors.index') }}"><i class="fa fa-edit"></i><span>Proveedors</span></a>
</li>



