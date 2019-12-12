@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <b>Показать:</b>  Модуль Рассылки
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <h2>Общая информация</h2>

                    @include('make_sub_mails.show_fields')
                    <a href="{!! route('makeSubMails.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('makeSubMails.edit', [$makeSubMail->id]) !!}" class='btn btn-default'>Изменить</a>
                </div>
            </div>
        </div>


        <div class="box box-info">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    {{-- @include('make_sub_mails.show_fields') --}}
                    {{-- <a href="/makeSubMails/addGroup/" class="btn btn-default">Добавить</a> --}}
<h2>Группы</h2>

<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Активно</th>
                <th>Наименвание</th>
                <th>Комментарий</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($groups as $e)
            <tr>
                <td>
                    <a href="/subsGroups/{{ \App\Models\SubsGroup::find($e->subs_group_id)->id }}">
                        {!! \App\Models\SubsGroup::find($e->subs_group_id)->id !!}
                    </a>
                </td>

                <td>{!! \App\Models\SubsGroup::find($e->subs_group_id)->active !!}</td>

                {{-- $e->subs_group_id --}}
                <td>
                    {!! \App\Models\SubsGroup::find($e->subs_group_id)->name !!}
                    {{-- {!! \App\Models\SubsGroup::find()->name !!} --}}
                    {{-- $e->subs_group_id --}}
                    {{-- group_in_mails --}}
                </td>

                <td>{!! \App\Models\SubsGroup::find($e->subs_group_id)->comment !!}</td>

                <td>
                    {!! Form::open(['route' => ['subsGroups.destroy', \App\Models\SubsGroup::find($e->subs_group_id)->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('subsGroups.show', [\App\Models\SubsGroup::find($e->subs_group_id)->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('subsGroups.edit', [\App\Models\SubsGroup::find($e->subs_group_id)->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



                    <a class="btn btn-primary " style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#myModal_add">Добавить</a>
                </div>
            </div>
        </div>

    </div>



  <!-- Modal -->
  <div class="modal fade" id="myModal_add" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Добавление Группы</h4>
        </div>
        <div class="modal-body">
          <form action="" method="GET" id="add_group_form">

              @csrf

              {!! Form::label('group_email_id', 'Группа:') !!}
              {!!  Form::select('group_email_id', App\Models\SubsGroup::all()->pluck('name', 'id')->prepend('Корневая категория', '0'), null, ['class' => 'form-control']) !!}

              <hr>
              <button class="btn btn-primary" id="add_group" type="button">Добавить</button>
          </form>

          <script type="text/javascript">

            $('#add_group').click(function(e1) {
                // console.log( $(this).find(":selected").val() )
                $num=$('#add_group_form').find(":selected").val()
                $('#add_group_form').attr('action', '/makeSubMails/'+{{ $makeSubMail->id }}+'/add_group/'+$num)
                $url = '/makeSubMails/'+{{ $makeSubMail->id }}+'/add_group/'+$num
                // console.log($('#add_group_form').attr('action'))
              $.ajax({
                  url: $url,
                  type: 'GET',
                  success: function(result) {
                      // console.log( "sync" )
                      // console.log( "result" )
                      // $('#span1').removeClass('animated pulse infinite')

                      // addClass('label-success')
                      // $(this).addClass('animated bounce')


                      // console.log( result[1] )
                      // console.log( $(t1).text(result[0]) )

                      // $(t1).removeClass('label-default')
                      // $(t1).removeClass('label-success')
                      // $(t1).addClass('label-'+result[1])
                        // label-

                      // $()
                      window.location=location
                  }
              });

            });


          </script>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
      
    </div>
  </div>

@endsection
