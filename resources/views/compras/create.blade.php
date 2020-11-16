@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nuevo ingreso
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
               
                    {!! Form::open(['route' => 'compras.store']) !!}

                        @include('compras.fields')

                    {!! Form::close() !!}
                    
              
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')

<script >
    $(document).ready(function (){
        $('#bt_add').click(function(){
            agregar();
        });
    });
    var cont=0;
    total = 0;
    subtotal=[];
    
    //$('#guardar').hide();
    function limpiar(){
        $('#cantidad').val(" ");
        $('#preciocompra').val(" ");
    }

    function agregar()
    {
        idarticulo=$('#idarticulo').val();
        articulo=$('#idarticulo option:selected').text();
        cantidad=$('#cantidad').val();
        precioCompra=$('#preciocompra').val();
        

        if (idarticulo !="" && cantidad !="" && cantidad > 0 && precioCompra !="") {

            subtotal[cont]=(cantidad*precioCompra);
            total=total+subtotal[cont];

            var fila= '<tr class="selected" id="fila'+cont+'"><td><button class="btn btn-warning" type="button" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo_unico[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad_articulo[]" value="'+cantidad+'" readonly style="border:0;"></td><td><input style="border:0;" type="number" name="precio_compra[]" value="'+precioCompra+'" readonly ></td>><td><input type="hidden" name="subtotal[]" value="'+subtotal[cont]+'">'+subtotal[cont]+'</td></tr>'
            cont++;
            limpiar();
            $("#resultado").html("$"+total);
            evaluar();
            $("#detalle").append(fila);
            $('#tot').val(total);
            $('#total').val(total);
        }else
        {
            alert("Error al ingresar");
        }
    }
    function evaluar(){
         if (total>0) {
            $('#guardar').show();
         }
         else{
            $('#guardar').hide();
         }
    }

    function eliminar(index){
        total=total-subtotal[index];
        $("#resultado").html("$"+total);
        $("#fila" + index).remove();
        evaluar();
        $('#total').val(total);
    }


</script>

@endsection