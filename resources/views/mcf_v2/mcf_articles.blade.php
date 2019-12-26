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
                    <h1>{!! __('Articles') !!}</h1>
                    {{-- <h4>{!! __('Сontractors contact information') !!}</h4> --}}
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


                    <table class="table table-hover">
                        <thead>
                            <th>{!! __('Name') !!}</th>
                            {{-- <th>{!! __('File') !!}</th> --}}
                        </thead>
                        <tbody>
                            @foreach (\App\Models\Article::all() as $mcf_doc)
                            <tr>
                                <td>
                                    <a href="/articles/{{ $mcf_doc->id }}">
                                        {{ $mcf_doc->name }}
                                    </a>
                                </td>
                                {{-- <td> --}}
                                        {{-- {{ basename($mcf_doc->doc_file) }} --}}
                                {{-- </td> --}}
                                {{-- <td>{{ $mcf_shop->file }} --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->


@endsection