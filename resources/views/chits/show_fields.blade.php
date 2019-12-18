<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    {!! $chit->id !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    {!! $chit->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    {!! $chit->updated_at !!}
</div>

<!-- Text Field -->
<div class="form-group">
    {!! Form::label('text', 'Текст' ) !!}
    {!! $chit->text !!}
</div>

<!-- By Line Field -->
<div class="form-group">
    {!! Form::label('by_line', 'Подписьм' ) !!}
    {!! $chit->by_line !!}
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Активен' ) !!}
    {!! $chit->active !!}
</div>

