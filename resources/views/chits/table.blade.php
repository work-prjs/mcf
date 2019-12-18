<div class="table-responsive">
    <table class="table" id="chits-table">
        <thead>
            <tr>
                <th>{{ __('Text') }}</th>
        <th>Подпись</th>
        <th>Активен</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($chits as $chit)
            <tr>
                <td>{!! $chit->text !!}</td>
            <td>{!! $chit->by_line !!}</td>
            <td>{!! $chit->active !!}</td>
                <td>
                    {!! Form::open(['route' => ['chits.destroy', $chit->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('chits.show', [$chit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('chits.edit', [$chit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
