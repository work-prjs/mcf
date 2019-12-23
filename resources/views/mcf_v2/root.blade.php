@extends('layouts.mcf_v2')


@section('content-header')

<style type="text/css">
.gradient-bg, .page-top-banner .overlay-bg, .banner-section .overlay-bg, .features-wrap .single-feature .overlay-bg {
    background: -moz-linear-gradient(0deg, #f00 0%, #691cff 100%);
    background: -webkit-linear-gradient(0deg, #f00 0%, #691cff 100%);
    background: -ms-linear-gradient(0deg, #f00 0%, #691cff 100%);
}

.page-top-banner {
  background: url(/bg3.jpg);
  background-size: cover;
}
a.bestsellers:hover {
    color: #691cff !important;
}
</style>


    <!-- Start page-top-banner section -->
    <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                    <h1>MCF</h1>
                    <h4>{{__('Sound and lighting equipment factory')}}</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')

    <!-- End about-top-banner section -->

    <section class="screenshot-section section-gap-full" style="    padding: 4em 0 !important;">
        <div class="container">
            <div class="section-title">
                <h2 class="text-center">{{__('Bestsellers')}}</h2>
            </div>
            <div class="row">
                <div class="screenshot_slider owl-carousel" id="screenshot-carusel">

                    @foreach(\App\Models\Product::where(['menu'=>true])->take(5)->limit(5)->get() as $cat)

                        <div class="item">
                            <img src="{{ $cat->image }}" alt="" title="{{ $cat->name }}">
                            <div style="text-align: center;">
                                <a href="/mcf_products/{{ $cat->ident }}" style="color: grey;" class="bestsellers">{{ $cat->name }}</a>
                            </div>

                        </div>

                    @endforeach


                </div>
            </div>
        </div>
    </section>



    <section class="service-section section-gap-full" style="    padding-top: 5em !important;">
        <div class="container">
            <div class="section-title">
                <h2 class="text-center">{{__('Categories')}}</h2>
            </div>

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

    <!-- Start about section -->
    <section class="about-section section-gap-full relative" id="about-section" style="    padding: 4em 0 !important;">
        <div class="container" data-aos="fade-up-right">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 about-left">
                    <img class="img-fluid" src="/led.png" alt="">
                </div>
                <div class="col-lg-5 col-md-5 about-right">
                    {{-- <h3>Завод MCF</h3> --}}
                    <h1>{{__('Who are we')}}</h1>
                    <p>
                        {!! __('We have been working since 2002. Own production of sound and lighting equipment. Working with us, you work without intermediaries.') !!}
                    </p>
                    <a class="primary-btn" href="/mcf_cats">{{__('To shop')}}</a>
                </div>
            </div>
        </div>
        <div class="floating-shapes">
            <span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'>
                <img src="/mcf/img/shape/fl-shape-1.png" alt="">
            </span>
            <span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'>
                <img src="/mcf/img/shape/fl-shape-2.png" alt="">
            </span>
            <span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'>
                <img src="/mcf/img/shape/fl-shape-3.png" alt="">
            </span>
            <span data-parallax='{"x": -20, "y": 180}'>
                <img src="/mcf/img/shape/fl-shape-4.png" alt="">
            </span>
            <span data-parallax='{"x": 300, "y": 70}'>
                <img src="/mcf/img/shape/fl-shape-5.png" alt="">
            </span>
            <span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'>
                <img src="/mcf/img/shape/fl-shape-6.png" alt="">
            </span>
            <span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'>
                <img src="/mcf/img/shape/fl-shape-7.png" alt="">
            </span>
            <span data-parallax='{"x": 60, "y": -100}'>
                <img src="/mcf/img/shape/fl-shape-9.png" alt="">
            </span>
            <span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'>
                <img src="/mcf/img/shape/fl-shape-10.png" alt="">
            </span>
        </div>
    </section>
    <!-- End about section -->
    <!-- Start feature section -->
{{--     <section class="feature-section section-gap-full" id="feature-section">
        <div class="container">
            <div class="row align-items-center feature-wrap">
                <div class="col-lg-4 header-left " data-aos="fade-right" >

                    <h1 style="font-size: 3em;">
                        Уникальное предложение для каждого проекта.
                    </h1>
                    <a class="primary-btn" href="#contact-section">Заказать расчёт
                        <span class="ti-arrow-right"></span>
                    </a>
                </div>
                <div class="col-lg-8" data-aos="fade-left" >
                    <div class="row features-wrap">
                        <div class="col-md-6">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <span class="ti-palette"></span>
                                <h3>Настоящий бренд</h3>
                                <p>
                                    Мы предоставляем только качественное оборудование.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <span class="ti-heart"></span>
                                <h3>Сделано с любовью</h3>
                                <p>
                                    У нас ручная сборка и проверка качества продукта на каждом этапе.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <span class="ti-loop"></span>
                                <h3>Сервисвное обслуживание</h3>
                                <p>
                                    Вся продукция подлежит гарантии не менее 1 года. Не забывайте использовать качественную коммутацию.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <span class="ti-headphone-alt"></span>
                                <h3>Оперативный ответ</h3>
                                <p>
                                    Вы можете всегда позвонить нам для получения консультации. Контакты в меню сверху или снизу страницы.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 --}}    <!-- End feature section -->

    <!-- Start stat section -->
    <section class="stat-section section-gap-half" data-aos="flip-down" style=" margin-top: 4em !important;" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-thumb-up"></i>
                        <h1>
                            <span class="counter">56</span>+</h1>
                        <h4>
                            {{__('Projects done')}}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-face-smile"></i>
                        <h1>
                            <span class="counter">106</span>+</h1>
                        <h4>{{__('Happy clients')}}</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-paint-bucket"></i>
                        <h1>
                            <span class="counter">432</span>+</h1>
                        <h4>{{__('Products')}}</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-check-box"></i>
                        <h1>
                            <span class="counter">23</span>+</h1>
                        <h4>{{__('Contractors')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End stat section -->



    <section class="feature-section section-gap-full" id="feature-section" style="    padding: 4em 0 !important;">
        <div class="container">
            <div class="row align-items-center feature-wrap">
                <div class="col-lg-4 header-left " data-aos="fade-right" >

                    <h1 style="font-size: 3em;">
                        {{__('Become a factory representative')}}
                    </h1>
                    <a class="primary-btn" href="#contact-section">{{__('Send request')}}
                        <span class="ti-arrow-right"></span>
                    </a>
                </div>
                <div class="col-lg-8" data-aos="fade-left" >
                    <div class="row features-wrap">
                        <div class="col-md-6">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                {{-- <span class="ti-palette"></span> --}}
                                <span class="ti-headphone-alt"></span>
                                <h3>{{__("Let's Conclude an agency agreement")}} </h3>
                                <p>
                                    {{__('Get a representative discount')}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <span class="ti-heart"></span>
                                <h3>{{__('Made with love')}}</h3>
                                <p>
                                    {{__('Expand your store’s product range with factory products')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (\App\Models\MediaFile::take(4)->get()->count()>0)
    <section class="portfolio-section section-gap-full" style=" padding-top: 4em !important;">
        <div class="container">
            <div class="section-title" data-aos="zoom-in-down" >
                <h2 class="text-center">{{__('Last works')}}</h2>
                <p class="text-center">{{__('Supply and installation of equipment')}}</p>
            </div>
            <div class="row justify-content-center" data-aos="zoom-in-up" >
                      @foreach (\App\Models\MediaFile::take(4)->get() as $line )
                        <div class="col-lg-6 cl">
                            <div class="single-portfolio">
                                <img class="img-fluid" src="{{ $line->image ?? '/mcf/img/portfolio1.jpg' }}" alt="">
                                <div class="box-content">
                                    <a href="{{ $line->image ?? '/mcf/img/portfolio1.jpg' }}">
                                        <h5 class="title">{{ $line->name }}</h5>
                                    </a>
                                    <span class="post">{{ $line->desc ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                      @endforeach

            </div>
        </div>
        <div class="floating-shapes">
            <span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'>
                <img src="/mcf/img/shape/fl-shape-1.png" alt="">
            </span>
            <span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'>
                <img src="/mcf/img/shape/fl-shape-2.png" alt="">
            </span>
            <span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'>
                <img src="/mcf/img/shape/fl-shape-3.png" alt="">
            </span>
            <span data-parallax='{"x": -20, "y": 180}'>
                <img src="/mcf/img/shape/fl-shape-4.png" alt="">
            </span>
            <span data-parallax='{"x": 300, "y": 70}'>
                <img src="/mcf/img/shape/fl-shape-5.png" alt="">
            </span>
            <span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'>
                <img src="/mcf/img/shape/fl-shape-6.png" alt="">
            </span>
            <span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'>
                <img src="/mcf/img/shape/fl-shape-7.png" alt="">
            </span>
            <span data-parallax='{"x": 60, "y": -100}'>
                <img src="/mcf/img/shape/fl-shape-9.png" alt="">
            </span>
            <span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'>
                <img src="/mcf/img/shape/fl-shape-10.png" alt="">
            </span>
        </div>        
    </section>
    @endif

    <!-- Start team section -->
    <section class="team-section section-gap-full" style="    padding: 4em 0 !important;">
        <div class="container">
            <div class="section-title" data-aos="zoom-in-down"  data-aos-duration="1500">
                <h2 class="text-center">{!! __('Our team') !!}</h2>

                <p class="text-center">{!! __("Let's get acquainted") !!}</p>
            </div>
            <div class="row" data-aos="zoom-in-up"  data-aos-duration="1500">
                <div class="team-carusel  owl-carousel" id="team-carusel">
                    <div class="single-team item">
                        <img class="img-fluid" src="/8_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Елена<br>(Контрактный управляющий)</h4>
                            <ul>
                                <li>
                                    <a href="tel:+79145763770" class="hover_red">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:mc-fank@mail.ru" class="hover_red">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/7_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Павел<br>(Руководитель завода)</h4>
                            <ul>
                                <li>
                                    <a href="tel:+79098134343" class="hover_red">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:mcfzavod@gmail.com" class="hover_red">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/9_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Матвей<br>(IT Специалист)</h4>
                            <ul>
                                <li>
                                    <a href="tel:+79248415521" class="hover_red">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:mcfzavod@gmail.com" class="hover_red">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/11_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Владимир <br> (Юридический отдел)</h4>
                            <ul>
                                <li>
                                    <a href="tel:+79298303570" class="hover_red">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:mcfzavod@gmail.com" class="hover_red">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/12_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Галина<br>(Старший менеджер по работе с клиентами)</h4>
                            <ul>
                                <li>
                                    <a href="tel:+79244427027" class="hover_red">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:mc.fank@mail.ru" class="hover_red">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
{{--                     <div class="single-team item">
                        <img class="img-fluid" src="/13_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Владимир</h4>
                        </div>
                    </div> --}}
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End team section -->

    <!-- Start testimonial section -->
    <section class="testimonial-section section-gap-full" id="testimonial-section" style="    padding-top: 5em !important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 testimonial-left"  data-aos-duration="1500" data-aos="fade-right">
                    <h2>{!! __('What people say') !!}</h2>
                    <p>
                        {!! __('If you are already our customer, please leave a review. We will be grateful for your feedback.') !!}
                    </p>
                    <a class="primary-btn" href="/show_chits">{!! __('Chits') !!}
                        <span class="ti-arrow-right"></span>
                    </a>
                </div>
                <div class="col-lg-8 testimonial-right" data-aos="fade-left"  data-aos-duration="1500">
                    <div class="testimonial-carusel  owl-carousel" id="testimonial-carusel">

                        @foreach($chits as $chit)

                            <div class="single-testimonial item">
                                <p>
                                      @if (mb_strlen($chit->text)>440)
                                        {{ mb_substr($chit->text, 0, 440,'UTF-8') }}...
                                      @else
                                        {{ $chit->text }}
                                      @endif                                    
                                </p>
                                <div class="user-details d-flex flex-row align-items-center">
                                    <div class="img-wrap">
                                        {{-- <img src="/mcf/img/avatar1.jpg" alt=""> --}}
                                    </div>
                                    <div class="details">
                                        {!! $chit->by_line !!}
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial section -->

    <!-- Start contact section -->
    <section class="contact-section " id="contact-section" style="padding-top: 6em;">
        <div class="container">
            <div class="section-title" data-aos="zoom-in-up"  data-aos-duration="1500">
                <h2 class="text-center">{!! __('Contacts') !!}</h2>
                <p class="text-center">{{__('Call us or send message')}}</p>
            </div>

            <div class="row address-wrap justify-content-center" data-aos="zoom-in-up"  data-aos-duration="1500">
                <div class="col-lg-3 col-md-4 col-sm-6 single-address-col">
                    <div class="div">
                        <i class="ti ti-mobile"></i>
                        <p>
                            <a href="tel:+7‒800‒200‒00‒23">+7‒800‒200‒00‒23</a>
                            <br>
                            <a href="tel:+7–914–553–48–18">+7–914–553–48–18</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 single-address-col">
                    <div class="div">
                        <i class="ti ti-map-alt"></i>
                        <p>
                            {!! __('Contact adress') !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 single-address-col">
                    <div class="div">
                        <i class="ti ti-email"></i>
                        <p>
                            <a href="mailto:mc.fank@mail.ru">mc.fank@mail.ru</a>
                            <br> 
                            <a href="mailto:mcfzavod@gmail.com">mcfzavod@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center form-row" data-aos="zoom-in-up"  data-aos-duration="1500" >
                <div class="col-lg-9">

                    <form id="contact-form2" action="/contact_us" method="get" >
                        @csrf
                        <div class="row contact-form-wrap justify-content-center">
                            <div class="col-md-6 contact-email form-col">
                                <input type="hidden" name="spam_check" value="0" id="spam_check">
                                <input type="text" name="your-contact" value="" size="40" class="form-control"  placeholder="{!! __('E-mail or Phone') !!}*"
                                    onfocus="this.placeholder=''" onblur="this.placeholder='{!! __('Contact') !!}*'" required="required">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="your-message" id="comment" class="form-control" rows="8" placeholder="{!! __('Message') !!}"
                                    onfocus="this.placeholder=''" onblur="this.placeholder='{!! __('Message') !!}*'" required="required"></textarea>
                            </div>
                            <input type="submit" class="primary-btn btn" value="{!! __('Submit') !!}" id="submit-message" >
                            <div id="msg" class="message"></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->



@endsection

@section('script')

    <script type="text/javascript">
         $('#contact-form2').on('submit', function(e) {
             $('#spam_check').val(1);
         });
    </script>

@endsection