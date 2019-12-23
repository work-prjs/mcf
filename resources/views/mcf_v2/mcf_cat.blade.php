@extends('layouts.mcf_v2')

@section('content-header')

<style type="text/css">
.gradient-bg, .page-top-banner .overlay-bg, .banner-section .overlay-bg, .features-wrap .single-feature .overlay-bg {
    background: -moz-linear-gradient(0deg, #f00 0%, #691cff 100%);
    background: -webkit-linear-gradient(0deg, #f00 0%, #691cff 100%);
    background: -ms-linear-gradient(0deg, #f00 0%, #691cff 100%);
}

.page-top-banner {
  background: url(/bg14.jpg);
  background-size: cover;
}

.service-section .single-service {
    min-height: 27em;
}
</style>

    <!-- Start page-top-banner section -->
    <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                    <h1>{{__('Categories')}}</h1>
                    {{-- <h4>Продукция нашего завода</h4> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')


    <!-- Start blog-lists section -->

    <section class="blog-lists-section section-gap-full ">
        <div class="container" style="    padding-top: 2em;">
            <div class="row">
                <div class="col-lg-4">
                    @include('mcf_v2.mcf_sidebar')
                </div>
                <div class="col-lg-8">


                <!-- Start service section -->
                <section class="service-section section-gap-full" style="    padding-top: 0em !important;">
                    <div class="container">

                        <div class="row single-widget ">
                                <div class="col-md-12 ">
                                    <span class="brown">{{__('Category')}}:</span>
                                    <span><h2>{{ $cat2->name }}</h2></span>
                                </div>
                        </div>

                        <div class="row ">
                                <div class="col-md-12 pb-3">
                                    <div class="pull-right">
                                        {{-- <span class="">Список</span> --}}
                                        <a href="#" id="card_list"><i class="fa fa-2x fa-th-list b_hover" aria-hidden="true" style="color: grey;"></i></a>
                                        <a href="#" id="card_card"><i class="fa fa-2x fa-th-large b_hover " aria-hidden="true" style="color: #691cff;"></i></a>

                                        {{-- <span>Блоки</span> --}}
                                    </div>
                                </div>
                        </div>

                            <div class="row">
                            {{-- @foreach($cats as $cat) --}}
                            @php
                                $idx=0;
                            @endphp
                            {{-- @foreach($cat2->products as $product) --}}
                            @foreach($prds as $product)
                            
                                    @if (isset($product))

                                        @php
                                            $idx=$idx+1;
                                        @endphp

                                        @if ($idx<16)
                                          {{-- <div class="bg-white rounded shadow mb-5 col-lg-3  col-md-4"> --}}
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 pb-3"> 
                                            {{-- <div class="col-12 pb-3">  --}}
                                                
                                            <div class="card card_s" style=" min-height: 17em;">
                                              <div class="card-body">
                                              
                                                {{-- <div class=" text-center" style="background-color: white;"> --}}
                                                    <div class="text-center " style="    padding-bottom: 1em;">
                                                      {{-- <img src="{{ $cat2->image }}" class="img-fluid" style="max-height: 10em; max-width: 8em;"> --}}
                                                      <img src="{{ $cat2->image }}" class="img-fluid" style="">
                                                    </div>
                                                    {{-- <i class="ti-user"></i> --}}

                                                    <a href="/mcf_products/{{ $product->ident }}" class="h_v">
                                                        <h5>{{ $product->name ?? '??' }}</h5>
                                                    </a>
                                                    <hr>
                                                    <a href="" data-ident="{{ $product->ident }}" class="btn to_cart3 btn-success to_cart pull-right" >
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                        {{ $product->price_amount ?? '??' }} руб.
                                                    </a>
                                                    {{-- <button class="card-link text-red to_cart btn-sm btn" data-ident="{{ $product->ident }}" >В корзину</button> --}}
                                                </div>
                                              </div>
                                              </div>
                                                    

                                                {{-- </div> --}}
                                              {{-- </a> --}}
                                          {{-- </div> --}}

                                        @else 
{{-- 
                                          <div class="col-lg-4  col-md-6 pb-30" style="display: none;">
                                                <div class=" text-center" style="background-color: white;">
                                                    <div class="text-center">
                                                      <img src="{{ $cat2->image }}" class="img-responsive responsive-img" style="max-height: 10em; max-width: 10em;">
                                                    </div>
                                                    

                                                    <h4>{{ $product->name ?? '??' }}</h4>
                                                    <p>
                                                        {{ $product->price_amount ?? '??' }} руб.
                                                    </p>

                                                    <button class="card-link text-red to_cart btn-sm btn" data-ident="{{ $product->ident }}" >
                                                        В корзину
                                                    </button>
                                                    

                                                </div>
                                          </div> --}}

                                        @endif
                                    @endif

                            @endforeach

                                <div class="col-lg-12  col-md-12 center text-center">
                                    <button class="btn " style="    background: #691cff; opacity: .4; color: white;">ЕЩЁ...</button>
                                </div>    
                        </div>
                    </div>
                </section>
                <!-- End service section -->

                </div>

            </div>
        </div>
    </section>
    <!-- End blog-lists section -->


@endsection


@section('script')
<script type="text/javascript">

$(document).ready(function (){

    $('.to_cart').click(function(e){
        // let this0=this
        e.preventDefault();
        // doBounce($(this), 1, '13px', 300);
        $(this).addClass('animated tada')
        var this0=this
        $.get("/product/"+$(this).data('ident')+"/to_cart/1");

        setTimeout(function(){
          $(this0).removeClass('animated tada')
        }, 1500);

    })

});
  
</script>
      
@endsection