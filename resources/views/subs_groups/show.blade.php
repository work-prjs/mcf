@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <b>Показать:</b>  Subs Group
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('subs_groups.show_fields')
                    <a href="{!! route('subsGroups.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('subsGroups.edit', [$subsGroup->id]) !!}" class='btn btn-default'>Изменить</a>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    {{-- @include('subs_emails.table_relation') --}}
                    {{-- @include('subs_emails.table') --}}


<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>email</th>
                <th>active</th>
                <th>subs</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($emails as $e)
            <tr>
                <td>{!! $e->email !!}</td>
                <td>{!! $e->active !!}</td>
                <td>{!! $e->subs !!}</td>

                <td>
                    {{-- {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!} --}}
                    <div class='btn-group'>
                        {{-- <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        {{-- <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!} --}}
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

                    {{-- <a href="" class="btn btn-default">Очистить</a> --}}
                    {{-- <a href="{!! route('subsGroups.edit', [$subsGroup->id]) !!}" class='btn btn-default'>Изменить</a> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
