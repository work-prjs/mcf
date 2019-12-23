<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('docFiles.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Designation')) !!}:
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc') ) !!}:
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Doc File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doc_file', __('File') ) !!}:
    @if (isset($docFile->image))
        <p><img class="img-responsive" src="{!! $docFile->image !!}"></p>
        {!! $docFile->image !!}
    @endif

    {!! Form::file('doc_file') !!}
</div>
<div class="clearfix"></div>

<!-- Doc File Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doc_file_type', __('Type') ) !!}:
    {!! Form::text('doc_file_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('docFiles.index') !!}" class="btn btn-default">Отмена</a>
</div>
