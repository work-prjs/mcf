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
    <section class="contact-section contact-page-section padding-top-120" id="contact-section">
        <div class="container">
            <div class="row justify-content-center form-row">
                <div class="col-lg-9">


            {{-- <div class="col-lg-8"> --}}
                    <div class="blog-details">
                        <div class="post-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/blog/p3.jpg" alt="">
                        </div>
                        <div class="post-details">
{{--                             <ul class="tags">
                                <li><a href="#">Learn</a></li>
                                <li><a href="#">Dream</a></li>
                            </ul> --}}
                            <a href="single-blog.html">
                                <h1>Awesome Design His many legs, pitifully thin compared with.</h1>
                            </a>
                            <p>
                                Received shutters expenses ye he pleasant. Drift as blind above at up. No up simple
                                county stairs do should praise as. Drawings sir gay together landlord had law
                                smallest. Formerly welcomed attended declared met say unlocked. Jennings outlived
                                no dwelling denoting in peculiar as he believed. Behaviour excellent middleton be
                                as it curiosity departure ourselves.
                            </p>
                            <p>
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt
                                mollitia animi, id est laborum et dolorum fuga.
                            </p>
                            <blockquote class="blockquote">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod teminc ididunt ut labore et dolore.Lorem ipsum
                                    dolor sit amet.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod temporSed ut perspiciatis unde omnis natus error sit voluptatem accusantium
                                    doloremque laudantium.</p>
                            </blockquote>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt.

                                On the other hand, we denounce with righteous indignation and dislike men who are so
                                beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire,
                                that they cannot foresee the pain and trouble that are bound to ensue; and equal blame
                                belongs to those who fail in their duty through weakness
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