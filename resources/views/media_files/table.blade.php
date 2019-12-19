<div class="table-responsive">
    <table class="table" id="mediaFiles-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
        {{-- <th>{{ __('Desc') }}</th> --}}
        <th>{{ __('Image') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mediaFiles as $mediaFile)
            <tr>
                <td>{!! $mediaFile->name !!}</td>
            {{-- <td>{!! $mediaFile->desc !!}</td> --}}
            {{-- <td>{!! $mediaFile->image !!}</td> --}}
            <td>
                <img src="{!! $mediaFile->image !!}" class="img-fluid img-responsive" style="max-height: 20em;">
            </td>

                <td>
                    {!! Form::open(['route' => ['mediaFiles.destroy', $mediaFile->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('mediaFiles.show', [$mediaFile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('mediaFiles.edit', [$mediaFile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
