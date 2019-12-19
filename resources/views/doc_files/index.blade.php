@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"><b>Список:</b>  {{ __('Doc File') }}</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('docFiles.create') !!}"> <i class="fa fa-plus" aria-hidden="true"></i> Создать</a>
           <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/docFiles_destroy_all"> <i class="fa fa-trash" aria-hidden="true"></i> Очистить</a>
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#myModal_import"> <i class="fa fa-upload" aria-hidden="true"></i> Импорт</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('doc_files.table')
            </div>
        </div>
        <div class="text-center">
        
        @include('adminlte-templates::common.paginate', ['records' => $docFiles])

        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal_import" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Импорт</h4>
        </div>
        <div class="modal-body">

          <form action="/docFiles/import" method="POST" >
              @csrf
              <div class="form-group col-sm-12">
                <textarea name="elist" style="    width: 100%;"></textarea>
              </div>
{{--               <div class="form-group col-sm-6">
                {!! Form::label('active', 'Активен:') !!}
                <label class="checkbox-inline">
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', '1', null) !!}
                </label>
              </div> --}}

              {{-- <div class="form-group col-sm-6"> --}}
              {{-- {!! Form::label('group_email_id', 'Группа:') !!} --}}
              {{-- {!!  Form::select('group_email_id', App\Models\SubsGroup::all()->pluck('name', 'id')->prepend('Корневая категория', '0'), null, ['class' => 'form-control']) !!} --}}
              {{-- </div> --}}
                <hr>
                <button class="btn btn-danger pull-right">Выполнить</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
      </div>
      
    </div>
  </div>

@endsection

