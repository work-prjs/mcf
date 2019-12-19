<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    {!! $article->id !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    {!! $article->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    {!! $article->updated_at !!}
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name') ) !!}
    {!! $article->name !!}
</div>

<!-- Text Field -->
<div class="form-group">
    {!! Form::label('text', __('Text') ) !!}
    {!! $article->text !!}
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('Image') ) !!}
    {!! $article->image !!}
</div>

