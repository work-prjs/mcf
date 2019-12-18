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
.single-service {
    min-height: 19em;
}
</style>

    <!-- Start page-top-banner section -->
    <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                    <h1>Категории</h1>
                    <h4>Продукция нашего завода</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')


    <!-- Start service section -->
    <section class="service-section section-gap-full">
        <div class="container">
            <div class="row">

                @foreach($cats as $cat)

                  <div class="col-lg-4  col-md-6 pb-30">
                      <a href="/mcf_cat/{{ $cat->ident }}">
                        <div class="single-service text-center ccats" style="display: flex; align-items: center;">
                            <div class="text-center" style="margin: 0 auto; ">
                                <img src="{{ $cat->image }}" class="img-responsive responsive-img" style="max-width: 23em;    height: 100%;    width: 100%;">
                                <h4>{{ $cat->name }}</h4>
                            </div>
                            {{-- <i class="ti-user"></i> --}}

                            {{-- <p> --}}
                                {{-- {{ $cat->desc }} --}}
                            {{-- </p> --}}
                        </div>
                      </a>
                  </div>

                @endforeach



            </div>
        </div>
    </section>
    <!-- End service section -->

@endsection

