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
                    <h1>{{ __('Contacts') }} </h1>
                    <h4>{{__('Our details and contacts')}}</h4>
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
            <div class="row address-wrap justify-content-center">
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
                            <a href="email:mc.fank@mail.ru">mc.fank@mail.ru</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center form-row">
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