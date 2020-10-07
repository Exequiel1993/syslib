{!! Form::open(['route' => ['compras.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('compras.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('compras.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Estas seguro?')"
    ]) !!}
</div>
{!! Form::close() !!}
