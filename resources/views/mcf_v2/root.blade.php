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

</style>


    <!-- Start page-top-banner section -->
    <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                    <h1>MCF</h1>
                    <h4>бренд завода по производству звукового и светового оборудования</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')

    <!-- End about-top-banner section -->

    <!-- Start about section -->
    <section class="about-section section-gap-full relative" id="about-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 about-left">
                    <img class="img-fluid" src="/led.png" alt="">
                </div>
                <div class="col-lg-5 col-md-5 about-right">
                    <h3>Завод MCF</h3>
                    <h1>Все что Вам нужно знать о нас</h1>
                    <p>
                        Работаем с 2002 года. Сообдственное производство звукового и светового оборудования.
                        Работая с нами Вы работает без посредников.
                    </p>
                    <a class="primary-btn" href="#">Контакты</a>
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
    <section class="feature-section section-gap-full" id="feature-section">
        <div class="container">
            <div class="row align-items-center feature-wrap">
                <div class="col-lg-4 header-left">
                    <h1 style="font-size: 3em;">
                        Уникальное предложение для каждого проекта.
                    </h1>
                    <a class="primary-btn" href="#">Заказать расчёт
                        <span class="ti-arrow-right"></span>
                    </a>
                </div>
                <div class="col-lg-8">
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
    <!-- End feature section -->

    <!-- Start stat section -->
    <section class="stat-section section-gap-half">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-thumb-up"></i>
                        <h1>
                            <span class="counter">56</span>+</h1>
                        <h4>Проектов сделано</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-face-smile"></i>
                        <h1>
                            <span class="counter">106</span>+</h1>
                        <h4>Счатливых клиента</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-paint-bucket"></i>
                        <h1>
                            <span class="counter">14320</span>+</h1>
                        <h4>Общая мощность</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-stat">
                        <i class="ti-check-box"></i>
                        <h1>
                            <span class="counter">123</span>+</h1>
                        <h4>Наши партнеры</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End stat section -->

    <!-- Start team section -->
    <section class="team-section section-gap-full">
        <div class="container">
            <div class="section-title">
                <h2 class="text-center">Наша команда</h2>
                <p class="text-center">А вот и Мы! Знакомьтесь.</p>
            </div>
            <div class="row">
                <div class="team-carusel  owl-carousel" id="team-carusel">
                    <div class="single-team item">
                        <img class="img-fluid" src="/8_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Елена</h4>
{{--                             <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/7_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Павел</h4>
                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/9_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Матвей</h4>
                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/10_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Анастасия</h4>
                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/11_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Михаил</h4>
                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/12_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Галина</h4>
                        </div>
                    </div>
                    <div class="single-team item">
                        <img class="img-fluid" src="/13_cr.jpg" alt="">
                        <div class="team-content">
                            <h4>Владимир</h4>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End team section -->

    <!-- Start testimonial section -->
    <section class="testimonial-section section-gap-full" id="testimonial-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 testimonial-left">
                    <h2>Что о нас гворят</h2>
                    <p>
                        Если Вы уже являетесь нашим клиентом, то оставьте пожалуйста отзыв. Мы будем Вам благодарны за обратную связь.
                    </p>
                    <a class="primary-btn" href="/show_chits">Отзывы
                        <span class="ti-arrow-right"></span>
                    </a>
                </div>
                <div class="col-lg-8 testimonial-right">
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
@endsection