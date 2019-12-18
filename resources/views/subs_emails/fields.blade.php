<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subsEmails.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Group Email Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_email_id', 'Группа ящиков:') !!}
    {{-- {!! Form::select('group_email_id', ['' => 'GroupEmail'], null, ['class' => 'form-control']) !!} --}}
    {!!  Form::select('group_email_id', App\Models\SubsGroup::all()->pluck('name', 'id')->prepend('Корневая категория', '0'), null, ['class' => 'form-control']) !!}

</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>



<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Комментарий:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Активен:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>

<!-- Subs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subs', 'Подписан:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('subs', 0) !!}
        {!! Form::checkbox('subs', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subsEmails.index') !!}" class="btn btn-default">Отмена</a>
</div>
