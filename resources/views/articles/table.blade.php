<div class="table-responsive">
    <table class="table" id="articles-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
        {{-- <th>{{ __('Text') }}</th> --}}
        <th>{{ __('Image') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{!! $article->name !!}</td>
            {{-- <td>{!! $article->text !!}</td> --}}
            <td>
                <img src="{!! $article->image !!}" class="img-fluid img-responsive" style="max-height: 20em;">
            </td>
                <td>
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
