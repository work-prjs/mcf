<div class="table-responsive">
    <table class="table" id="docFiles-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
        <th>{{ __('Desc') }}</th>
        <th>{{ __('Doc File') }}</th>
        <th>{{ __('Doc File Type') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($docFiles as $docFile)
            <tr>
                <td>{!! $docFile->name !!}</td>
            <td>{!! $docFile->desc !!}</td>
            <td>{!! $docFile->doc_file !!}</td>
            <td>{!! $docFile->doc_file_type !!}</td>
                <td>
                    {!! Form::open(['route' => ['docFiles.destroy', $docFile->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('docFiles.show', [$docFile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('docFiles.edit', [$docFile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
