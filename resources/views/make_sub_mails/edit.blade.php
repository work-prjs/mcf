@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Рассылка
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($makeSubMail, ['route' => ['makeSubMails.update', $makeSubMail->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('make_sub_mails.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection