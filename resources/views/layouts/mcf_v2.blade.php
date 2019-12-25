<!DOCTYPE html>
<html lang="{{ session('locale') }}" class="no-js">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154894435-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-154894435-1');
    </script>
    <meta name="yandex-verification" content="83b65c06351bda90" />
    <meta name='wmail-verification' content='b9e6f88c7462291f23fc3ac29c7d0459' />
    <meta name="msvalidate.01" content="977219EBE1D7A5FB3AEFA5612288920F" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    {{-- <meta name="viewport" content="width=device-width, user-scalable=no" /> --}}

    <!-- Favicon-->
    {{-- <link rel="shortcut icon" href="img/fav.png"> --}}
    <!-- Author Meta -->
    <meta name="author" content="MCF Michael">
    <!-- Meta Description -->
    <meta name="description" content="Sound and Light instruments brand">
    <!-- Meta Keyword -->
    <meta name="keywords" content="Sound, Light, instruments, brand, mcf, scene, stadion, hall">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title> {{ __('mcf title')  }} </title>

    <meta name="google-site-verification" content="0B6_0Fv7C7oIM9VHjwv12xqMZ4tDsRbfx89eTytnAig" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet">
    <!--
CSS
============================================= -->

    {{-- <script type="text/javascript" src="/fontawesome-free-5.11.2-web/js/all.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="/mcf/css/font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="/mcf/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/fontawesome-free-5.11.2-web/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/mcf/css/themify-icons.css">
    <link rel="stylesheet" href="/mcf/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/mcf/css/style.css">
    <link rel="stylesheet" href="/mcf/css/responsive.css">

    <link rel="stylesheet" href="/mcf/css/animate.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
  

    <style type="text/css">

        /*#691cff*/


        /* ширина блока категорий в меню */
        .breakpoint-off .dopenav ul li .dropdown {
            width: 24em;
        }
        /* ширина блока категорий в sidebar (0) */
        .blog-lists-section .archive-widget ul li a {
            width: 80%;
        }        
        .nav-brand {
            text-align: center;
            border: 1px solid #f00000;
            padding: 6px;
            background: white;
        }

        #nav a:hover #qty_badge {
            background-color: red !important;
        }

        .primary-btn {
            background: #f00;
        }

        section.page-top-banner.section-gap-full.relative > div.container > div > div > h1, section.page-top-banner.section-gap-full.relative > div.container > div > div > h4 {
            color: white;
        }
        a.a_hover:hover {
            /*color: #691cff !important;*/
        }

        .blog-lists-section .tags-widget ul li a {
            font-size: 14px;
        }

        #nav a:hover {
            /*color: red;*/
            /*#nav > li:nth-child(7) > a*/
        }


        :not(.dope-sticky) #nav a {
            color: white;
            /*#nav > li:nth-child(7) > a*/
        }

        :not(.dope-sticky) #nav .cn-dropdown-item:hover a {
            color: black;
        }

        #nav a:hover {
            color: black;
            /*#nav > li:nth-child(7) > a*/
        }

        #nav .dropdown a {
            color: black;
            /*#nav > li:nth-child(7) > a*/
        }

        #nav .dropdown a:hover {
            color: #691cff !important;
            /*#nav > li:nth-child(7) > a*/
        }



        .dope-sticky #nav a {
            color: black;
        }

        .dope-sticky #nav a:hover {
            color: #691cff !important;
        }

        .dope-sticky a:hover {
            /*color: black !important;*/
        }

        #nav > li:hover {
            background-color: white;
            -webkit-box-shadow: 0px 3px 13px -4px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 3px 13px -4px rgba(0,0,0,0.75);
            box-shadow: 0px 3px 13px -4px rgba(0,0,0,0.75);

            /*border: 1px solid grey;*/
        }

        #nav > li:hover a {
            /*color: #691cff;*/
            /*border: 1px solid grey;*/
        }


        .dope-nav-container a {
            /*color: floralwhite;*/
        }

        #nav > li.cn-dropdown-item.has-down > ul > li > a {
            /*color: black;*/
        }

        /*breakpoint-off*/
        /*breakpoint-on*/

        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #691cff;
        }        

        .nav-pills .nav-link {
            color: brown;
        }

        .nav-pills a.nav-link:hover  {
            color: white;
            background-color: #691cff;
            opacity: 0.7;
        }

        .nav-pills a.nav-link:active, a.nav-link.active:hover  {
            color: white;
            background-color: #691cff;
            opacity: 1;
        }

        .brown {
            color: brown;
        }

        .vi {
            color: #691cff;
        }

        a.h_v:hover h5 {
            color: #691cff;
            /*opacity: .7;*/
        }

        .b_hover:hover {
            color: #691cff !important;
            opacity: .7;
        }

        .hover_red:hover i {
            color: red !important;
        }

        .to_cart2 {
            bottom: 1em;
            position: absolute;
            right: 1em;
            background-color: grey;
            border-color: grey;
            /*background-color: #691cff;*/
            /*border-color: #691cff*/
        }

        .to_cart3 {
            background-color: grey;
            border-color: grey;
            /*background-color: #691cff;*/
            /*border-color: #691cff*/
        }
        .card_s:hover {
            box-shadow: 0 0 40px grey;
        }
        .bold1 {
            font-weight: 800;
        }

        .ccats {
            min-height: 37em !important;
        }


        .bold-black {
            color: black;
            font-weight: 600;
        }


        .div {
            padding: 30px 0px;
            border-radius: 5px;
            background: #fff;
            margin-bottom: 40px;
        }

        .section-gap-full {
            padding: 1em 0 !important;
        }        

        /* chatra */
        .chatra--webkit {
            margin-right: 4em !important;
        }
    </style>

    @yield('css')


