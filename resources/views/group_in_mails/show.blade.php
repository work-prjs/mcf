@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <b>Показать:</b>  Group In Mail
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('group_in_mails.show_fields')
                    <a href="{!! route('groupInMails.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('groupInMails.edit', [$groupInMail->id]) !!}" class='btn btn-default'>Изменить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
