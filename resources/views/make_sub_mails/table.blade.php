<div class="table-responsive">
    <table class="table" id="makeSubMails-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
        <th>Тема</th>
        <th>Текст</th>
        {{-- <th>{{ __('Mail Files') }}</th> --}}
        <th>Разослано</th>
        <th>{{ __('Comment') }}</th>
                <th colspan="3">Действие</th>
                {{-- <th>Запуск</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach($makeSubMails as $makeSubMail)
            <tr>
                <td>{!! $makeSubMail->name !!}</td>
            <td>{!! $makeSubMail->subject !!}</td>
            <td>{!! $makeSubMail->text !!}</td>
            {{-- <td>{!! $makeSubMail->mail_files !!}</td> --}}
            <td>{!! $makeSubMail->done !!}</td>
            <td>{!! $makeSubMail->comment !!}</td>
                <td>
                    {!! Form::open(['route' => ['makeSubMails.destroy', $makeSubMail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('makeSubMails.show', [$makeSubMail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('makeSubMails.edit', [$makeSubMail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                {{-- <td>
                    <a href="{!! route('makeSubMails.edit', [$makeSubMail->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-play"></i></a>
                </td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
