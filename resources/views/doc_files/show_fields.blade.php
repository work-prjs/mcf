<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    {!! $docFile->id !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    {!! $docFile->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    {!! $docFile->updated_at !!}
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name') ) !!}
    {!! $docFile->name !!}
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc') ) !!}
    {!! $docFile->desc !!}
</div>

<!-- Doc File Field -->
<div class="form-group">
    {!! Form::label('doc_file', __('Doc File') ) !!}
    {!! $docFile->doc_file !!}
</div>

<!-- Doc File Type Field -->
<div class="form-group">
    {!! Form::label('doc_file_type', __('Doc File Type') ) !!}
    {!! $docFile->doc_file_type !!}
</div>

