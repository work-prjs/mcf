

@if (Auth::user()->role_type==0)

    <li class="{{ Request::is('carts*') ? 'active' : '' }}">
        <a href="{!! route('carts.index') !!}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Корзины</span></a>
    </li>

    <li class="{{ Request::is('lineItems*') ? 'active' : '' }}">
        <a href="{!! route('lineItems.index') !!}"><i class="fa fa-cart-plus" aria-hidden="true"></i><span>Позиции</span></a>
    </li>



    {{-- <li class="{{ Request::is('roles*') ? 'active' : '' }}">
        <a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Роли</span></a>
    </li>

    <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
        <a href="{!! route('permissions.index') !!}"><i class="fa fa-circle-o  text-white"></i><span>Разрешения</span></a>
    </li>
     --}}

    <li class="{{ Request::is('menus*') ? 'active' : '' }}">
        <a href="{!! route('menus.index') !!}"><i class="fa fa-bars" aria-hidden="true"></i><span>Меню</span></a>
    </li>

@endif




{{-- <li class="{{ Request::is('groupInMails*') ? 'active' : '' }}">
    <a href="{!! route('groupInMails.index') !!}"><i class="fa fa-edit"></i><span>Group In Mails</span></a>
</li> --}}



