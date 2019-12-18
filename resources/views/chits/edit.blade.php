@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Комментарии на Главной
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($chit, ['route' => ['chits.update', $chit->id], 'method' => 'patch']) !!}

                        @include('chits.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection