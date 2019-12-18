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
                  <h1>Медиа контент</h1>
                  <h4>Документы, благодарности, сертификаты, новинки</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')

   <!-- Start portfolio section -->
    <section class="portfolio-section section-gap-full">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 cl">
                            <div class="single-portfolio">
                                <img class="img-fluid" src="/mcf/img/portfolio1.jpg" alt="">
                                <div class="box-content">
                                    <a href="single-portfolio.html">
                                        <h5 class="title">Project Title</h5>
                                    </a>
                                    <span class="post">Product</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 cl">
                            <div class="single-portfolio">
                                <img class="img-fluid" src="/mcf/img/portfolio2.jpg" alt="">
                                <div class="box-content">
                                    <a href="single-portfolio.html">
                                        <h5 class="title">Project Title</h5>
                                    </a>
                                    <span class="post">Product</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-portfolio">
                                <img class="img-fluid" src="/mcf/img/portfolio3.jpg" alt="">
                                <div class="box-content">
                                    <a href="single-portfolio.html">
                                        <h5 class="title">Project Title</h5>
                                    </a>
                                    <span class="post">Product</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-portfolio">
                                <img class="img-fluid" src="/mcf/img/portfolio4.jpg" alt="">
                                <div class="box-content">
                                    <a href="single-portfolio.html">
                                        <h5 class="title">Project Title</h5>
                                    </a>
                                    <span class="post">Product</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-portfolio">
                                <img class="img-fluid" src="/mcf/img/portfolio5.jpg" alt="">
                                <div class="box-content">
                                    <a href="single-portfolio.html">
                                        <h5 class="title">Project Title</h5>
                                    </a>
                                    <span class="post">Product</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

@endsection

