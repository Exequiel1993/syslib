
<table class="table" style="border: 50px; border-color: #555; width: 80%; margin: 25px">
    <thead style="width: 25px">
        <tr>
            <th >Logo</th>
            <th colspan="2" ><p align="center">Descripcion</p></th>
            <th>
                <a class="btn btn-primary pull-right" style="margin-top: -22px;margin-bottom: -20px;margin-right: -25%" href="{{ route('informes.edit',1) }}">Editar</a>

                <a class="btn btn-danger pull-right" style="margin-top: 28px;margin-bottom: -50px;margin-right: -30%" href="{{ route('informes.create') }}">Eliminar</a>
            </th>
            
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td  rowspan="8"><p><img src="{!!$informe->imagen!!}" name="imagen" class="img-responsive" width="150" height="150"></p></td>
            <th >Empresa:</th>
            <td> {{$informe->empresa}}</td> 
        </tr>
        <tr>
            <th >Direccion:</th>
            <td>{{$informe->direccion}}</td>    
        </tr>
         <tr>
            <th>Telefono:</th>
            <td>{{$informe->telefono}}</td>
        </tr>
    </tbody>
</table>