</head>

<body style="    overflow-x: hidden;">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Set languages')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form>
            <div class="form-group">

                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="?_lang=ru">
                            <img src="/22px-Flag_of_Russia.svg.png">
                            {{__('Russian')}}
                        </a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="?_lang=en">
                            <img src="/22px-Flag_of_the_United_States.svg.png">
                            {{__('English')}}
                        </a>
                    </li>
                </ul>
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! __('Close') !!}</button>
        <button type="button" class="btn btn-primary">{!! __('Save') !!}</button>
      </div>
    </div>
  </div>
</div>












    <!-- Preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <!-- Start header section -->
    <header class="header-area" id="header-area">
        <div class="dope-nav-container breakpoint-off">
            <div class="container">
                <div class="row">
                    <!-- dope Menu -->
                    <nav class="dope-navbar justify-content-between" id="dopeNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="/">
                            <img src="/logo1.png" alt="" style="max-width: 3em;">
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="dope-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>

                        <!-- Menu -->
                        <div class="dope-menu">

                            <!-- close btn -->
                            <div class="dopecloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>

                            <!-- Nav Start -->
                            <div class="dopenav">
                                <ul id="nav">
                                    <li>
                                        <a href="/">{!! __('Home') !!}</a>
                                    </li>
                                    <li>
                                        <a href="/mcf_cats">{!! __('Products') !!}</a>
                                        <ul class="dropdown">
                                        @foreach($cats as $cat)
                                            <li >
                                                <a class="a_hover" href="/mcf_cat/{{ $cat->ident }}">{{ $cat->name }}</a>
                                            </li>
                                        @endforeach                                            
                                        </ul>
                                    </li>

                                    {{-- НАБОРЫ --}}
                                    {{-- <li> --}}
                                        {{-- <a href="#">{!! __('Kits') !!}</a> --}}
                                    {{-- </li> --}}


