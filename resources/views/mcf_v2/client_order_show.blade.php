@extends('layouts.mcf_v2')


@section('content-header')

<style type="text/css">
.gradient-bg, .page-top-banner .overlay-bg, .banner-section .overlay-bg, .features-wrap .single-feature .overlay-bg {
    background: -moz-linear-gradient(0deg, #f00 0%, #691cff 100%);
    background: -webkit-linear-gradient(0deg, #f00 0%, #691cff 100%);
    background: -ms-linear-gradient(0deg, #f00 0%, #691cff 100%);
}

.page-top-banner {
  background: url(/about_us1.jpg);
  background-size: cover;
}

</style>


    <!-- Start page-top-banner section -->
    <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                  <h1>Ваш заказ №{{ $order->id }}. </h1>
                  <h4>Перечень позиций</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')

    <!-- Start contact section -->
    <section class="contact-section contact-page-section padding-top-120" id="contact-section">
        <div class="container">

            <div class="row justify-content-center form-row">
                <div class="col-lg-9">

                        @if (count($order->line_items) > 0)

                          @foreach ( $order->line_items as $line)

                            <div class="row">

                              <div class="col-xs-2 col-lg-2">
                                <img class="img-fluid" src="{{ $line->product->cat->image ?? "http://placehold.it/100x70" }}" style="">
                              </div>

                              <div class="col-xs-3 col-md-6 col-lg-6">
                                {{-- <h4 class="product-name"> --}}
                                  <strong>{{ $line->product->name ?? "" }}</strong>
                                {{-- </h4> --}}
                                    {{-- {{ $line->product->desc ?? "" }} --}}

                                @if (mb_strlen($line->product->desc)>140)
                                  {{ mb_substr($line->product->desc, 0, 140,'UTF-8') }}...
                                @else
                                  {{ $line->product->desc }}
                                @endif
                              </div>

                              <div class="col-xs-7 col-md-4 col-lg-4" style="text-align: left;">
                                <div class="col-xs-12 cart_id" >

                                  {{-- <h7> --}}
                                    {{ $line->product->price_amount ?? "" }} x {{ $line->qty ?? "" }} = {{ $line->qty*$line->product->price_amount }}

                                  {{-- cart_id --}}
                                </div>
                                {{-- <div class="col-xs-2"> --}}


                                    {{-- <a href="/remove" style="color: red;">X</a> --}}
                                {{-- </div> --}}
                              </div>
                            </div>
                            <hr>

                          @endforeach


                            {{-- <hr> --}}

                            <div class="panel-footer">
                              <div class="row text-center">
                                <div class="col-xs-12">
                                  <h4 class="text-right">Итого <strong id="cart_total">{{ $order->total() }}</strong></h4>
                                </div>
                              </div>
                              
                              <div class="row text-center">
                                  <div class="col-xs-12">
                                    {{-- <a href="/carts/{{$cart->id}}/clear" class="btn-danger btn-block" data-url="/carts/{{$cart->id}}/clear"> --}}
                                  </div>
                              </div>

                              </div>
                              
                            {{-- checkout_link --}}


                        @else

                          <div class="row" style="display: grid;">
                            <div class="col-xs-12 text-center">
                              Заказ пуст
                              <br>
                              <a href="/">На главную</a>
                            </div>
                          </div>
                          <hr>
                        @endif

                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->


@endsection

