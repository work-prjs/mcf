@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> {{ __('Media File') }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mediaFile, ['route' => ['mediaFiles.update', $mediaFile->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('media_files.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection