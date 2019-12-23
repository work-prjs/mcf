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
                    <h1>{{__('Product')}}</h1>
                    {{-- <h4> нашего завода</h4> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

@endsection


@section('content')


    <!-- Start blog-lists section -->
    <section class="blog-lists-section section-gap-full">
        <div class="container" style="    padding-top: 2em;">

            <div class="row">
                <div class="col-lg-4">
                    @include('mcf_v2.mcf_sidebar')
                </div>
                <div class="col-lg-8">

                <!-- Start service section -->
                <section class="service-section section-gap-full" style="    padding-top: 0em !important;">
                    <div class="container">
                        <div class="row single-widget ">
                                <div class="col-md-12   ">
                                    <span class="brown">{{__('Model')}}:</span>
                                    <span><h2>{{ $product->name }}</h2></span>
                                            
                                </div>
                        </div>

                        <div class="row single-widget ">
                              <div class="col-md-7 ">
                                <img src="{{ $product->image }}" class="img-fluid"  />
                              </div>
                              <div class="col-md-5 " >
                                    <div class="row">
                                                @foreach ( [0,1,2,3,4,5] as $line)
                                                        <img src="{{ $product->image }}" class="img-fluid"  style="    width: 100%; height: 100%; max-width: 5em;"/>
                                                @endforeach
                                    </div>
                              </div>

                        </div>

                        <div class="row single-widget ">
                                <div class="col-md-12  ">
                                    <div class="row ">
                                        <div class="col-md-12 col-xs-12">
                                            <span class="brown">
                                                {{__('Price')}}:
                                            </span>

                                        </div>
                                        <div class="col-md-12 col-xs-12">

                                            <h3><strong><b>{{ $product->price_amount }}</b></strong> руб. <span class="pull-right"><a data-ident="{{ $product->ident }}" href="" class="btn to_cart btn-success" style="background-color: #691cff; border-color: #691cff"> <i class="fa fa-cart-plus" aria-hidden="true"></i> {{__('To cart')}}</a></span> </h3>

                                            <span >
                                            </span>
                                        </div>
                                    </div>

                                </div>
                        </div>


                        <div class="row single-widget ">
                                <div class="col-md-12 ">



                                    <!-- Rounded tabs -->
                                    <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                                      <li class="nav-item flex-sm-fill">
                                        <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">{{__('Description')}}</a>
                                      </li>
                                      <li class="nav-item flex-sm-fill">
                                        <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">{{__('Specifications')}}</a>
                                      </li>
                                      <li class="nav-item flex-sm-fill">
                                        <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">{{__('Documents')}}</a>
                                      </li>
                                    </ul>

                                    <div id="myTabContent" class="tab-content">
                                        <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                                            {{ $product->desc }}
                                        </div>
                                        <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                                                    @php
                                                        // if (!empty($product->attrs)) {
                                                            # code...
                                                            $a1 = explode("\n", $product->attrs);
                                                        // } else {
                                                        //     $a1 = [0];
                                                        // }
                                                    @endphp

                                                    @if (!empty($product->attrs))
                                                    <table class="table table-hover">
                                                        <thead class="thead-light">
                                                            <th>{{__('Designation')}}</th>
                                                            <th>{{__('Value')}}</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ( $a1 as $line)
                                                                @php
                                                                    $a2 = explode(":", $line);
                                                                @endphp
                                                                <tr>
                                                                    <td><strong>{{ $a2[0] ?? '' }}:</strong></td>
                                                                    <td>{{ $a2[1] ?? ''}}</td>
                                                                </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>

                                                    @endif                                                 

                                        </div>

                                      <div id="contact" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                                        <table class="table table-hover">

                                            <thead class="thead-light">
                                                <th>{{__('File')}}</th>
                                                <th>{{__('Download')}}</th>
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
{{--                                       <div id="comments" role="tabpanel" aria-labelledby="comments-tab" class="tab-pane fade px-4 py-5">
                                        <p class="text-muted"> Список комментариев.</p>
                                      </div> --}}
                                    </div>


                                </div>
                        </div>                        
                        

                        <div class="row single-widget ">
                              <div class="col-md-12">
                                  <h3 class="color-black">{{__('Comments')}}:</h3>
                              </div>
                        </div>

                        @foreach ( $comments as $line)
                            <div class="row single-widget ">
                                  <div class="col-md-3">
                                      <div class="row">
                                          <b class="bold1">{{__('Text')}}:</b>
                                      </div>
                                      <div class="row">
                                          {{-- <b class="bold1">Пользователь: </b>Гость --}}
                                      </div>
                                  </div>
                                  <div class="col-md-9" style="    white-space: pre-line;">
                                    {{ $line->text }}
                                  </div>
                            </div>
                        @endforeach


                        <div class="row single-widget" id="comment_block">
                              <div class="col-md-3">
                                  <div class="row">
                                  <b class="bold1">{{__('Text')}}:</b>
                                  </div>
                                  <div class="row">
                                  {{-- Гость --}}
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  
                                  <div class="row">
                                    <textarea style="width: 100%" rows="6" id="comment_body"></textarea>
                                  </div>
                                  <hr>
                                  <div class="row pull-right">
                                    <a class="btn to_comment btn-success" data-product_id="{{ $product->ident }}" style="color: white; background-color: #691cff; border-color: #691cff"> <i class="fa fa-pencil" aria-hidden="true"></i> {{__('Write')}}</a>
                                  </div>

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

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $('.to_cart').click(function(e){
        // let this0=this
        e.preventDefault();
        // doBounce($(this), 1, '13px', 300);
        $(this).addClass('animated tada')
        var this0=this
        $.get("/product/"+$(this).data('ident')+"/to_cart/1");

        setTimeout(function(){
          $(this0).removeClass('animated tada')
        }, 1500);

    })

    $('.to_comment').click(function(e){
        e.preventDefault();
        $(this).addClass('animated tada')
        var this1=this
        var token = $("meta[name='csrf-token']").attr("content")
        var this1 = this

        var product_id = $(this).data('product_id')
        var comment_body = $('#comment_body').val()

        $.get("/post_comment?product_id="+product_id+"&text="+comment_body);


        setTimeout(function(){
          $(this1).removeClass('animated tada')
          window.location=location
        }, 1000);

    })

    

});
  
</script>
      
@endsection