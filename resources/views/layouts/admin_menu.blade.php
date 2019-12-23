{{-- TODO active open --}}
<script type="text/javascript">
$( document ).ready(function() {
    console.log( "ready!" );
    $('#sidebar-menu ul.treeview-menu li.active').first().parent().parent().addClass('menu-open').addClass('active') 
});  
</script>        

        <li class="header">Навигация</li>

        <li class="treeview menu-open2 active2">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Пространства</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('manager') ? 'active' : '' }}">
              <a href="/manager">
                <i class="fa fa-circle-o text-success"></i> Менджер
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview menu-open2 active2">
          <a href="#">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i> <span>Магазин</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ Request::is('cats*') ? 'active' : '' }}">
                <a href="{!! route('cats.index') !!}"><i class="fa fa-book"></i><span>Категории</span></a>
            </li>


            <li class="{{ Request::is('products*') ? 'active' : '' }}">
                <a href="{!! route('products.index') !!}"><i class="fa fa-credit-card" aria-hidden="true"></i></i><span>Продукты</span></a>
            </li>

            <li class="{{ Request::is('orders*') ? 'active' : '' }}">
                <a href="{!! route('orders.index') !!}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            <span>Заказы</span></a>
            </li>

          </ul>
        </li>

        <li class="treeview menu-open2 active2">
          <a href="#">
            <i class="fa fa-table"></i> <span>Контент</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu tt">
            <li class="{{ Request::is('mediaFiles*') ? 'active' : '' }}">
                <a href="{!! route('mediaFiles.index') !!}"><i class="fa fa-edit"></i><span>Медиа Файлы</span></a>
            </li>

            <li class="{{ Request::is('docFiles*') ? 'active' : '' }}">
                <a href="{!! route('docFiles.index') !!}"><i class="fa fa-edit"></i><span>Документы</span></a>
            </li>

            <li class="{{ Request::is('articles*') ? 'active' : '' }}">
                <a href="{!! route('articles.index') !!}"><i class="fa fa-edit"></i><span>Статьи</span></a>
            </li>

            <li class="{{ Request::is('chits*') ? 'active' : '' }}">
                <a href="{!! route('chits.index') !!}"><i class="fa fa-edit"></i><span>Отзывы</span></a>
            </li>

            <li class="{{ Request::is('productComments*') ? 'active' : '' }}">
                <a href="{!! route('productComments.index') !!}"><i class="fa fa-edit"></i><span>Комментарии</span></a>
            </li>

            <li class="{{ Request::is('metatexts*') ? 'active' : '' }}">
                <a href="{!! route('metatexts.index') !!}"><i class="fa fa-edit"></i><span>Мета метки</span></a>
            </li>


            <li class="{{ Request::is('contactContractors*') ? 'active' : '' }}">
                <a href="{{ route('contactContractors.index') }}"><i class="fa fa-edit"></i><span>
                    {{-- {{__('Contractors')}} --}}
                    Представители
                </span></a>
            </li>

            
          </ul>
        </li>

        <li class="treeview menu-open2 active2">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Рассылки</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ Request::is('makeSubMails*') ? 'active' : '' }}">
                <a href="{!! route('makeSubMails.index') !!}"><i class="fa fa-envelope"></i><span>Рассылка</span></a>
            </li>
            <li class="{{ Request::is('subsGroups*') ? 'active' : '' }}">
                <a href="{!! route('subsGroups.index') !!}"><i class="fa fa-envelope"></i><span>Почтовые группы</span></a>
            </li>
            <li class="{{ Request::is('subsEmails*') ? 'active' : '' }}">
                <a href="{!! route('subsEmails.index') !!}"><i class="fa fa-envelope"></i><span>Ящики/Почта</span></a>
            </li>

          </ul>
        </li>

        @if (Auth::user()->role_type==0)
          <li class="treeview menu-open2 active2">
            <a href="#">
              <i class="fa fa-table"></i> <span>Таблицы</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu tt">
              <li class="{{ Request::is('users*') ? 'active' : '' }}">
                  <a href="{!! route('users.index') !!}"><i class="fa fa-user-secret" aria-hidden="true"></i><span>Пользователи</span></a>
              </li>
              @include('layouts.admin_menu_tables')
            </ul>
          </li>
        {{-- @endif --}}

{{-- @if (Auth::user()->role_type==0) --}}
{{-- @if (false) --}}

        <li class="treeview menu-open2 active2">
          <a href="#">
            <i class="fa fa-share"></i> <span>Дополнения</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>


          <ul class="treeview-menu">
            <li><a href="/api/docs"  target="_blank"><i class="fa fa-book"></i> <span>Документация</span></a></li>
            <li class="treeview" style="">
              <a href="#"><i class="fa fa-circle-o text-blue"></i> Visual
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open2">

                <li><a href="/widgets/"><i class="fa fa-circle-o"></i> Виджеты</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-pie-chart"></i> Графики
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu menu-open2">
                    <li><a href="/chartjs"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="/flot"><i class="fa fa-circle-o"></i> Flot</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="#"><i class="fa fa-pie-chart"></i> Шаблоны
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu menu-open2">
                    <li><a href="http://www.crusader12.com/Yoshi/"><i class="fa fa-circle-o"></i> Yoshi - Particle Effects System</a></li>
                    <li><a href="http://activiotic.com/products/background-bundle/"><i class="fa fa-circle-o"></i> interactive animated backgrounds</a></li>
                    
                    {{-- http://www.crusader12.com/Yoshi/ --}}
                    {{-- https://previews.customer.envatousercontent.com/files/16687559/index.html --}}
                    {{-- https://demonisblack.com/code/2016/fishanimation/canvas/ --}}
                    {{-- http://activiotic.com/products/fluid/ --}}
                  </ul>
                </li>


              </ul>
            </li>

                


          </ul>



        </li>
@endif
        <li class="header">ССЫЛКИ</li>
        
        {{-- <li><a href="/direct"><i class="fa fa-circle-o text-red"></i> <span>Реклама</span></a></li> --}}
        {{-- <li><a href="/anal"><i class="fa fa-circle-o text-yellow"></i> <span>Аналитика</span></a></li> --}}
        <li><a href="/generator_builder"><i class="fa fa-circle-o text-orange"></i> Генераторы </a></li>
        <li><a href="/file_manager1"><i class="fa fa-circle-o text-red"></i> Файлы </a></li>
        <li><a href="/" target="_blank"><i class="fa fa-link text-aqua" aria-hidden="true"></i> <span>Сайт</span></a></li>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
JS
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>