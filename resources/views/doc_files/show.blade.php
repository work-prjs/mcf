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

.service-section .single-service {
    min-height: 27em;
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


    <section class="blog-lists-section section-gap-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="single-widget search-widget">
                            <h4 class="widget-title">{{ __('Search')}}</h4>
                            <div class="sidebar-form">
                                <form action="#" class="relative">
                                    <input type="text" placeholder="{{ __('Search here')}}" onfocus="this.placeholder=''" onblur="this.placeholder='{{ __('Search here')}}'">
                                    <button type="submit">
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="single-widget archive-widget">
                            <h4 class="widget-title">Категории</h4>
                            <ul>

                            @foreach($cats as $cat1)
                                <li class="d-flex justify-content-between">
                                    <a href="/mcf_cat/{{ $cat1->ident }}">{{ $cat1->name }}</a>
                                    <span>
                                        (
                                            {{ count($cat1->products) }}
                                        )
                                    </span>
                                </li>
                            @endforeach
                            </ul>
                        </div>


                        <div class="single-widget recent-post-widget">
                            <h4 class="widget-title">Последние предложения</h4>
                            <ul>
                                <li class="d-flex flex-row align-items-center">
                                    <div class="thumbs">
                                        <img class="img-fluid" src="/mcf/img/blog/small-t1.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="single-blog.html">
                                            <h5>Комплект для бара.</h5>
                                        </a>
                                        <p class="text-uppercase">
                                            Ноябрь 22, 2019
                                        </p>
                                    </div>
                                </li>

                                <li class="d-flex flex-row align-items-center">
                                    <div class="thumbs">
                                        <img class="img-fluid" src="/mcf/img/blog/small-t4.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="single-blog.html">
                                            <h5>Стойки на все случаи жизни.</h5>
                                        </a>
                                        <p class="text-uppercase">
                                            Ноябрь 23, 2019
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="single-widget social-widget">
                            <h4 class="widget-title">{{ __('Social Links') }}</h4>
                            <ul>
                                <li>
                                    <a target="_blank" href="#">
                                        {{-- <i class="fa fa-facebook"></i> --}}
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
                        <div class="single-widget banner-widget">
                            <img class="img-fluid" src="/bg4.jpg" alt="">
                        </div>
                        <div class="single-widget tags-widget">
                            <h4 class="widget-title">{{ __('Tags') }}</h4>
                            <ul>
                                <li><a href="#">Звук</a></li>
                                <li><a href="#">Свет</a></li>
                                <li><a href="#">Пульты</a></li>
                                <li><a href="#">Динамики</a></li>
                                <li><a href="#">Коммутация</a></li>
                                <li><a href="#">Статьи</a></li>
                                <li><a href="#">Музыка</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                <!-- Start service section -->
                <section class="service-section section-gap-full" style="padding-top: 0em;">
                    <div class="container">
                        <div class="row single-widget ">
                                <div class="col-md-12 pb-30  ">
                                    <span class="brown">Название:</span>
                                    <span><h2>{{ $doc_file->name }}</h2></span>
                                            
                                </div>
                        </div>

                        <div class="row single-widget ">
                              <div class="col-md-7 pb-30  ">
                                <img src="{{ $doc_file->image }}" class="" style="max-width: 23em;    height: 100%;    width: 100%;" />
                              </div>
                              <div class="col-md-5 " >
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <span class="brown"><b>Галерея:</b></span>

                                        </div>
                                    </div>
                              </div>

                        </div>

                        <div class="row single-widget ">
                                <div class="col-md-12 pb-30  ">
                                    <div class="row ">
                                        <div class="col-md-12 col-xs-12">
                                            <span class="brown">
                                                Цена: 
                                            </span>

                                        </div>
                                        <div class="col-md-12 col-xs-12">

                                            <h3><strong><b>{{ $doc_file->price }}</b></strong> руб. <span class="pull-right"><a href="" class="btn to_cart btn-success" style="background-color: #691cff; border-color: #691cff"> <i class="fa fa-cart-plus" aria-hidden="true"></i> В корзину</a></span> </h3>

                                            <span >
                                            </span>
                                        </div>
                                    </div>

                                </div>
                        </div>


                        <div class="row single-widget ">
                                <div class="col-md-12 pb-30  ">



    <!-- Rounded tabs -->
    <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
      <li class="nav-item flex-sm-fill">
        <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Описание</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Характеристики</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Документы</a>
      </li>

{{--       <li class="nav-item flex-sm-fill">
        <a id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Комментарии</a>
      </li>
 --}}
    </ul>

    <div id="myTabContent" class="tab-content">
      <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
        {{ $doc_file->desc }}
      </div>
      <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                                @php
                                    $a1 = explode("\n", $doc_file->attrs);
                                @endphp

                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <th>Название</th>
                                        <th>Значение</th>
                                    </thead>
                                    <tbody>
                                        @foreach ( $a1 as $line)
                                            @php
                                                $a2 = explode(":", $line);
                                            @endphp
                                            <tr>
                                                <td><strong>{{ $a2[0] }}:</strong></td>
                                                <td>{{ $a2[1] }}</td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
      </div>
      <div id="contact" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
        <table class="table table-hover">

            <thead class="thead-light">
                <th>Название</th>
                <th>Скачать</th>
            </thead>
            <tbody>
                @php
                    $a2 = ['Паспорт', 'Руководство пользователя', 'Сертификат'];
                @endphp
                @foreach ( $a2 as $line)
                    <tr>
                        <td>{{ $line }}</td>
                        <td>{{ $line }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>

      </div>
      <div id="comments" role="tabpanel" aria-labelledby="comments-tab" class="tab-pane fade px-4 py-5">
        <p class="text-muted"> Список комментариев.</p>
      </div>
    </div>

{{-- 
                                    @php
                                        $a1 = ['Описание', 'Характеристики', 'Документы'];
                                        $ntab=0;
                                    @endphp
                                <ul class="nav nav-tabs" id="" role="tablist">
                                    @foreach ( $a1 as $line)
                                        @php
                                            $ntab = $ntab+1;
                                        @endphp
                                      <li class="nav-item">
                                        <a class="nav-link " id="t{{ $ntab }}" data-toggle="tab" href="#t{{ $ntab }}" role="tab" aria-controls="tab{{ $ntab }}" aria-selected="true">{!! $line !!}</a>
                                      </li>
                                    @endforeach
                                </ul> --}}
{{-- 
                                    @foreach ( $a1 as $line)
                                        @php
                                                $ntab = $ntab+1;
                                        @endphp
                                            <div class="tab-pane fade show " id="home" role="tabpanel" aria-labelledby="tab">{{ $line }}</div>
                                    @endforeach --}}


                                </div>
                        </div>                        
                        

                        {{-- <div class="p-5 bg-white rounded shadow mb-5"> --}}
                        {{-- </div> --}}
                        <div class="row single-widget ">
                              <div class="col-md-12">
                                  <h3 class="color-black">Коментарии:</h3>
                              </div>
                        </div>

                        <div class="row single-widget ">
                              <div class="col-md-3">
                                  <div class="row">
                                  Фото    
                                  </div>
                                  <div class="row">
                                  Гость
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  

                                  <div class="row">
                                    <textarea style="width: 100%" rows="6"></textarea>
                                  </div>
                                  <hr>
                                  <div class="row pull-right">
                                    <a href="" class="btn coment btn-success" style="background-color: #691cff; border-color: #691cff"> <i class="fa fa-pencil" aria-hidden="true"></i> Написать</a>
                                  </div>

                              </div>
                        </div>


                        <div class="row single-widget ">
                              <div class="col-md-3">
                                  <div class="row">
                                  Фото    
                                  </div>
                                  <div class="row">
                                  Гость
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  Text
                              </div>
                        </div>



                    </div>
                </section>


                </div>

            </div>
        </div>
    </section>
    <!-- End blog-lists section -->


@endsection


@section('script')
<script type="text/javascript">

$(document).ready(function (){

});
  
</script>
      
@endsection