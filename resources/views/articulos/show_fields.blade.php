<table class="table" style="border: 50px; border-color: #555; width: 80%; margin: 25px">
    <thead style="width: 25px">
        <tr>
            <th >Articulo</th>
            <th colspan="2" ><p align="center">Descripcion de Articulo</p></th>
            
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td  rowspan="8"><p><img src="{!!$articulo->imagen !!}" name="imagen" class="img-responsive" width="150" height="150"></p></td>
            <th >Codigo:</th>
            <td>{{ $articulo->codigoUnico }}</td> 
        </tr>
        <tr>
            <th >Descripcion:</th>
            <td>{{ $articulo->descripcion }}</td>    
        </tr>
         <tr>
            <th >Tipo Articulo:</th>
            <td>{{ $tipoArticulo->nombre}}</td>

        </tr>
        <tr>
            <th >Marca:</th>
            <td>{{ $marca->nombre}}</td>
        </tr>
        <tr>
            <th >Stock:</th>
            <td>{{ $articulo->cantidad }}</td>
        </tr>
        <tr>
            <th >Precio Venta:</th>
            <td>${{ $articulo->precioVenta }}</td>
        </tr>
        <tr>
            <th >Stock Minimo:</th>
            <td>{{ $articulo->stockMinimo }}</td>
        </tr>
        <tr>
            <th >Stock Maximo:</th>
            <td>{{ $articulo->stockMaximo }}</td>
        </tr>
        
    </tbody>
</table>






