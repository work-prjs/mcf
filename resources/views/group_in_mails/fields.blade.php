<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('groupInMails.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Make Sub Mail Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('make_sub_mail_id', 'Make Sub Mail Id:') !!}
    {!! Form::text('make_sub_mail_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Subs Group Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subs_group_id', 'Subs Group Id:') !!}
    {!! Form::text('subs_group_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('groupInMails.index') !!}" class="btn btn-default">Отмена</a>
</div>
