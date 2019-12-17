<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    {!! $productComment->id !!}
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    {!! $productComment->created_at !!}
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    {!! $productComment->updated_at !!}
</div>

<!-- Text Field -->
<div class="form-group">
    {!! Form::label('text', __('Text') ) !!}
    {!! $productComment->text !!}
</div>

<!-- Allowed Field -->
<div class="form-group">
    {!! Form::label('allowed', __('Allowed') ) !!}
    {!! $productComment->allowed !!}
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', __('Product Id') ) !!}
    {!! $productComment->product_id !!}
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('User Id') ) !!}
    {!! $productComment->user_id !!}
</div>

<!-- Session Field -->
<div class="form-group">
    {!! Form::label('session', __('Session') ) !!}
    {!! $productComment->session !!}
</div>

