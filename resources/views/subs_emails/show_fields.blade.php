<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $subsEmail->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $subsEmail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $subsEmail->updated_at !!}</p>
</div>

<!-- Group Email Id Field -->
<div class="form-group">
    {!! Form::label('group_email_id', 'Группа ящиков' ) !!}
    <p>{!! $subsEmail->group_email_id !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email' ) !!}
    <p>{!! $subsEmail->email !!}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Активен' ) !!}
    <p>{!! $subsEmail->active !!}</p>
</div>


<!-- Subs Field -->
<div class="form-group">
    {!! Form::label('subs', 'Подписан:' ) !!}
    <p>{!! $subsEmail->subs !!}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Комментарий' ) !!}
    <p>{!! $subsEmail->comment !!}</p>
</div>
