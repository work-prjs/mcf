<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('chits.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Текст:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- By Line Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('by_line', 'Подпись:') !!}
    {!! Form::textarea('by_line', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Активен:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('chits.index') !!}" class="btn btn-default">Отмена</a>
</div>
