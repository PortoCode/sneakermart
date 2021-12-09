{!! Form::open(['route' => ['stores.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('stores.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('stores.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fas fa-edit"></i>
    </a>
    {!! Form::button("<i class='fas fa-trash'></i>", [
        "type"        => "submit",
        "onclick"     => "return confirm('".\Lang::get("text.confirmation")."')",
        "class"       => "btn btn-danger btn-xs",
        "data-toggle" => "tooltip",
        "title"       => \Lang::get("text.remove"),
    ]) !!}
</div>
{!! Form::close() !!}
