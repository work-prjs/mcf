@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"><b>Список:</b> Рассылка</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('makeSubMails.create') !!}"><i class="glyphicon glyphicon-plus"></i> Создать</a>
        </h1>
           <a class="btn btn-info pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/run_subs_send"><i class="glyphicon glyphicon-play"></i> ПУСК</a>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('make_sub_mails.table')
            </div>
        </div>
        <div class="text-center">
        
        @include('adminlte-templates::common.paginate', ['records' => $makeSubMails])

        </div>
    </div>
@endsection

