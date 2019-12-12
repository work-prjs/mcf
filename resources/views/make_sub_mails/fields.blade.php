<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('makeSubMails.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name') ) !!}

    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', __('Subject') ) !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', __('Text') ) !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Mail Files Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_files', __('Mail Files') ) !!}
    {!! Form::file('mail_files') !!}
</div>
<div class="clearfix"></div>

<!-- Done Field -->
<div class="form-group col-sm-6">
    {!! Form::label('done', __('Done') ) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('done', 0) !!}
        {!! Form::checkbox('done', '1', null) !!}
    </label>
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', __('Comment') ) !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('makeSubMails.index') !!}" class="btn btn-default">Отмена</a>
</div>
