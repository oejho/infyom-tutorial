@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/continents.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'location.continents.store']) !!}

                        @include('location.continents.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
