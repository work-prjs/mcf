
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('Documents')}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('doc_files.show_fields')
                    <a href="/docFiles" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @extends('layouts.mcf_v2')

@section('content-header')

</style>


@endsection


@section('content')



@endsection


@section('script')
<script type="text/javascript">

$(document).ready(function (){

});
  
</script>
      
@endsection --}}