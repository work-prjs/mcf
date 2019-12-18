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

</style>


    <!-- Start page-top-banner section -->
    <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                    <h1>Отзывы </h1>
                    <h4>что о нас говорят</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')

    <!-- Start contact section -->
    <section class="contact-section contact-page-section padding-top-120" >
        <div class="container">

            @foreach($chits as $chit)
                <div class="row justify-content-center card" style="    margin-bottom: 2em;">

                    <div class="col-lg-12 card-body">

                            <div class="col-lg-12">
                                {{ $chit->text }}
                            </div>
                            <div class="col-md-12" style="    text-align: right;">
                                {!! $chit->by_line !!}
                            </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End contact section -->


@endsection