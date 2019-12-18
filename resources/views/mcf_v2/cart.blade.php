@extends('layouts.mcf_v2')


@section('css')
  <style type="text/css">
    .one_line_in {
    width: 3em !important;
    text-align: center;
    font-size: 1em;
    padding: 0;
    margin: 0px -1px;
    height: 36px;                                        
    }
    .one_line {
    display: inline-block !important;
    }

    h7, h6 {
    width: 4em;
    display: inline-block;

    }
    h7 {
    text-align: right;
    }
    h6 {
    text-align: left;
    }
  </style>

  <style type="text/css">
    body.page #pagetitle {
    background-image: url(/slider-bg4.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-color: #111111;
    color: #ffffff;
    }


    div.radio label input {
        margin-top: 10px !important;
    }


  </style>

@endsection

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
                    <h1>Корзина</h1>
                    <h4>Оформление заказа</h4>
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

                        @if (count($cart->line_items) > 0)

                          @foreach ( $cart->line_items as $line)

                            <div class="row">

                              <div class="col-xs-2 col-lg-2">
                                <img class="img-fluid" src="{{ $line->product->cat->image ?? "http://placehold.it/100x70" }}" style="">
                              </div>

                              <div class="col-xs-3 col-md-6 col-lg-6">
                                {{-- <h4 class="product-name"> --}}
                                  <strong>{{ $line->product->name ?? "" }}</strong>
                                {{-- </h4> --}}
                                    {{-- {{ $line->product->desc ?? "" }} --}}

                                @if (mb_strlen($line->product->desc)>140)
                                  {{ mb_substr($line->product->desc, 0, 140,'UTF-8') }}...
                                @else
                                  {{ $line->product->desc }}
                                @endif
                              </div>

                              <div class="col-xs-7 col-md-4 col-lg-4" style="text-align: left;">
                                <div class="col-xs-12 cart_id" >

                                  {{-- <h7> --}}
                                    {{ $line->product->price_amount ?? "" }} X
                                  {{-- </h7> --}}

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: red; border: 1px solid grey; padding: 6px 9px;" data-type="minus" >-</span>
                                  <input type="text" min="1" max="1000" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}" data-line_id="{{ $line->id }}" style="max-width: 3em;">

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: green; border: 1px solid grey; padding: 6px;" data-type="plus" >+</span>

                                  <b> <span class="one_line sh6">={{ $line->qty*$line->product->price_amount }}</span> </b>

                                  {!! Form::open(['route' => ['lineItems.destroy', $line->id], 'method' => 'delete','class'=>"position",'style'=>"position: absolute;display: contents;"]) !!}

                                  {!! Form::button('X', ['type' => 'submit', 'class' => 'destroy_button btn-sm btn', 'style'=>'background-color: white;color: red;right: 0em;position: absolute;margin-top: 4px;padding: 3px;', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                                  {!! Form::close() !!}

                                  {{-- cart_id --}}
                                </div>
                                {{-- <div class="col-xs-2"> --}}


                                    {{-- <a href="/remove" style="color: red;">X</a> --}}
                                {{-- </div> --}}
                              </div>
                            </div>
                            <hr>

                          @endforeach



    <div id="myModal2" class="modal fade ">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Онлайн оплата</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h3>Модуль онлайн оплаты в тестовом режиме</h3>
                    <iframe src="https://demo.paykeeper.ru/form/" style="width:100%; height: 600px;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    {{-- <button type="button" class="btn btn-primary">Сохранить изменения</button> --}}
                </div>
            </div>
        </div>
    </div>



    <div id="myModalInvoice" class="modal fade ">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Счет на оплату</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h3>Счет на оплату в разработке</h3>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    {{-- <button type="button" class="btn btn-primary">Сохранить изменения</button> --}}
                </div>
            </div>
        </div>
    </div>



                          <form id="form_id" action="/carts/{{$cart->id}}/checkout">
                            <div class="row">

                              <div class="col-md-6" style="text-align: left;">

                                <b class="bold-black">Метод оплаты</b>


                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" id="optionsRadios2" value="0" required>
                                    Оплата на месте
                                  </label>
                                  <a href="/mcf_contact" target="_blank">Пункты получения продукта</a>
                                </div> 
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" id="optionsRadios3" value="1" class="pay_type_online" required>
                                    Онлайн оплата Картой
                                  </label>
                                </div>


                                <div class="radio">
                                 <label>
                                    <input type="radio" name="pay_type" id="optionsRadios1" value="2" class="pay_type_invoice" required>
                                    Выставить счёт
                                  </label>
                                </div>


                              </div>

                              <div class="col-md-6" style="text-align: left;">
                                <b class="bold-black">Место получения Продукта</b>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_place" id="optionsRadios4" value="0" required>
                                    Доставка курьером
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_place" id="optionsRadios5" value="1" required>
                                    Самовывоз
                                  </label>
                                </div>
                              </div>


                              <div class="col-md-6" style="text-align: left;">
                                <b class="bold-black">Контактный номер (<span style="color: red;">обязательно*</span>)</b>
                                <div class="form-group">

                                  <div class="input-group">
                                    {{-- <span class="input-group-addon">
                                      <i class="fa fa-phone"></i>            
                                    </span> --}}
                                      <input type="text" name="contact_number" id="contact_number" value="" placeholder="11 цифр: +7(999)-888-77-77" class="form-control" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6" style="text-align: left;">
                                <b class="bold-black">Email (не обязательно)</b>
                                <div class="form-group">

                                  <div class="input-group">
                                    {{-- <span class="input-group-addon">
                                      <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span> --}}
                                      <input type="text" name="contact_email" id="contact_email" value="" placeholder="Ваша электронная почта" class="form-control" >
                                  </div>
                                </div>
                              </div>

                                
                              <div class="col-md-12" style="text-align: left;">
                                <b class="bold-black">Адрес/Место/Примечание</b>
                                <textarea name="pay_adr" style="width: 100%;" rows="5" placeholder="Укажите адрес: Населенный пункт, улица, номер дома, офис и примечания"></textarea>
                              </div>

                              {{-- <div class="col-md-12" style="text-align: left;">
                                <b>Контакты</b>
                                <textarea name="contact_number" style="width: 100%;" rows="5" placeholder="Укажите контакты для связи: телефон, смс, почта, WhatsApp"></textarea>
                              </div> --}}

                            </div>

                            <hr>

                            <div class="panel-footer">
                              <div class="row text-center">
                                <div class="col-xs-12">
                                  <h4 class="text-right">Итого <strong id="cart_total">{{ $cart->total() }}</strong></h4>
                                </div>
                              </div>
                              
                              <div class="row text-center">
                                  <div class="col-xs-12">
  {{--                                   <a href="/carts/{{$cart->id}}/checkout" class="btn-success btn-block" id="checkout_link">
                                      Оплатить
                                    </a> --}}
                                    {{-- <a href="#" class="btn-success btn-block btn-sm" id="checkout_link" data-link="/carts/{{$cart->id}}/checkout">
                                      Оплатить
                                    </a> --}}
                                    <button type="submit" value="Оплатить" class="btn btn-success" id="checkout_link" style="background-color: #691cff; border-color: #691cff">
                                    Оплатить
                                  </button>
                                    {{-- <a href="/carts/{{$cart->id}}/clear" class="btn-danger btn-block" data-url="/carts/{{$cart->id}}/clear"> --}}
                                    <a href="/carts/{{$cart->id}}/clear" class="btn-danger btn" data-url="/carts/{{$cart->id}}/clear" id="clear_btn">
                                      Очистить корзину
                                    </a>
                                  </div>
                                  </div>

                              </div>
                              
                          </form>
                            {{-- checkout_link --}}


                        @else

                          <div class="row" style="display: grid;">
                            <div class="col-xs-12 text-center">
                              Корзина пуста
                              <br>
                              <a href="/">На главную</a>
                            </div>
                          </div>
                          <hr>
                        @endif

                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->


@endsection

@section('script')
  <script type="text/javascript" src="/js/jquery.inputmask.min.js"></script>

  <script type="text/javascript">

  // очистка корзины
  $('#clear_btn').click(function(e){
    e.preventDeafult;
    $.ajax({
        url: $(this).data('url'),
        type: 'GET',
        success: function(result) {
          window.location='/mcf_cart'
        }
    });
  });

  // при нажатии на одну из кнопок + или - делаем следующее
    $('span.btn-number').click(function(e){
      // определяем кнопку по типу minus или plus
        type      = $(this).attr('data-type');
        // console.log(type)

        // TODO выбрать КНОПКИ только свой ряд +

        // поле с количеством линии продукта
        var input = $(this).parent().find('input');
        // текущее значение количество
        var currentVal = parseInt(input.val());
        // номер линии
        var line_id = $(this).parent().find('input').data('line_id');
        // итого сумма линии
        var total = $(this).parent().find('.sh6');
        // cart_id = $('#cart_id').data('cart_id')

        // взять номер карзины из бейджа
        cart_id = $('#qty_badge').data('cart_id')

        // console.log(currentVal)

        // $('#cart_total').text(result)
        // total.text('='+result)
        // $('#qty_badge').text(result)

        // если текущее значение количества 
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                
                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();

                    // TODO изменить итого
                    $.ajax({
                        url: '/qty_minus/'+line_id,
                        type: 'GET',  // user.destroy
                        success: function(result) {

                          $.ajax({
                              url: '/carts/'+cart_id+'/total_qty',
                              type: 'GET',
                              success: function(result) {
                                $('#qty_badge').text(result)
                              }
                          });

                          $.ajax({
                              url: '/lineItems/total/'+line_id,
                              type: 'GET',  // user.destroy
                              success: function(result) {
                                  total.text('='+result)
                              }
                          });

                          $.ajax({
                              url: '/carts/'+cart_id+'/total',
                              type: 'GET',
                              success: function(result) {
                                  $('#cart_total').text(result)
                              }
                          });

                        }
                    });

                }

                if(parseInt(input.val()) == input.attr('min')) {
                    // TODO style disabled
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();

                    $.ajax({
                        url: '/qty_plus/'+line_id,
                        type: 'GET',  // user.destroy
                        success: function(result) {

                          $.ajax({
                              url: '/carts/'+cart_id+'/total_qty',
                              type: 'GET',
                              success: function(result) {
                                $('#qty_badge').text(result)
                              }
                          });


                          $.ajax({
                              url: '/lineItems/total/'+line_id,
                              type: 'GET',  // user.destroy
                              success: function(result) {
                                  total.text('='+result)
                              }
                          });

                          $.ajax({
                              url: '/carts/'+cart_id+'/total',
                              type: 'GET',
                              success: function(result) {
                                  $('#cart_total').text(result)
                              }
                          });
                            
                        }
                    });            }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

  // отменяеть выбор текста мышкой - сделано чтобы не выбирался текст при двойном нажатии
    // jQuery('.cart_id').mousedown(function(e){ e.preventDefault(); });

  // кнопка оплаты
    // $('#checkout_link').click(function(e) {

    //   e.preventDefault();

    //   uurl=$(this).data('link')

    //   // сериализуем форму и 
    //   // переходим по ссылке data-link="/carts/$cart->id/checkout?+$('#form_id').serialize()"
    //   window.location=uurl+'?'+$('#form_id').serialize()

    //     // $.ajax({
    //     //     url: uurl+'?'+$('#form_id').serialize(),
    //     //     type: 'GET',  // user.destroy
    //     //     success: function(result) {
    //     //         // total.text('='+result)
    //     //         // console.log()
    //     //         window.location="/thanks"
    //     //     }
    //     // });
    // })



// $("input.my_place").click(function(e) {

//   console.log( $(this).val() )

//   if ($(this).val()==0) {
//     $(".stol_div").show()
//     $(".hotel_number_div").hide()
//     $(".contact_adr").hide()
//   }
//   if ($(this).val()==1) {
//     $(".stol_div").hide()
//     $(".hotel_number_div").show()
//     $(".contact_adr").hide()

//   }
//   if ($(this).val()==2) {
//     $(".stol_div").hide()
//     $(".hotel_number_div").hide()
//     $(".contact_adr").show()
//   }

//     // class will be removed if checked="checked"
//     // otherwise will be added
//     $(this).toggleClass("terms_error", !this.checked);
// }).change(); // set initial state





    $("input.pay_type_online").click(function(e) {
        $("#myModal2").modal('show')
        // https://demo.paykeeper.ru/payments/payments
    }); // 

    $("input.pay_type_invoice").click(function(e) {
        $("#myModalInvoice").modal('show')
        // https://demo.paykeeper.ru/payments/payments
    }); // 



    $(document).ready(function(){
      // $(selector).inputmask("99-9999999");  //static mask
      $('#contact_number').inputmask({"mask": "+9(999) 999-99-99"}); //specifying options
      // $(selector).inputmask("9-a{1,3}9{1,3}"); //mask with dynamic syntax
    });

  </script>

@endsection
