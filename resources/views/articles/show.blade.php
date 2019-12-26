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
                    <h1>{!! __('Article') !!}</h1>
                    {{-- <h4>{!! __('Сontractors contact information') !!}</h4> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')

    <!-- Start contact section -->
    {{-- <section class="contact-section contact-page-section padding-top-120" id="contact-section"> --}}
    <section class=" padding-top-120" id="contact-section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">


            {{-- <div class="col-lg-8"> --}}
                    <div class="blog-details">
                        {{-- <div class="post-thumb relative"> --}}
                            {{-- <div class="overlay overlay-bg"></div> --}}
                            {{-- <img class="img-fluid" src="{{ $article->image ?? '/triangles-1430105_1280.png' }}" alt=""> --}}
                        {{-- </div> --}}
                        <div class="post-details">
{{--                             <ul class="tags">
                                <li><a href="#">Learn</a></li>
                                <li><a href="#">Dream</a></li>
                            </ul> --}}
                            <a href="single-blog.html">
                                <h1>{{$article->name}}</h1>
                            </a>
                            <p>
                                {!! $article->text !!}
                            </p>
                        </div>
                    </div>

                {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->


@endsection