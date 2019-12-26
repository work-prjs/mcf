<!-- Id Field -->
{{-- <div class="form-group">
    {!! Form::label('id', __('Id') ) !!}
    <p>{!! $product->ident !!}</p>
</div> --}}
<!-- Ident Field -->
<div class="form-group">
    {!! Form::label('ident', __('Ident') ) !!}
    <p>{!! $product->ident !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At') ) !!}
    <p>{!! $product->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At') ) !!}
    <p>{!! $product->updated_at !!}</p>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name') ) !!}
    <p>{!! $product->name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc') ) !!}
    <p>{!! $product->desc !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('Image') ) !!}
    <p>
        <img class="img-responsive" src="{{ $product->image ?? "http://placehold.it/100x70" }}">
        {!! $product->image !!}
    </p>
</div>

<div class="form-group">
    {!! Form::label('gal', __('Gal') ) !!}
        {{-- <pre> --}}
        {{-- {{ dd(json_decode($product->gal))  }} --}}
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



        {{-- <img class="img-responsive" src="{{ $product->image ?? "http://placehold.it/100x70" }}"> --}}
        {{-- {!! $product->image !!} --}}
</div>

<!-- Xml Name Field -->
<div class="form-group">
    {!! Form::label('xml_name', __('Xml Name') ) !!}
    <p>{!! $product->xml_name !!}</p>
</div>

<!-- Xml Cat Field -->
<div class="form-group">
    {!! Form::label('xml_cat', __('Xml Cat') ) !!}
    <p>{!! $product->xml_cat !!}</p>
</div>

<!-- Cat Id Field -->
<div class="form-group">
    {!! Form::label('cat_id', __('Cat Id') ) !!}
    <p>
        {!! $product->cat_id !!}
        <a href="/cats/{{ $product->cat_id }}"> {!! \App\Models\Cat::where('ident', $product->cat_id)->first()->name !!} </a>
    </p>
</div>

<!-- Price Amount Field -->
<div class="form-group">
    {!! Form::label('price_amount', __('Price Amount') ) !!}
    <p>{!! $product->price_amount !!}</p>
</div>

<!-- Menu Field -->
<div class="form-group">
    {!! Form::label('menu', __('Menu') ) !!}
    <p>{!! var_dump($product->menu) !!}</p>
</div>