{{--                                     <li>
                                        <a href="/mcf_about_us">{!! __('About us') !!}</a>
                                    </li>
 --}}                                    <li>
                                        <a href="/mcf_shops"> {!! __('Сontractors') !!}</a>
                                    </li>
                                    <li>
                                        <a href="/mcf_contact">{!! __('Contacts') !!}</a>
                                    </li>
                                    <li>
                                        <a href="/mcf_cart">
                                            <i class="fa fa-shopping-cart">
                                            </i>
                                            {{ __('Cart') }} <span id="qty_badge" class="badge badge-secondary" style="font-size:10px; top: -1px; position: relative;" data-cart_id={{ $cart->id }}></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                                            @if (session('locale')=='ru')
                                                <img src="/22px-Flag_of_Russia.svg.png">
                                            @else
                                                <img src="/22px-Flag_of_the_United_States.svg.png">
                                            @endif

                                            {{-- <i class="fa fa-flag"></i> --}}
                                            {{-- {!! __('Languages') !!} --}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/login">
                                            <i class="fa fa-user">
                                            </i>
                                        </a>
                                    </li>

{{--                                     <li>
                                        <a class="menu_creative_btn2" href="/cart/" style="color: #691cff;">
                                        </a>
                                    </li> --}}

                                </ul>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Start header section -->

    @yield('content-header')


    @yield('content')

    <!-- Start footer section -->
    <footer class="footer-section section-gap-half" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 footer-cols">

                        <a class="nav-brand" href="/" style="    padding: 10px 7px;">
                            <img src="/logo1_transparent.png" alt="" style="max-width: 4em;" class="img-responsive img-fluid">
                            

                        </a>

                    {{-- <a href="#">                        <img src="/logo1.png" alt="" style="max-width: 4em;">                    </a> --}}
                    <p class="copyright-text">&copy; 2019 MCF
                        {{-- <i class="fa fa-heart" aria-hidden="true"></i> от <br> --}}
                        {{-- <a href="mailto:mltefive@gmail.com" target="_blank">mltefive@gmail.com</a> --}}
                    </p>
                    <ul >
                        <li>
                            {{-- <img src="/logo3h.png" class="img-responsive img-fluid" style="max-width: 15em"> --}}
                            <img src="/pay_sberk1.png" class="img-responsive img-fluid" style="max-width: 15em">
                            {{-- <img src="/pay_sberk1.png" alt="" style="max-width: 4em;"> --}}
                        </li>
                    </ul>
                    
                </div>

                <div class="col-lg-3 col-sm-6 footer-cols">
                    <h4>{{__('Links')}}</h4>
                    <ul>
{{--                         <li><a href="/">Главная</a></li>
                        <li><a href="/mcf_products">Продукция</a></li>
                        <li><a href="/mcf_about_us">О бренде</a></li>
                        <li><a href="/mcf_service">Сервис</a></li>
                        <li><a href="/mcf_contact">Контакты</a></li> --}}


                                    <li>
                                        <a href="/mcf_articles">{{ __('Articles') }}</a>
                                    </li>
                                    <li>
                                        <a href="/mcf_media">{{ __('Media') }}</a>
                                    </li>
                                    <li>
                                        <a href="/mcf_docFiles">{{ __('Documents') }}</a>
                                    </li>


{{--                                     <li>
                                        <a href="/">Главная</a>
                                    </li>
                                    <li>
                                        <a href="/mcf_products">Продукция</a>
                                    </li> --}}
{{--                                     <li>
                                        <a href="/mcf_about_us">О нас</a>
                                    </li>
 --}}                                    {{-- <li> --}}
                                        {{-- <a href="/mcf_service">Сервис</a> --}}
                                    {{-- </li> --}}




                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 footer-cols">
                    <h4>{{__('Help')}}</h4>
                    <ul>
                        <li><a href="#"> {{ __('How make order') }}         </a></li>
                        <li> <a href="#">{{ __('Payment Rules') }}          </a></li>
                        <li> <a href="#">{{ __('Purchase returns') }}       </a></li>
                        <li> <a href="#">{{ __('Service cancellation') }}   </a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 footer-cols">
                    <h4>{{ __('Contacts')}}</h4>
                    <ul>
                        <li>
                            <a href="tel:+78002000023">+7‒800‒200‒00‒23</a>
                        </li>
                        <li>
                            <a href="email:mc.fank@mail.ru">mc.fank@mail.ru</a>
                        </li>
                        <li>
                            <a href="#">
                                {!! __('Contact adress') !!}
                            </a>
                        </li>
                    </ul>
                    <ul id="social">
                        <li>
                            <a target="_blank" href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="#">
                                <i class="fab fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="#">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer section -->

    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>

<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'JYCxAYg8ygd696tcx';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->

    <!--
JS
============================================= -->
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    <script src="/mcf/js/vendor/jquery-2.2.4.min.js"></script>
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
  
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    {{-- <script src="/mcf/js/vendor/popper.min.js"></script> --}}
    <script src="/mcf/js/jquery.easing.1.3.js"></script>
    {{-- <script src="/mcf/js/vendor/bootstrap.min.js"></script> --}}

    <script src="/mcf/js/jquery.parallax-scroll.js"></script>
    <script src="/mcf/js/dopeNav.js"></script>
    <script src="/mcf/js/owl.carousel.min.js"></script>
    <script src="/mcf/js/waypoints.min.js"></script>
    <script src="/mcf/js/jquery.stellar.min.js"></script>
    <script src="/mcf/js/jquery.counterup.min.js"></script>

    <script src="/mcf/js/main.js"></script>


    <script type="text/javascript">

    function qty_badge() {
        cart_id = $('#qty_badge').data('cart_id')
        $.ajax({
            url: '/carts/'+cart_id+'/total_qty',
            type: 'GET',
            success: function(result) {

              $('#qty_badge').text(result)
              // $('#qty_badge2').text(result)
              
            }
        });

    }

    $(document).ready(function (){
        setInterval(qty_badge, 2000);


          AOS.init();

    });

    </script>

    @yield('script')
</body>

</html>