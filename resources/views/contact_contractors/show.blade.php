@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('Contractor')}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('contact_contractors.show_fields')
                    <a href="{{ route('contactContractors.index') }}" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection
