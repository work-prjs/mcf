<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('productComments.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Комментарий:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Allowed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allowed', 'Разрешён:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('allowed', 0) !!}
        {!! Form::checkbox('allowed', '1', null) !!}
    </label>
</div>


{{-- <!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::select('product_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Session Field -->
<div class="form-group col-sm-6">
    {!! Form::label('session', 'Session:') !!}
    {!! Form::text('session', null, ['class' => 'form-control']) !!}
</div>
 --}}
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('productComments.index') !!}" class="btn btn-default">Отмена</a>
</div>
