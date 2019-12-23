<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', __('Country')) !!}:
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', __('City')) !!}:
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Adr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adr', __('Address')) !!}:
    {!! Form::text('adr', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacts', __('Contacts')) !!}:
    {!! Form::text('contacts', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name')) !!}:
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('user_id', __('User')) !!}:
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>
 --}}
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactContractors.index') }}" class="btn btn-default">{{__('Cancel')}}</a>
</div>
