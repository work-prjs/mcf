Заказ №: {!! $order->id !!}
-----------------------------------------------------------
Ссылка на заказ: http://127.0.0.1:8000/client_order_show/{!! $order->id !!}
-----------------------------------------------------------
@foreach($order->line_items as $line)
  Наименование: {!! $line->product->name !!}
  Всего: {{ $line->product->price_amount }} X {{ $line->qty }} = {{ $line->qty*$line->product->price_amount }} руб. 
@endforeach
@php
$itog = 0;
$status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];
$pay_places = ['Доставка курьером', 'Самовывоз', 'Почтой'];
$pay_types = ['Оплата на месте', 'Онлайн оплата Картой', 'Выставить счёт'];
@endphp
@foreach($order->line_items as $line)
@php
  $itog = $itog + $line->qty*$line->product->price_amount;
@endphp
@endforeach
-----------------------------------------------------------
Итого: {{ $itog }} =  руб.
-----------------------------------------------------------
Тип оплаты: {{ $pay_types[$order->pay_type] }}
Тип доставки: {{ $pay_places[$order->pay_place] }}
Куда: {{ $order->pay_adr }}
Кому: {{ $order->pay_contact }}
-----------------------------------------------------------
Комментарий:
{{ $order->comment }}
-----------------------------------------------------------
