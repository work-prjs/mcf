<div class="table-responsive">
    <table class="table" id="groupInMails-table">
        <thead>
            <tr>
                <th>{{ __('Make Sub Mail Id') }}</th>
        <th>{{ __('Subs Group Id') }}</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($groupInMails as $groupInMail)
            <tr>
                <td>{!! $groupInMail->make_sub_mail_id !!}</td>
            <td>{!! $groupInMail->subs_group_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['groupInMails.destroy', $groupInMail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('groupInMails.show', [$groupInMail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('groupInMails.edit', [$groupInMail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
