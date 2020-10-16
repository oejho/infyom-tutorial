<div class="table-responsive">
    <table class="table" id="continents-table">
        <thead>
            <tr>
                <th>@lang('models/continents.fields.name')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($continents as $continent)
            <tr>
                <td>{{ $continent->name }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.location.continents.destroy', $continent->code], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.location.continents.show', [$continent->code]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.location.continents.edit', [$continent->code]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
