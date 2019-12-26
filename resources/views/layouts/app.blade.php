<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    {{-- <link rel="stylesheet" href="/lte3/dist/css/adminlte.min.css"> --}}
    


    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons" />


    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Админка') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- CSS file -->
    <script src="/js/blueimp-gallery.min.js"></script>
    <link rel="stylesheet" href="/css/blueimp-gallery.min.css" />
    {{-- <link rel="stylesheet" href="https://cafe-maxim.ru/photoswipe/photoswipe.css">  --}}
    {{-- <link rel="stylesheet" href="https://cafe-maxim.ru/photoswipe/default-skin/default-skin.css">  --}}

    
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    @yield('css')

<style>
  .menu_check {
    cursor: pointer;
  }
  /* TODO по просьбе отключаю границы */
  label.checkbox-inline {
    border: none;
  }


            @media (max-width: 1199px) {
            }

            @media (max-width: 991px) {
            }

            @media (max-width: 767px) {
                .one_line_in {
                    width: 1em !important;
                    font-size: 1em;
                    height: 24px !important;
                }
            }

            @media (max-width: 479px) {
                .one_line_in {
                    width: 1em !important;
                    font-size: 1em;
                    height: 24px !important;
                }
            }
</style>

</head>

<body class="skin-blue sidebar-mini">










    <div id="blueimp-gallery" class="blueimp-gallery">
      <div class="slides">
      </div>
      <h3 class="title"></h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
      <a class="play-pause"></a>
      <ol class="indicator"></ol>
    </div>








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

@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>MC</b>F</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Управление</b>MCF</span>

            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ __('Toggle navigation') }}</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#exampleModal">
                                {{-- {!! __('Languages') !!} --}}
                                @if (session('locale')=='ru')
                                    <img src="/22px-Flag_of_Russia.svg.png">
                                @else
                                    <img src="/22px-Flag_of_the_United_States.svg.png">
                                @endif
                                {{-- {{ session('locale') }} --}}
                            </a>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->

                                {{-- <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg" --}}
                                <img src="/lte1/dist/img/user2-160x160.jpg"
                                     class="user-image" alt="" />
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/lte1/dist/img/user2-160x160.jpg"
                                         class="img-circle" alt=""/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        {{-- <small>Участник с  {!! Auth::user()->created_at->format('M. Y') !!}</small> --}}
                                        <small>Участник с  {!! Auth::user()->created_at->diffForHumans() !!}</small>
                                        
                                        {{-- <small>{{ $session_id ?? '$session_id' }}</small> --}}
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/users/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Профиль</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content-header')

            @yield('content')

        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2019 <a href="#">ADMIN</a>.</strong> Все права соблюденены.
        </footer>

    </div>
@else

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">{{ __('Toggle navigation') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    Главная
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    {{-- <li><a href="{!! url('/home') !!}">Домашняя</a></li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">{{ __('Login') }}</a></li>
                    <li><a href="{!! url('/register') !!}">{{ __('Register') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {{-- qwe --}}
                    {{-- @yield('content') --}}
                    Необходима авторизация
                </div>
            </div>
        </div>
    </div>
@endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
    {{-- <script src="/lte3/dist/js/adminlte.min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <!-- FastClick -->
    <script src="/lte1/bower_components/fastclick/lib/fastclick.js"></script>

    <!-- AdminLTE for demo purposes -->
    {{-- <script src="/lte1/dist/js/demo.js"></script> --}}



    <script src="{{ asset('js/bootstrap-notify.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pnotify@4.0.0/dist/PNotifyBrightTheme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/nonblockjs@1/NonBlock.es5.js" type="text/javascript"></script>
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pnotify@4.0.0/dist/iife/PNotify.min.js"></script> --}}
    {{-- https://cdn.jsdelivr.net/npm/pnotify@4.0.0/dist/umd/ --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pnotify@4.0.0/dist/umd/PNotify.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pnotify@4.0.0/dist/umd/PNotifyButtons.js"></script>

    <script type="text/javascript" src="/js/masonry.pkgd.min.js"></script>

    {{-- <script src="https://cafe-maxim.ru/js/vendor/jquery-1.9.1.min.js"></script> --}}

    <!-- Core JS file -->
    {{-- <script src="https://cafe-maxim.ru/photoswipe/photoswipe.js"></script>  --}}
    <!-- UI JS file -->
    {{-- <script src="https://cafe-maxim.ru/photoswipe/photoswipe-ui-default.min.js"></script>  --}}


    <script type="text/javascript">
        
        {{-- PNotify.defaults.styling = 'bootstrap3'; // Bootstrap version 3 --}}
        // PNotify.defaults.icons = 'bootstrap3'; // glyphicons
        // PNotify.defaults.icons = 'fontawesome4'; // Font Awesome 4
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('scripts')
    {{-- @stack('after_scripts') --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


</body>
</html>
