<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Отмена</a>
</div>

<!-- Ident Field -->
<div class="form-group col-sm-2">
    {!! Form::label('ident', 'ID:') !!}
    {!! Form::text('ident', null, ['class' => 'form-control']) !!}
</div>

<!-- Menu Field -->
<div class="form-group col-sm-2">
    {!! Form::label('menu', 'В меню:') !!}
    <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('menu', 0) !!}
        {!! Form::checkbox('menu', '1', null) !!}
    </label>
</div>

<div class="form-group col-sm-2">
    {!! Form::label('position', 'Порядок в списке:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>



<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!-- Image Field -->
<div class="form-group col-sm-4">
    {!! Form::label('image', 'Фото:') !!}
    <img class="img-responsive" src="{{ $product->image ?? 'http://placehold.it/100x70' }}">
    {{ $product->image ?? "http://placehold.it/100x70" }}
    {!! Form::file('image') !!}
</div>


<!-- Image Field -->
<div class="form-group col-sm-8">
    {!! Form::label('gal', 'Фотки:') !!}
    {{-- <img class="img-responsive" src="{{ $product->image ?? 'http://placehold.it/100x70' }}"> --}}
    {{-- {{ $product->image ?? "http://placehold.it/100x70" }} --}}
    {{-- {!! Form::file('gal', null, ['multiple'=>'multiple']) !!} --}}
    <input type="file" name="gal[]" multiple>

              <div id="links">

                <a href="{{ $product->image }}">
                  <span>
                    <img src="{{ $product->image }}" style="max-width: 10em;" />
                  </span>
                </a>

                @if (!empty($product->gal))
                @foreach ( json_decode($product->gal) as $line)
            {{-- {{$line}} --}}
                {{-- <img src="{{ $line }}" class="img-fluid img-responsive"  style="width: 100%; height: 100%; max-width: 5em;"/> --}}
                    <a href="{{ $line }}">
                      <span>
                        <img src="{{ $line }}" style="max-width: 10em;" />
                      </span>
                    </a>
                @endforeach
                @endif
        {{-- </pre> --}}
              </div>

              <script>
                document.getElementById('links').onclick = function(event) {
                  event = event || window.event
                  var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = { index: link, event: event },
                    links = this.getElementsByTagName('a')
                  blueimp.Gallery(links, options)
                }
              </script>


</div>

{{-- <div class="clearfix"></div> --}}

<!-- Xml Name Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('xml_name', 'Xml Имя:') !!}
    {!! Form::text('xml_name', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Xml Cat Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('xml_cat', 'Xml Категория:') !!}
    {!! Form::text('xml_cat', null, ['class' => 'form-control']) !!}
</div>
 --}}
<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_id', 'Категория:') !!}
    {{-- {!! Form::text('cat_id', null, ['class' => 'form-control']) !!} --}}
    {!!  Form::select('cat_id', App\Models\Cat::all()->pluck('name', 'ident')->prepend('Корневая категория', '0'), null, ['class' => 'form-control']) !!}

</div>

<!-- Price Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_amount', 'Цена:') !!}
    {!! Form::text('price_amount', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('new', 'Новинка:') !!}
    <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('new', 0) !!}
        {!! Form::checkbox('new', '1', null) !!}
    </label>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('hit', 'Хит:') !!}
    <label class="checkbox-inline form-control" style="    text-align: center;">
        {!! Form::hidden('hit', 0) !!}
        {!! Form::checkbox('hit', '1', null) !!}
    </label>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', 'Описание:') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('attrs', 'Характеристики:') !!}
    {!! Form::textarea('attrs', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Отмена</a>
</div>
