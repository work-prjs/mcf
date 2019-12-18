<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $subsGroup->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $subsGroup->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $subsGroup->updated_at !!}</p>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Навзание' ) !!}
    <p>{!! $subsGroup->name !!}</p>
</div>
<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Активен' ) !!}
    <p>{!! $subsGroup->active !!}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Комментарий' ) !!}
    <p>{!! $subsGroup->comment !!}</p>
</div>

