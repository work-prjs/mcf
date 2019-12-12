<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $groupInMail->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $groupInMail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $groupInMail->updated_at !!}</p>
</div>

<!-- Make Sub Mail Id Field -->
<div class="form-group">
    {!! Form::label('make_sub_mail_id', __('Make Sub Mail Id') ) !!}
    <p>{!! $groupInMail->make_sub_mail_id !!}</p>
</div>

<!-- Subs Group Id Field -->
<div class="form-group">
    {!! Form::label('subs_group_id', __('Subs Group Id') ) !!}
    <p>{!! $groupInMail->subs_group_id !!}</p>
</div>

