@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Group In Mail
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($groupInMail, ['route' => ['groupInMails.update', $groupInMail->id], 'method' => 'patch']) !!}

                        @include('group_in_mails.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection