<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('articles.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Code Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
        Редактор
    {!! Form::checkbox('CKEDITOR', '1', null) !!}
</div>




<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    @if (isset($article->image))
        <p><img class="img-responsive" src="{!! $article->image !!}"></p>
        {!! $article->image !!}
    @endif

    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('articles.index') !!}" class="btn btn-default">Отмена</a>
</div>


<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  var ch;

  $('input[name ="CKEDITOR"]').click(function(e){
    if (ch==true) {
        for(name in CKEDITOR.instances)
        {
            CKEDITOR.instances[name].destroy()
        }
        ch=false;
    } else {
        CKEDITOR.replace('text', options);
        ch=true;
    }

  })
</script>
